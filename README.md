# Laravel-PDF-Merger


![Laravel Crudable](img/laravel-crudable.png)

**If you want to save time on your crud operations**

This is a simple package based on https://github.com/rguedes/PDFMerger for 
merging PDF files updated to work better with Laravel 5.x.


### Docs

* [Installation](#installation)
* [Configuration](#configuration)

## Installation 

### Install package

Add the package in your composer.json by executing the command.

```bash
composer require flobbos/laravel-crudable
```

Next, if you plan on using the Contract with automated binding,
add the service provider to `app/config/app.php`

```
Flobbos\Crudable\CrudableServiceProvider::class,
```

## Configuration

### Publish configuration file

Laravel 5.*
```bash
php artisan vendor:publish 
```

