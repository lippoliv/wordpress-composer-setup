# How does environment migration work?

We have an GitHub Actions workflow to automatically deploy master-changes like this:

1. Install all dependencies (WordPress, Plugins, Themes, mu-plugins)
1. Rename muplugins to muplugins-new
1. Rename plugins to plugins-new
1. Rename themes to themes-new
1. ZIP WordPress folder
1. Upload migration script
1. Upload WordPress folder
1. Call migration script
    1. Activate maintenance mode for WordPress
    1. UNZIP new WordPress version
    1. Replace muplugins with muplugins-new
    1. Replace plugins with plugins-new
    1. Replace themes with themes-new
    1. Stop maintenance mode for WordPress
    1. Call WordPress migration
