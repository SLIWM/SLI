# CSS Inventory

The stylesheets stay in this directory because HTML links, CSS imports, and relative asset URLs depend on these paths. Keep the existing stylesheet load order in each entrypoint: later files override earlier rules.

## Frameworks and Resets

- `bootstrap.css`, `bootstrap.min.css`: Bootstrap 4 framework.
- `bootstrap-grid.css`, `bootstrap-grid.min.css`: Bootstrap grid-only builds.
- `bootstrap-reboot.css`, `bootstrap-reboot.min.css`: Bootstrap reset-only builds.
- `normalize.css`: Normalize reset, imported by the legacy theme stylesheets.

The `.map` files are source maps for the Bootstrap CSS builds, not stylesheets.

## Third-Party Components and Icons

- `animate.min.css`: Animate.css effects.
- `default-skin.css`: PhotoSwipe gallery controls.
- `font-awesome.min.css`, `icomoon.css`: icon fonts.
- `jquery-ui.css`, `jquery.fancybox.min.css`, `jquery.mCustomScrollbar.min.css`: jQuery UI, Fancybox, and custom scrollbar styles.
- `meanmenu.css`, `nice-select.css`, `slick.css`: menu, select, and slider plugin styles.
- `owl.carousel.min.css`: Owl Carousel base styles.

## Shared Site Styles

- `style.css`: legacy global theme and shared site rules; imports several third-party stylesheets.
- `banner.css`: banner styles and legacy third-party imports.
- `main.css`: shared locations and layout components.
- `section.css`: shared section and content styles.
- `footer.css`: shared footer styles.
- `herobg.css`: shared hero/background styles.
- `responsive.css`: responsive overrides; load after the rules it adjusts.
- `car.css`: reusable carousel/card styles.
- `thumbnail-gallery.css`: shared gallery styles.

## Page and Ministry Styles

- `ContactUs.css`: contact page.
- `ImNew.css`: I'm New page.
- `Locations.css`: locations page.
- `meettheteam.css`: team page.
- `ourServices.css`: services page.
- `remnant.css`: Remnant ministry page.
- `sample_post.css`: sample post page.
- `SLK.css`: Salt and Light Kids page.
- `tithes.css`: giving page.
- `whoweare.css`: Who We Are page.
- `yafc.css`: YAFC page.

## Maintenance Notes

- Keep selectors and class names aligned with the HTML templates; no selectors or class names were changed as part of this organization.
- `style.css` and `banner.css` both import legacy plugin styles. Treat changes to those imports separately from this inventory because they can affect every page using either stylesheet.
- Some legacy templates reference `owl.theme.default.min.css`, but that file is not present in this workspace's stylesheet inventory. Check those paths before re-enabling the references.