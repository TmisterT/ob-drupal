# OB site architecture

The `ob_site` module owns Drupal site structure. The `ob` Radix subtheme owns presentation.

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

