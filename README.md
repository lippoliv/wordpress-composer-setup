# composer-wp.trusty.codes WordPress

Managing WordPress instances in the long term sometimes is difficult. Especially when it comes to updating for a couple
of plugins and themes. Doing it via UI is hard.

Basically your project idea simply has dependencies: WordPress, "Plugin A", "Plugin B" and "Theme C". And when it comes
to dependencies, the WEB has proven there are better ways, then clicking through some backend UI.

This repository is for demonstration purpose. It's a basic WordPress with some official plugins and themes but also
shows how to add some private stuff (e.g. paid plugins and custom implementations).

Since we now have a specific description for our dependencies, why not using CI/CD to build and deploy for each change?

## Run empty installation

1. RUN `composer install`
1. RUN `composer install` again

## Why run `composer install` twice?

We cannot influence the order of composer installations. Composer is advised to install WordPress to `wordpress` folder.
Whenever there is an update, the `wordpress` folder will be deleted, and a new copy will be put into that folder. All
Plugins / Themes / ... is now gone.

On the second run, nothing changed for WordPress and composer recognizes, that the Plugins and Themes are missing. So
those will be installed.

Should probably be optimized in the future somehow.
