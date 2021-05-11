# Why run `composer install` twice?

We cannot influence the order of composer installations. Composer is advised to install WordPress to `wordpress` folder.
Whenever there is an update, the `wordpress` folder will be deleted, and a new copy will be put into that folder. All
Plugins / Themes / ... is now gone.

On the second run, nothing changed for WordPress and composer recognizes, that the Plugins and Themes are missing. So
those will be installed.

Should probably be optimized in the future somehow.
