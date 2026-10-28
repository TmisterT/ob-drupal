# OB site architecture

The `ob_site` module owns Drupal site structure. The `ob` Radix subtheme owns presentation.

## Functional regression checks

Run `ddev test-ob-site` to check featured content, notice expiry and urgency,
admin heading editing, and article links in a separate test database.
See [tests/README.md](tests/README.md) for setup, isolation, and single-test commands.

## Login flood protection

Drupal core enforces failed-login limits; no extra module is required. The OB
policy allows 20 failed attempts per IP within one hour and five failed attempts
per account/IP combination within six hours. Subsequent login attempts are
temporarily rejected, including attempts with a correct password while blocked.
Public page browsing is unaffected. These limits are not protection against
general HTTP floods or denial-of-service traffic.

Fresh module installations apply the policy automatically. Existing sites apply
it through update hook `ob_site_update_11027`. From the project root:

```bash
ddev drush updatedb -y
ddev drush config:get user.flood
```

`updatedb` runs all pending updates, so review pending updates on staging before
production deployment. Outside DDEV, use `vendor/bin/drush` instead.
The same policy is exported in `config/sync/user.flood.yml`.

Account limits remain scoped to the account/IP combination (`uid_only: false`)
to avoid letting an attacker lock a staff account out globally. IP rotation can
bypass that account scope; MFA and upstream rate limiting remain complementary
protections. Staff sharing an office IP also share the IP limit.

Inspect blocked-login messages in Drupal's recent log messages. Let the window
expire, or use a trusted operator's Drush access to clear only the affected
identifier through the `user.flood_control` service. Do not truncate the flood
table or disable flood protection to recover a single login.

Behind a reverse proxy, configure only the actual trusted proxy addresses and
headers in server-specific settings so Drupal sees the real client IP. Do not
trust arbitrary forwarded headers. Never test failures against a real staff
account: use an isolated test account and IP and clean up its flood records.

## Editorial ownership

- Homepage-specific content: edit the Homepage node, including hero, search text, quick links, and public information panels.
- Global identity, Media Library logo, and footer copy: reusable content blocks.
- Navigation links: Drupal menus.
- Images and documents: Drupal Media.
- Lists of content: Drupal Views.
- Content classification: Drupal Taxonomy.
- HTML structure: Twig templates in the `ob` theme.
- Visual styling and interaction: theme SCSS and JavaScript.

Do not hardcode editorial copy, navigation links, or uploaded file URLs in Twig.

## Global block types

- Government identity (utility label, header logo, office name, government name, and homepage link)
- Sitewide alert
- Footer about
- Contact details
- Call to action

## Theme regions

- Utility
- Branding
- Primary menu
- Highlighted
- Content
- Footer about
- Footer navigation
- Footer contact
- Footer bottom
- Page bottom

## Image styles

The module provides homepage hero, card, profile, and publication-cover image styles. The Homepage hero Media reference uses the `Homepage hero` media view mode and the `OB homepage hero` responsive image style.


## Homepage slider

Homepage slides are separate revisioned content records managed under Content → Add content → Homepage Slide. The Homepage hero View displays up to five published slides by Display order. Each slide owns its label, public heading, summary, Media image and optional action link. The original Homepage hero fields remain as a safe fallback.

## Initial website sections

The first published top-level Landing Pages are:

- About Us (/about-us)
- Te Beretitenti (/te-beretitenti)

Both pages are linked from the Main navigation. Their copy, media, taxonomy and links remain editable in Drupal Admin.

## Page content types

- Landing Page: section introductions, hero media, featured links, optional call to action, Topics, and Audience.
- Basic Page: standard public information, featured media, documents, related links, Topics, Audience, content owner, and last-reviewed date.

Both content types are revisioned and can be added to the Main navigation. Drupal Admin owns every editorial value; their Twig templates only arrange rendered fields.

## Taxonomy vocabularies

- Update type
- Publication type
- Project type
- Service category
- Topics
- Audience
- Location
- Speech type

These vocabularies are managed at `/admin/structure/taxonomy`. Content types reference them in later implementation steps; Twig only controls how terms are presented.
The project uses Topics instead of Drupal’s default Tags vocabulary to avoid duplicate classification systems. Existing administrator changes to vocabulary labels, descriptions, and term ordering are preserved.

## Development workflow

Run Node commands from the Drupal project root. The root npm manifest forwards commands to the custom theme:

```bash
npm install
npm run build
npm run watch
```

After changing module update hooks, run:

```bash
ddev drush updatedb -y
ddev drush cr
```

After changing theme SCSS or JavaScript, run:

```bash
npm run build
ddev drush cr
```

## Media Editor

The `media_editor` role can create and edit colleagues' News and Update,
Public Notice, and selected Publication records, and publish them directly. It
can upload Image and Document media and edit its own media. It cannot delete
content or administer site configuration. Assign this role alone, in addition
to Drupal's implicit Authenticated role.

`manage news and selected resources` activates the scope checks. Publications
must belong to the existing `Gazettes & Instruments` or `Information Library`
terms in Resource section, in every translation. Missing or renamed section
terms fail closed. Other sections (including Forms and Commission Reports) are
not editable. Changing those term names requires updating the scope resolver
and its tests. Entity access, validation, and presave enforcement protect both
edit routes and submitted changes; public reading remains available.

The exported role is deployed through configuration or updates 11037–11038. User
accounts and login credentials are deliberately not exported. The local publishing account is `media`. Its existing account details are
preserved. The redundant `news.resources` account is blocked and has no
editorial role; it is retained to preserve any content ownership references.

Verify scope enforcement in the isolated test database:

```sh
ddev test-ob-site web/modules/custom/ob_site/tests/src/Kernel/NewsResourcesAccessTest.php
```


## Automatic editorial URLs

Publications and News/Press release updates receive title-based aliases on save
when an alias is missing. Editors can leave URL alias blank. Gazette, library,
forms, news and press release records use their corresponding archive prefix;
unclassified publications use `/resources/publications`. Duplicate titles receive
`-2`, `-3`, etc. Existing aliases are retained when titles or classifications
change, including manually entered aliases. Each translation can have its own
alias. Draft revisions do not change URLs for the default revision.

Update 11047 fills missing aliases on existing records in batches without
resaving content or replacing existing aliases. Deploy the module code, run
`vendor/bin/drush updatedb -y` after reviewing pending updates and backing up the
database, then `vendor/bin/drush cr`. No additional module installation or
configuration import is required. The original `/node/ID` routes remain valid.

```sh
ddev test-ob-site web/modules/custom/ob_site/tests/src/Kernel/EditorialAliasesTest.php
```
