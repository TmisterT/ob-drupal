# Office of Te Beretitenti website

This is a Drupal website with a custom `ob` theme and `ob_site` module.

Start with [MAINTENANCE.md](MAINTENANCE.md) for editing pages, finding source
files, fixing common problems, checking changes and preparing deployments.

## Run the existing site locally

With Docker and DDEV installed, run from this directory:

```sh
ddev start
ddev drush status
```

The local Drupal URL is `https://ob-drupal.ddev.site`. The optional theme
development proxy may also be available at `http://localhost:3002`.

A fresh checkout needs locked dependencies, an appropriate database and
uploaded files. Follow the maintenance guide; do not run a new Drupal site
installation over the existing database.

## Main directories

- `web/`: public document root.
- `web/themes/custom/ob/`: presentation and browser interactions.
- `web/modules/custom/ob_site/`: site-specific functionality and update hooks.
- `config/sync/`: exported Drupal configuration.
- `web/sites/default/files/`: uploads and generated files.

Editorial content belongs in Drupal content records. Use Twig for layout,
stylesheets for appearance and the custom module for application behaviour.
Back up the database and uploads: Git alone does not preserve the content.
