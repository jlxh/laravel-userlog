# Laravel-UserLog (Laravel 5 Package)

[![Build Status](https://travis-ci.org/jlxh/laravel-userlog.svg)](https://travis-ci.org/jlxh/laravel-userlog)
[![StyleCI](https://styleci.io/repos/64642027/shield?style=flat)](https://styleci.io/repos/64642027)
[![Latest Stable Version](https://poser.pugx.org/jlxh/laravel-userlog/v/stable)](https://packagist.org/packages/jlxh/laravel-userlog)
[![Total Downloads](https://poser.pugx.org/jlxh/laravel-userlog/downloads)](https://packagist.org/packages/jlxh/laravel-userlog)
[![Latest Unstable Version](https://poser.pugx.org/jlxh/laravel-userlog/v/unstable)](https://packagist.org/packages/jlxh/laravel-userlog)
[![License](https://poser.pugx.org/jlxh/laravel-userlog/license)](https://packagist.org/packages/jlxh/laravel-userlog)

Laravel-UserLog is a succinct and flexible way to add user logs to **Laravel 5**.

## Installation

In order to install Laravel 5 UserLog, just add

    "jlxh/laravel-userlog": ">=1.*"

to your composer.json. Then run `composer install` or `composer update`.

or you can run the `composer require` command from your terminal:

    composer require jlxh/laravel:1.*

Then in your `config/app.php` add
```php
    Jlxh\UserLog\UserLogServiceProvider::class,
```
in the `providers` array and
```php
    'UserLog'   => Jlxh\UserLog\UserLogFacade::class,
```
to the `aliases` array.


## Configuration

You can also publish the configuration for this package to further customize table names and model namespaces.
Just use `php artisan vendor:publish` and a `userlog.php` file will be created in your app/config directory.

Now generate the UserLog migration:

```bash
php artisan userlog:migration
```

It will generate the `<timestamp>_userlog_setup_tables.php` migration.
You may now run it with the artisan migrate command:

```bash
php artisan migrate
```

After the migration, one new table will be present:
- `user-log` &mdash; stores user logs

## Usage

### Concepts
Let's create log as following:

```php
use UserLog;
...

$log = UserLog::create(1, 'title', 'A', 'data', 'sql');
```

## Troubleshooting

## License

Entrust is free software distributed under the terms of the MIT license.

## Contribution guidelines

Support follows PSR-1 and PSR-4 PHP coding standards, and semantic versioning.

Please report any issue you find in the issues page.
Pull requests are welcome.

