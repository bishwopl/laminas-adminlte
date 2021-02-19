# laminas-adminlte
AdminLTE theme for [laminas/laminas-mvc-skeleton](https://github.com/laminas/laminas-mvc-skeleton)

# Features
* Integration of [Laminas MVC Framework](https://github.com/laminas/laminas-mvc-skeleton) with [AdminLTE Theme](https://github.com/ColorlibHQ/AdminLTE).
* Options for different layouts.
* Easy management of client side plugins.

# Installation
```bash
$ composer require bishwopl/laminas-adminlte
```
* Enable module in application.config.php after Application Module as this module replaces default layouts
```php
<?php
return [
    'modules' => [
        // ...
        'LaminasAdminLTE',
    ],
    // ...
];
```
# Configuration
Copy config/laminas-adminlte.local.php.dist to config/autoload/laminas-adminlte.local.php
