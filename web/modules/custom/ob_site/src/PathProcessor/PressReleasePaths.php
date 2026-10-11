<?php

declare(strict_types=1);

namespace Drupal\ob_site\PathProcessor;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\PathProcessor\OutboundPathProcessorInterface;
use Drupal\Core\Render\BubbleableMetadata;
use Symfony\Component\HttpFoundation\Request;

/**
 * Keeps shared navigation unprefixed while preserving release language links.
 */
final class PressReleasePaths implements OutboundPathProcessorInterface {

  public function __construct(
    private readonly EntityTypeManagerInterface $entityTypeManager,
    private readonly LanguageManagerInterface $languageManager,
  ) {}

  public function processOutbound($path, &$options = [], ?Request $request = NULL, ?BubbleableMetadata $bubbleable_metadata = NULL) {
    if (preg_match('#^/node/(\d+)$#', $path, $matches)) {
      $node = $this->entityTypeManager->getStorage('node')->load($matches[1]);
      if ($node) {
        $bubbleable_metadata?->addCacheableDependency($node);
        if ($node->bundle() === 'update' && $node->hasField('field_update_type')) {
          foreach ($node->get('field_update_type')->referencedEntities() as $category) {
            $bubbleable_metadata?->addCacheableDependency($category);
            if (strtolower(trim($category->getUntranslated()->label())) === 'press release') {
              return $path;
            }
          }
        }
      }
    }
    // Run before Drupal chooses an alias and adds a language prefix. Explicit
    // English/Kiribati links to press releases are preserved above.
    $options['language'] = $this->languageManager->getDefaultLanguage();
    $options['prefix'] = '';
    $bubbleable_metadata?->addCacheTags(['config:system.site']);
    return $path;
  }

}
