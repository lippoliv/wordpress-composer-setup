# Run empty docker installation

This repository provides an easy way to run the composer configuration within a docker container:

1. RUN `composer install`
1. RUN `composer install` again
1. RUN `rebuild.bat` / `rebuild.sh`
1. Open http://localhost

Once the containers have started, WordPress will be ready to use.

## Run live copy within docker installation

You can also run a copy of your live site to test updates for example:

1. Download sql dump, place in `sql` folder
1. Download current years upload folder and place in `uploads`
1. RUN `composer install`
1. RUN `composer install` again
1. Copy `vendor/interconnectit/search-replace-db` to `wordpress/search-replace-db`
1. RUN `rebuild.bat` / `rebuild.sh`
1. (optional) Open db client and run:
   ```sql
   DELETE FROM wp_posts WHERE post_type = "revision";
    ```
1. Open http://localhost/search-replace-db/ and let it replace your prod url with http://localhost
1. (optional) Create a new sql dump for further usage, replace your sql file in `sql` folder
1. Open http://localhost/wp-admin/options-permalink.php and save (to create `.htaccess`)
1. Open http://localhost

Depending on the size of your sql dump, probably you need to change the sleep time in [rebuild.bat](../rebuild.bat)
/ [rebuild.sh](../rebuild.sh). This is because the WordPress container will "just" wait a couple of seconds for the
database container to be available.
