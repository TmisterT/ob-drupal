# Maintaining the OB website

This guide is for editors and developers taking over the existing Drupal site.
Editors can manage routine publishing through Drupal without changing code.

## Editing the website

Sign in at `/user/login`, then open **Content** (`/admin/content`). Find the
page by title and select **Edit**. Review the published page after saving.
Use a revision message to explain substantive changes; the Revisions tab lets
an authorised editor restore earlier content.

| What needs changing | Where to change it |
| --- | --- |
| Homepage headings, search wording and Popular information links | Homepage content record |
| Homepage slideshow | Homepage Slide content records; check publication and display order |
| Division descriptions and functions | The relevant Division content record |
| President biography, summary and portrait | The President's Profile content record |
| Contact phone numbers, email, postal address and working hours | Contact Us content record |
| News, press releases and public notices | Their content records; check publication, classification and expiry |
| Images and documents | Media library (`/admin/content/media`) |
| Menu titles and destinations | Structure → Menus (`/admin/structure/menu`) |
| Logo, footer and reusable contact blocks | Structure → Block layout → Custom block library, where available to your role |

Contact-page details and footer contact details are separate: check both when a
phone number or address changes. Keep physical location and postal address distinct.

## Where the implementation lives

| Location | Purpose |
| --- | --- |
| `web/modules/custom/ob_site/` | Site-specific Drupal functionality, access rules, content structure and database update hooks |
| `web/themes/custom/ob/templates/` | Twig templates: page structure and rendered fields |
| `web/themes/custom/ob/includes/` | Theme preprocessing and data prepared for templates |
| `web/themes/custom/ob/src/scss/` | Source styles compiled into the main theme stylesheet |
| `web/themes/custom/ob/src/js/` | Source JavaScript compiled into the main theme script |
| `web/themes/custom/ob/css/` and `js/` | Standalone assets served directly by Drupal libraries |
| `web/themes/custom/ob/ob.libraries.yml` | Registers styles, scripts and their dependencies |
| `config/sync/` | Exported Drupal configuration; not editorial content or uploaded files |
| `web/sites/default/files/` | Uploaded files and generated derivatives/caches |

Do not edit Drupal core, contributed modules/themes or Composer packages to
change site behaviour. Keep site changes in the custom module/theme.

## Recent page features

- **Homepage Gazettes:** the former four public-information cards are replaced
  by up to five published, accessible Gazette publications with public PDF
  attachments. `src/HomepageGazettes.php` uses the same resource-section filter
  as the Gazette archive and sorts by publication date (creation date when
  absent). Set the publication date and reference number in Drupal for complete
  cards. Titles link to publication details; Preview PDF opens an on-demand
  modal, and Download links directly to the file. The existing news board stays.
  Small first-page WebP covers live in `public://gazette-covers/<file-uuid>.webp`;
  include that directory when transferring uploads. Published Document media
  generates a first-page WebP cover automatically on creation/update using
  `src/GazetteCover.php`. This needs Imagick with PDF/Ghostscript support and
  WebP output on the server. Rendering happens on editorial saves, not homepage
  visits; existing covers are reused. If rendering is unavailable or fails, the
  card shows a document graphic and preview/download still work. Re-save older
  Document media to backfill missing covers. After manually replacing a cover,
  rebuild cache.
  Standalone `css/gazette-slider.css` and `js/gazette-slider.js` supply scrolling,
  keyboard controls and the native dialog; no PDF is embedded before a click.
- **Opening slideshow photo:** the current Presidential activities photo has
  640, 960 and 1920 pixel WebP copies in the theme's `assets/images/` directory.
  `_ob_preprocess_optimized_slide()` in `includes/content.theme` uses these only
  for `public://2026-10/Kiribati Official Portrait by the Sea.png` in slideshow
  mode, retaining the media alt text and loading the picture immediately.
  Replacing the upload automatically returns to the normal Drupal formatter;
  generate new variants and update the mapping to optimise a replacement.
  Loading priority currently follows this photo if slides are reordered.
- **Division tabs:** `js/division-tabs.js` and `css/division-tabs.css` are attached
  by `node--division--full.html.twig`. Tabs activate only when the body contains
  both H2 IDs `climate-change` and `disaster-risk-management`, at the same level.
  Keep those IDs when editing CCDRM. Other H2 headings end the current tab's
  content; use H3 for functions within a tab. Both sections remain readable
  without JavaScript and when printing.
