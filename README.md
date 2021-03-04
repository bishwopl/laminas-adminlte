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
Copy config/laminas-adminlte.local.php.dist to config/autoload/laminas-adminlte.local.php. Change default settings according to your brand.
```php
    'laminas_adminlte' => [
        /**
         * Favicon of your application
         * url relative to basepth
         */
        'favicon' => 'img/favicon.ico',
        
        /**
         * Bramd logo of your application
         * url relative to basepth
         */
        'brandLogo' => 'dist/img/AdminLTELogo.png',
        
        /**
         * Full brand name of your organization
         */
        'brandNameF' => 'AdminLTE3 - Laminas MVC Framework Integration',
        
        /**
         * Short brand name of your organization
         */
        'brandNameS' => 'Laminas-AdminLTE3',
        
        /**
         * Set true to display control sidebar
         */
        'showControl' => true,
        
        /**
         * Set true to display search field in navigation bar
         */
        'showSearch' => true,
        
        /**
         * Set true to display breadcrumb
         */
        'showBreadcrumb' => false,
        
        /**
         * Choose a layout for your application
         */
        'layout' => LayoutOption::$topNavigation,
        
        /**
         * This module uses laminas/laminas-navigation to generate top and sidebar menu.
         * 'topNavigationKey' is used select navigation for top bar
         */
        'topNavigationKey' => 'laminas-adminlte-examples-navigation',
        
        /**
         * This module uses laminas/laminas-navigation to generate top menu and sidebar menu.
         * 'sidebarNavigationKey' is used select navigation for side bar menu
         */
        'sidebarNavigationKey' => 'laminas-adminlte-examples-navigation',
        
        /**
         * List of plugins. To add new plugins use the following format
         * 'pluginname' => [
         *       'active' => true, set true to enable the plugin
         *       'files' => [
         *           [
         *               'type' => 'js',
         *               'isFromCDN' => false, //if set true location is treated as URL ie src = 'location', if not src = '$this->basePath('location')' is used;
         *               'location' => 'plugins/myscript.js',
         *           ],
         *           [
         *               'type' => 'css',
         *               'isFromCDN' => true,
         *               'location' => 'plugins/mystyle.css',
         *           ],
         *       ],
         * ];
         * A number of plugins are already configured. To enable them just set active = true.
         * To change default scripts and styles used the format described above
         */
        'plugins' => [
            \LaminasAdminLTE\ThemeOptions\PluginOption::$datatables => [
                'active' => true
            ],
        ],
        
        /**
         * Generates <meta {type} = {key} content = {content}> in DOM. Example
         * [
         *      'type' => 'http-equiv',
         *      'key' => 'X-UA-Compatible',
         *      'content' => 'IE=edge'
         * ] generates <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
         */
        'meta' => [

        ],
        
        /**
         * If your custom layout requires a specific plugin then you can either
         * enable the plugin after changing layout or
         * use this option. This method is useful if layout is changed by the 
         * application during execution such as different layout for different user roles
         */
        'layout_plugins' => [//plugins required for a specific layout
            LayoutOption::$fixedSidebar => [
                PluginOption::$overlayScrollbars,
                PluginOption::$datatables,
            ],
        ],
    ],
```
