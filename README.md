# nextpress-project-template
A project template to get a development version of nextpress running. **DO NOT** use this in production!

## Installation
````
git clone https://github.com/CuBoulder/nextpress-project-template <project-name>
cd <project-name>

open .lando.yml file and replace the name value on line 1 with your project name

lando start           # this command will take a while if it's the first it's being run
./clone-modules.zsh   # this clones all the cu-boulder/* packages. You may have to change file permissions to execute this script
lando install-site    # this installs Drupal

````

### Development on this repository
The files that should be changed are the `composer.json` and `composer.lock` if new packages are added. Do not add any `cu-boulder/*` packages to the `composer.json` file.

If there are more custom modules to clone down, add them to the `$remoteRepos` variable in `clone-modules.zsh`.
### Site Development
Starting the app for the first time will install all the composer dependencies and clone down all of the 
CU Boulder modules. Even though the modules are composer packages, they are cloned with git so we can do development
work on them. In a testing or production environment, they should be required as composer packages.
