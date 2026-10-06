# OB Drupal — Quick Project README

Short guidance to get this repository running for local development.

## Overview
- Drupal 11 project using the `web/` document root.
- Custom theme: `web/themes/custom/ob` (Radix subtheme, Node >= 18).
- Custom module: `web/modules/custom/ob_site` (site structure and install hooks).
- Configuration is exported under `config/sync/`.

## Prerequisites
- PHP 8.3+ (or as required by installed Composer packages)
- Composer (v2+)
- Node.js >= 18, npm >= 8
- A local MariaDB/MySQL or a container-based environment (DDEV / Docker)

## Install PHP dependencies

```bash
composer install --no-interaction --prefer-dist
```

## Theme dependencies and build
Root `package.json` forwards to the theme. From project root you can run:

```bash
# install theme node deps
npm --prefix web/themes/custom/ob ci

# build production assets
npm --prefix web/themes/custom/ob run build

# development (watch / dev server)
npm --prefix web/themes/custom/ob run dev
npm --prefix web/themes/custom/ob run watch
```

## Drupal CLI (Drush)
After `composer install` Drush is available under `vendor/bin/drush`.

```bash
# show status
vendor/bin/drush status

# install the site (example)
vendor/bin/drush site:install standard --db-url=mysql://user:pass@127.0.0.1/databasename -y

# run update hooks after code changes
vendor/bin/drush updatedb -y
vendor/bin/drush cr
```

## Settings and files
- Ensure `sites/default/settings.php` exists (copy `sites/default/default.settings.php` and adjust database settings).
- Create writable `sites/default/files` and set correct permissions for the webserver user.

## Local development options
- Docker / DDEV: recommended to avoid host PHP/MySQL differences. Example `ddev` commands:

```bash
# in project root
ddev config --project-type=drupal11 --docroot=web --create-docroot
ddev start
ddev composer install
ddev npm --prefix web/themes/custom/ob ci
ddev artisan # not used by Drupal; ignore
```

Adjust `ddev` commands to your environment. If you want, I can scaffold a `docker-compose` or `ddev` config.

## Quick notes for contributors
- Edit editorial content via Drupal Admin. Do not hardcode editorial copy into Twig templates.
- Module `ob_site` contains install/update hooks that create content types, fields, blocks, and taxonomies.
- Theme sources: `web/themes/custom/ob/src` and `components/` — run the theme build after changing SCSS/JS.

## Next steps I can take
- Create a `ddev` config or `docker-compose` for local development
- Run the theme build here and verify output
- Generate a shorter `README.md` in the `web/` folder if you prefer that location

