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
inc/fonts.php     Self-hosted fonts: @font-face, preload, Elementor registration
```

## Fonts

Clash Display (headings) and Satoshi (text), variable versions, from [Fontshare](https://www.fontshare.com).

The font files are **not** in this repo: the ITF Free Font License forbids redistributing them through public repositories. To set up a new environment:

1. Download both families from Fontshare.
2. Upload `ClashDisplay-Variable.woff2` and `Satoshi-Variable.woff2` to `wp-content/uploads/fonts/`.

## Branches

- `main` → production. Hostinger deploys this branch to `wp-content/themes/ignaciotalvi-theme`.
- `develop` → day-to-day work. Merged into `main` when ready.

## Rules

- This repo is the single source of truth: don't edit theme files from WP Admin or the file manager (the next deploy overwrites them).
- Visual styling goes in Elementor; only functional code goes here.