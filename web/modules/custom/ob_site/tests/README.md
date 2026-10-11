# Official updates functional tests

From the project root, with DDEV running and Composer development dependencies
installed, run:

```sh
ddev test-ob-site
```

The command creates a dedicated `ob_site_tests` database. PHPUnit is configured
to use it explicitly, and Drupal creates randomly prefixed disposable test
tables and files for each test. The live `db` database and its published content
are not used. Test sites and browser output under `web/sites/simpletest/` are
ignored by Git.

The checks cover:

- Published featured News and Press release selection, exclusion of drafts and
  unfeatured articles, and refreshing an anonymously cached page after an edit.
- Notice expiry yesterday versus today, and urgent notices appearing first.
- Finding and saving the existing heading through the real Homepage edit form,
  then reading the saved heading as an anonymous visitor.
- Opening article/detail links, preserving notice related-information links,
  and showing the correct News/Press release archive return links.
- Optional Public Notice images and PDF downloads on the homepage and detail
  page, including hiding unpublished media from anonymous visitors.
- Bilingual press releases occupying one board slot, published-language
  fallbacks, and shared navigation retaining unprefixed URLs.

The tests use the maintained configuration exports to create their fixtures and
run against the `ob` theme. They do not change production fields or content.
JavaScript navigation and visual/mobile behaviour are outside this PHP browser
suite; those still need browser checks.

Run one check while troubleshooting:

```sh
ddev test-ob-site --filter testHeadingCanBeEditedInAdmin
```

After a fresh checkout, install development dependencies with
`ddev composer install` before running the tests. Production installations can
continue using `composer install --no-dev`.
