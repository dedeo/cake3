## Cara install

1. git clone git@github.com:dedeo/cake3.git
2. composer install
3. chmod -R 775 logs/ tmp/
4. setup database connection in config/app.php



# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run
```bash
composer create-project --prefer-dist cakephp/app [app_name]
```

You should now be able to visit the path to where you installed the app and see the default home page.

## Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your application.

------------------------------------------------------------
5. install CakePHP Acl Plugin
	composer require cakephp/acl

6. load the acl plugin in your config/bootstrap.php
	Plugin::load('Acl', ['bootstrap' => true]);

7. create ACL realted table by running this command:
	bin/cake migrations migrate -p Acl
