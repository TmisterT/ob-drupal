# English and Kiribati press releases

Press releases use the existing **News and Update** content type. One article
has linked English (`en`) and Kiribati (`gil`) translations. The same translation
workflow is available for other News and Update categories.

## For editors

1. Go to **Content → Add content → News and Update**.
2. Choose the article's language and select **Press release** as its update type.
3. Enter its title, summary, main content, release date and shared details.
4. Optionally attach the approved PDF under **Release documents**.
5. Save as **Draft**, **Needs review**, or **Published**, as appropriate.
6. Open the article's **Translate** tab. Click **Add** beside the other language.
7. Replace the copied title, summary and main content with approved translated
   text. Choose that language's release document rather than leaving a copied
   source-language attachment selected.
8. New translations default to **Draft**. Review the text and deliberately select
   **Published** when ready.

Title, summary, body, release document selections, URL alias and publication
status can differ by language. Date, category, topics, image, content owner and
featured status are shared; update them on the original-language form.

The admin Content list includes **Language**. The **Translate** tab links both
versions. Content editors can create, edit, translate, review and publish updates.
Existing articles and their English URLs are preserved.

## Public display

- Article pages show **Read in: English / Kiribati** for published versions.
- Archive rows and update cards show the available published language links.
- Kiribati press release URLs use `/gil/`; English retains its existing paths.
  Home, shared pages, news and archive navigation retain the default-language
  URLs, including when browsing a Kiribati press release.
- Press release archive rows use the requested published translation, falling
  back to another published language when needed. Each release appears once.
- Archive searches match either published title; drafts are not searchable.
- A release with only one published language remains discoverable.
- Draft revisions do not replace the currently published translation.

Editors supply approved translations. Enabling content translation does not
automatically translate articles or the site's navigation and interface text.

## Implementation and configuration

- `configure.php` configures languages, fields, form/view displays, the
  `updates_editorial` publishing workflow, permissions and archive deduplication.
- `bilingual.module.inc` provides hooks installed in
  `web/modules/custom/ob_site/includes/bilingual.module.inc`, included by
  `ob_site.module`. These provide bilingual title search, published fallback
  for listing cards, and Draft defaults on new translation forms.
- Templates and `includes/content.theme` supply accessible language links and
  translation-aware archive rows with cache dependencies.
- `export/` records the changed configuration. `sync-config.py` copies this
  snapshot into the project's standard `config/sync` directory.

For another checkout, deploy the module hooks, theme source and built assets
together with the configuration files. Import through the project's normal
configuration workflow and rebuild caches. Do not import the partial `export/`
directory as a complete site configuration.

To repeat setup on a local DDEV site:

```sh
ddev exec drush en language content_translation -y
ddev exec drush php:script web/themes/custom/ob/config/bilingual/configure.php
python3 web/themes/custom/ob/config/bilingual/install-hooks.py
python3 web/themes/custom/ob/config/bilingual/sync-config.py
ddev exec drush cr
```

## Verification

```sh
ddev exec drush php:script web/themes/custom/ob/config/bilingual/verify.php
```

This checks actual editor forms using a temporary content editor account,
translation defaults, shared fields, anonymous English/Kiribati pages, title and
summary translations, independent publishing, draft privacy, archive searches,
deduplication and archived-language link invalidation. Temporary content and the
editor account are removed in `finally`, including when a check fails.
