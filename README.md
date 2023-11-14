# SmartLaravelCMS

Laravel Admin Dashboard with Frontend &amp; API, run on PHP >= 7.1 & Laravel >= 5.7 & MySQL.
This project make you easy to build your own CMS website, you can manage your website from backend and frontend according to your needs.

## Environment Prepare

You will need to make sure your server meets the following requirements:

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

## Configuration Guide

- install mysql
- install composer
- install laravel
- install npm
- install node
- install php

- config .env file
- connect mysql | redis
- create database

``` connect db

  sudo mysql -h 127.0.0.1 -P 3306 -u root -p'root'
  mysql> create database smartlaravelcms_db;
  mysql> use smartlaravelcms_db;
  mysql> source ./smartlaravelcms_db.sql;
  mysql> show tables;
  mysql> exit;

```

- enter smartlaravelcms directory
- run `composer clear-cache`
- run `composer self-update`
- run `composer update`
- run `./vendor/bin/upgrade-carbon`
- run `rm -rf vendor composer install`
- run `npm install` or `yarn`
- if you did not run ` mysql> source ./smartlaravelcms_db.sql;` run `php artisan migrate`
- run `php artisan db:seed`
- run `php artisan storage:link`

## Run Service

- run `php artisan serve`

## Demo

- localhost:8000
- admin@site.com
- admin

## License

MIT
