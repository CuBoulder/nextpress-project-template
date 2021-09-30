[![Update Prod composer.json](https://github.com/CuBoulder/nextpress-project-template/actions/workflows/main.yml/badge.svg)](https://github.com/CuBoulder/nextpress-project-template/actions/workflows/main.yml)
# nextpress-project-template
A project template to get a development version of nextpress running. **DO NOT** use this branch in production! The production composer.* files can be found on the `production` branch.

## Installation
````
composer -V             # verify that your machine has composer 2.x installed

git clone https://github.com/CuBoulder/nextpress-project-template <project-name>

cd <project-name>

open .lando.yml file and replace the name value on line 1 with your project name

lando start             # this command will take a while if it's the first it's being run
php clone-modules.php   # this clones all the cu-boulder/* packages
lando install-site      # this installs Drupal

````

### Development on this Repository
The files that should be changed are the `composer.json` and `composer.lock` if new packages are added. If new `cu-boulder/*` packages are added, add them to
the `composer.json` repositories section. Don't add them to the require section - instead re-run `php clone-modules.php` to get the development versions of the modules.

### Site Development
Starting the app for the first time will install all the composer dependencies and clone down all of the CU Boulder modules. Even though the modules are composer packages, they are cloned with git so we can do development work on them.

## Production Branch
Contains the production version of the `composer.json` and `composer.lock` files. **DO NOT** merge this into main! This branch is automatically updated when any of the composer.* files are changed on the main branch via Github Actions.
