#

https://javascript.hotexamples.com/examples/gulp-phpcs/-/default/javascript-default-function-examples.html
https://npmdoc.github.io/node-npmdoc-gulp-phpcs/build/apidoc.html

https://github.com/cseifert/gulp-php-example/blob/master/gulpfile.js

php vendor/bin/phpcs

https://github.com/squizlabs/PHP_CodeSniffer/wiki/Advanced-Usage

-- ignore php cs

// phpcs:ignore

-- rules
https://github.com/squizlabs/PHP_CodeSniffer/wiki/Annotated-Ruleset
https://github.com/squizlabs/PHP_CodeSniffer/wiki/Advanced-Usage
https://github.com/squizlabs/PHP_CodeSniffer/issues/3491

Expected //end class phpcs

# REST API with Laravel 8 using JWT Token

// https://www.avyatech.com/rest-api-with-laravel-8-using-jwt-token/

# --------------------------------------------------------------------------

# The openssl extension is required for SSL/TLS protection

composer config -g -- disable-tls true

The same error occurred to me. I fixed it by turning off TLS for Composer, it's not safe but I assumed the risk on my develop machine.

try this:

composer config -g -- disable-tls true
and re-run your Composer. It works to me!

But it's unsecure and not recommended for your Server. The official website says:

If set to true all HTTPS URLs will be tried with HTTP instead and no network-level encryption is performed. Enabling this is a security risk and is NOT recommended. The better way is to enable the php_openssl extension in php.ini.

If you don't want to enable unsecure layer in your machine/server, then setup your php to enable openssl and it also works. Make sure the PHP Openssl extension has been installed and enable it on php.ini file.

To enable OpenSSL, add or find and uncomment this line on your php.ini file:

Linux/OSx:

extension=php_openssl.so
Windows:

extension=php_openssl.dll

--docker php 8
https://github.com/vcwebnetworks/docker-php8

-   $ php parte8.php | jq | tee data.json
-   docker compose exec php sh

# Compose file and CLI variables

https://docs.docker.com/compose/env-file/
COMPOSE_PROJECT_NAME=wg_featuresPHP8

## An error, "failed to solve with frontend dockerfile.v0"

https://stackoverflow.com/questions/64221861/an-error-failed-to-solve-with-frontend-dockerfile-v0
$ rm ~/.docker/config.json - resolveu

## Illuminate Database

// https://github.com/illuminate/database
// https://code.tutsplus.com/tutorials/using-illuminate-database-with-eloquent-in-your-php-app-without-laravel--cms-27247

## Instalar xdebug

-   https://www.youtube.com/watch?v=6rBEh0wRnak

1- $ php --ini
$ code "I:\Arquivos de Programas Portable\php\php\php8\php-8.2.0-nts-Win32-vs16-x64\php.ini"

################ phinx
composer require robmorgan/phinx:^0.13.3 --with-all-dependencies

## help

php vendor/bin/phinx --help

# run migration

php vendor/bin/phinx migrate -c config-phinx.php
