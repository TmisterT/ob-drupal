<?php

/**
 * Creates a reviewable bilingual News example using existing release content.
 */

use Drupal\node\Entity\Node;

$title = '[Example] State House reception for mayors and council representatives';
$existing = \Drupal::entityQuery('node')->accessCheck(FALSE)
  ->condition('type', 'update')->condition('title', $title)->execute();
if ($existing) {
  echo 'Example already exists: /node/' . reset($existing) . "/edit\n";
  return;
}
$source = Node::load(49);
if (!$source || $source->language()->getId() !== 'gil') {
  throw new RuntimeException('Expected Kiribati source release is unavailable.');
}
$categories = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadByProperties([
  'vid' => 'update_type', 'name' => 'News',
]);
if (!$categories) {
  throw new RuntimeException('News category is unavailable.');
}
preg_match_all('/<p\b[^>]*>.*?<\/p>/si', $source->get('body')->value, $paragraphs);
if (count($paragraphs[0]) < 2) {
  throw new RuntimeException('Source article does not contain the expected paragraphs.');
}
$node = Node::create([
  'type' => 'update', 'langcode' => 'en', 'title' => $title, 'uid' => 1,
  'field_summary' => 'President Taneti Maamau hosted a dinner reception for mayors and council representatives at State House.',
  'body' => [
    'value' => '<p>President Taneti Maamau hosted a dinner reception at State House to welcome mayors and council representatives from across Kiribati.</p><p>During his remarks, the President thanked the mayors and council representatives and acknowledged cooperation with regional partners.</p>',
    'format' => 'basic_html',
  ],
  'field_update_type' => ['target_id' => reset($categories)->id()],
  'field_update_date' => $source->get('field_update_date')->value,
  'field_content_owner' => $source->get('field_content_owner')->value ?: 'Communication and Public Relations Unit',
  'field_last_reviewed' => '2026-10-02',
  'moderation_state' => 'draft',
  'revision_log' => 'Bilingual News example based on existing release 49. English adaptation requires editorial review before publication.',
]);
$node->addTranslation('gil', [
  'title' => '[Example] Te botaki ni katairiki are karaoia Beretitenti Taneti Maamau',
  'field_summary' => $source->get('field_summary')->value,
  'body' => ['value' => implode('', array_slice($paragraphs[0], 0, 2)), 'format' => $source->get('body')->format],
  'moderation_state' => 'draft',
]);
$switcher = \Drupal::service('account_switcher');
$switcher->switchTo(\Drupal\user\Entity\User::load(1));
try {
  foreach (['en', 'gil'] as $langcode) {
    $violations = $node->getTranslation($langcode)->validate();
    if ($violations->count()) {
      throw new RuntimeException((string) $violations);
    }
  }
  $node->save();
}
finally {
  $switcher->switchBack();
}
$storage = \Drupal::entityTypeManager()->getStorage('node');
$storage->resetCache([$node->id()]);
$saved = $storage->load($node->id());
foreach (['en', 'gil'] as $langcode) {
  $translation = $saved->getTranslation($langcode);
  if ($translation->isPublished() || $translation->get('moderation_state')->value !== 'draft') {
    throw new RuntimeException('Example was expected to be saved as draft.');
  }
  echo $langcode . ': ' . $translation->label() . ' — Draft, valid, ready for review' . "\n";
}
echo 'English edit: /node/' . $saved->id() . "/edit\n";
echo 'Kiribati edit: /gil/node/' . $saved->id() . "/edit\n";
echo 'Translations: /node/' . $saved->id() . "/translations\n";
