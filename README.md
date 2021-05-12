# composer-wp.trusty.codes WordPress

Managing WordPress instances in the long term sometimes is difficult. Especially when it comes to updating for a couple
of plugins and themes. Doing it via UI is hard.

Basically your project idea simply has dependencies: WordPress, "Plugin A", "Plugin B" and "Theme C". And when it comes
to dependencies, the WEB has proven there are better ways, then clicking through some backend UI.

This repository is for demonstration purpose. It's a basic WordPress with some official plugins and themes but also
shows how to add some private stuff (e.g. paid plugins and custom implementations).

Since we now have a specific description for our dependencies, why not using CI/CD to build and deploy for each change?

## Run docker installation

[Run docker installation](doc/install-new.md)

## How does environment migration work?

[How does environment migration work?](doc/environment-migration.md)

## Why run `composer install` twice?

[Why run `composer install` twice?](doc/run-composer-install-twice.md)
