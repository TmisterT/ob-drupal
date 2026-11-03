<?php

namespace Drupal\ob_site;

use Drupal\Core\Cache\Cache;
use Drupal\Core\File\FileSystemInterface;
use Drupal\file\FileInterface;
use Drupal\media\MediaInterface;

/**
 * Creates small first-page PDF covers on editorial saves, never page requests.
 */
final class GazetteCover {

  public static function forMedia(MediaInterface $media): void {
    if ($media->bundle() !== 'document' || !$media->isPublished()) {
      return;
    }
    $source = $media->getSource()->getConfiguration()['source_field'] ?? NULL;
    $file = $source ? $media->get($source)->entity : NULL;
    if ($file instanceof FileInterface) {
      self::generate($file);
    }
  }

  public static function generate(FileInterface $file): ?string {
    $uri = $file->getFileUri();
    if (!str_starts_with($uri, 'public://') || strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION)) !== 'pdf') {
      return NULL;
    }
    $destination = 'public://gazette-covers/' . $file->uuid() . '.webp';
    if (is_file($destination) && is_file($uri) && filemtime($destination) >= filemtime($uri)) {
      return $destination;
    }
    if (!class_exists(\Imagick::class)) {
      return NULL;
    }
    $lock = \Drupal::lock();
    $key = 'ob_site:pdf_cover:' . $file->uuid();
    if (!$lock->acquire($key, 60)) {
      return NULL;
    }
    $image = NULL;
    $flattened = NULL;
    $temporary = NULL;
    try {
      $fs = \Drupal::service('file_system');
      $directory = 'public://gazette-covers';
      $source = $fs->realpath($uri);
      if (!$source || !$fs->prepareDirectory($directory, FileSystemInterface::CREATE_DIRECTORY | FileSystemInterface::MODIFY_PERMISSIONS)) {
        return NULL;
      }
      $image = new \Imagick();
      $image->setResolution(50, 50);
      $image->readImage($source . '[0]');
      $image->setImageBackgroundColor('white');
      $flattened = $image->mergeImageLayers(\Imagick::LAYERMETHOD_FLATTEN);
      $flattened->thumbnailImage(480, 480, TRUE);
      $flattened->stripImage();
      $flattened->setImageFormat('webp');
      $flattened->setImageCompressionQuality(75);
      $target_directory = $fs->realpath($directory);
      $temporary = $fs->tempnam($target_directory, 'cover-');
      if (!$temporary || !$flattened->writeImage($temporary) || !rename($temporary, $target_directory . '/' . $file->uuid() . '.webp')) {
        throw new \RuntimeException('Unable to save PDF cover.');
      }
      $fs->chmod($destination);
      clearstatcache(TRUE, $destination);
      Cache::invalidateTags($file->getCacheTags());
      return $destination;
    }
    catch (\Throwable $e) {
      // A malformed/encrypted PDF or missing renderer must not block publishing.
      \Drupal::logger('ob_site')->warning('PDF cover generation failed for file @id: @message', [
        '@id' => $file->id(), '@message' => $e->getMessage(),
      ]);
      return NULL;
    }
    finally {
      $image?->clear();
      $flattened?->clear();
      if ($temporary && is_file($temporary)) {
        unlink($temporary);
      }
      $lock->release($key);
    }
  }

}