- **Contact map:** `node--landing-page--contact-us.html.twig`, `js/contact-map.js`
  and `css/contact-map.css`. The office search text and physical address currently
  live in the template. The map loads only after the button is pressed. It uses
  an office-name search, not a verified entrance pin. No API key is configured.
  A developer must update this template if the office location changes.
- **President layout:** `node--profile--full.html.twig` attaches
  `css/president-profile.css` only for a Profile marked as the current President.
  Biography wording remains in Drupal content.
- **Popular information icons:** the destination-to-SVG mapping is in
  `node--homepage--full.html.twig`. Reordering links keeps their icons; changing
  destinations may require updating the mapping. KV20 currently uses the local
  entity reference `entity:node/42`. Unknown destinations receive a document icon.

## Local development

Run commands from the project root. Docker and DDEV must be available.

```sh
ddev start
ddev drush status
```

On a fresh checkout, install the locked dependencies:

```sh
ddev composer install
ddev exec npm ci
```

The root npm install script installs theme dependencies too. A fresh checkout
also needs an appropriate database and uploaded files from a trusted backup.
Do not reinstall Drupal over an existing site.

After changing SCSS or bundled source JavaScript:

```sh
ddev exec npm run build
ddev drush cr
```

After changing Twig, library definitions, or standalone `css/` and `js/` assets:

```sh
ddev drush cr
```

Do not edit generated `build/` files as the source of a fix; the next build
replaces them. Review `git diff` before deploying.

## Finding and fixing common issues

| Symptom | First checks |
| --- | --- |
| A published edit is missing | Correct content record/language, publication status and revisions; then rebuild cache |
| A notice disappears | Its expiry date, publication status and homepage selection rules |
| CCDRM tabs disappear | Both required H2 IDs, H3 function headings, browser console and division library attachment |
| A map does not appear | Press Load Google Map; try the external map links; check network/content blocking |
| An icon becomes a plain document | Match the link destination against the Twig icon map |
| Styles or scripts are stale | Correct source file, successful build where required, Drupal cache, then browser cache |
| A page returns an error | Drupal logs, container logs and the most recent code/configuration change |
| Search misses a page | Publication status, permissions and search indexing status |
| Contact email is not delivered | Check form submission records, recipient configuration and mail transport; rendering a form does not prove delivery |
| An editor cannot access content | Check role permissions and resource classification; do not grant administrator access as a routine workaround |

Useful diagnostic commands:

```sh
ddev drush status
ddev drush updatedb:status
ddev drush watchdog:show --count=20
ddev logs -s web
```

Recent Drupal log messages are also available at `/admin/reports/dblog` when
database logging is enabled and your account has permission.

## Checking changes

Open the affected page on desktop and mobile. Check links, keyboard navigation
and whether logged-out visitors see the expected content. A successful HTTP
response alone does not verify interactive behaviour or email delivery.

For functionality covered by the project's isolated regression suite:

```sh
ddev test-ob-site
```

See `web/modules/custom/ob_site/tests/README.md` for setup and focused runs.
The helper uses a separate `ob_site_tests` database; do not point PHPUnit at
the content database.

## Backups and deployment

### Pending maintenance

The local check on 26 October 2026 identified pending `ob_site` updates
`11037`, `11038` and `11039`, covering the Media Editor role and activity
reporting. Check the current status with `ddev drush updatedb:status`; review
and test pending updates on staging before applying them. They were not run
as part of the documentation handover.

### Deployment checklist

Back up the database and uploaded files before database/configuration changes.
Code and configuration alone cannot restore division descriptions, biography
text, working hours, media or other editorial content.

Review pending updates on staging before running `ddev drush updatedb -y`.
Configuration import can overwrite administrative changes, so review its diff
before importing. Export only intended configuration changes for version control.

The repository's `.github/workflows/deploy-pantheon.yml` is empty. It does not
provide an automated deployment process. Confirm the actual hosting workflow
with the site owner before publishing code to production.

Keep credentials out of documentation and version control. Share database and
file backups only through the team's approved storage.
