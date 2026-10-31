# ignaciotalvi-theme

[Hello Elementor](https://wordpress.org/themes/hello-elementor/) child theme for [ignaciotalvi.com](https://ignaciotalvi.com).

## What lives here and what doesn't

| In this repo | Outside the repo (database) |
|---|---|
| `style.css`, `functions.php`, `inc/` | Elementor design: classes, variables, components, pages |
| Cleanup snippets and custom functions | Content, WordPress and plugin settings |

Visual design is built in Elementor (Atomic). This theme is only the code layer.

## Structure

```
style.css         Theme header + minimal global CSS
functions.php     Enqueues styles and loads files from inc/
inc/cleanup.php   <head> cleanup (emojis, generator, XML-RPC…)
```

## Branches

- `main` → production. Hostinger deploys this branch to `wp-content/themes/ignaciotalvi-theme`.
- `develop` → day-to-day work. Merged into `main` when ready.

## Rules

- This repo is the single source of truth: don't edit theme files from WP Admin or the file manager (the next deploy overwrites them).
- Visual styling goes in Elementor; only functional code goes here.
