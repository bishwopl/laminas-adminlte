<?php

namespace LaminasAdminLTE;

use Laminas\Router\Http\Segment;
use LaminasAdminLTE\Controller\ExamplesController;
use LaminasAdminLTE\Controller\ExamplesControllerFactory;
use LaminasAdminLTE\ModuleOptions\ModuleOptions;
use LaminasAdminLTE\ModuleOptions\ModuleOptionsFactory;
use LaminasAdminLTE\ThemeOptions\LayoutOption;
use LaminasAdminLTE\ThemeOptions\PluginOption;
use LaminasAdminLTE\ThemeOptions\PartialOption;
use LaminasAdminLTE\ThemeOptions\AccentColorOption;
use LaminasAdminLTE\ThemeOptions\NavbarDarkSkinOption;
use LaminasAdminLTE\ThemeOptions\NavbarLightSkinOption;
use LaminasAdminLTE\ThemeOptions\ColorOption;
use LaminasAdminLTE\ThemeOptions\SidebarSkinOption;
use LaminasAdminLTE\Service\CustomNavigation;
use LaminasAdminLTE\Service\CustomNavigationFactory;

$aLTEDirAssets = __DIR__ . '/../../../almasaeed2010/adminlte';

return [
    'controllers' => [
        'factories' => [
            ExamplesController::class => ExamplesControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            ModuleOptions::class => ModuleOptionsFactory::class,
            CustomNavigation::class => CustomNavigationFactory::class
        ],
        'aliases' => [
            'laminas-adminlte-examples-navigation' => CustomNavigation::class,
        ],
    ],
    'laminas_adminlte' => [
        /*
         * Set true to display control sidebar
         */
        'showControl' => true,
        
        /*
         * Set true to display search field in navigation bar
         */
        'showSearch' => true,
        
        /*
         * Set true to display breadcrumb
         */
        'showBreadcrumb' => true,
        
        /*
         * This module uses laminas/laminas-navigation to generate top and sidebar menu.
         * 'topNavigationKey' is used select navigation for top bar
         * 'laminas-adminlte-examples-navigation' is for example navigation
         */
        'topNavigationKey' => 'laminas-adminlte-examples-navigation',
        
        /*
         * This module uses laminas/laminas-navigation to generate top menu and sidebar menu.
         * 'sidebarNavigationKey' is used select navigation for side bar menu
         */
        'sidebarNavigationKey' => 'laminas-adminlte-examples-navigation',
        
        /*
         * This module uses laminas/laminas-navigation to generate breadcrumbs.
         * 'navigationKeyForBreadcrumb' is used select navigation for breadcrumbs
         */
        'navigationKeyForBreadcrumb' => 'laminas-adminlte-examples-navigation',
        
        /*
         * List of plugins. To add new plugins use the following format
         * 'pluginname' => [
         *       'active' => true, set true to enable the plugin
         *       'files' => [
         *           [
         *               'type' => 'js',
         *               'isFromCDN' => false, //if set true location is treated as URL ie src = 'location', if not src = '$this->basePath('location')' is used;
         *               'isInlineScript' => true, //if true includes script at the last, else put script in <head>
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
        'plugins' => require __DIR__ . '/plugins.config.php',
        
        /*
         * Generates <meta {type} = {key} content = {content}> in DOM. Example
         * [
         *      'type' => 'http-equiv',
         *      'key' => 'X-UA-Compatible',
         *      'content' => 'IE=edge'
         * ] generates <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
         */
        'meta' => [
            [
                'type' => 'name',
                'key' => 'Content-Type',
                'content' => 'text/html; charset=UTF-8'
            ],
            [
                'type' => 'http-equiv',
                'key' => 'viewport',
                'content' => 'width=device-width, initial-scale=1.0'
            ],
            [
                'type' => 'http-equiv',
                'key' => 'X-UA-Compatible',
                'content' => 'IE=edge'
            ],
        ],
        
        /*
         * These assets are required for the theme
         */
        'theme_assets' => [
            'files' => [
                [
                    'type' => 'css',
                    'isFromCDN' => false,
                    'location' => 'plugins/fontawesome-free/css/all.min.css'
                ],
                [
                    'type' => 'css',
                    'isFromCDN' => false,
                    'location' => 'dist/css/adminlte.min.css'
                ],
                [
                    'type' => 'js',
                    'isFromCDN' => false,
                    'isInlineScript' => false,
                    'location' => 'plugins/jquery/jquery.min.js'
                ],
                [
                    'type' => 'js',
                    'isFromCDN' => false,
                    'isInlineScript' => false,
                    'location' => 'plugins/bootstrap/js/bootstrap.min.js'
                ],
                [
                    'type' => 'js',
                    'isFromCDN' => false,
                    'isInlineScript' => false,
                    'location' => 'dist/js/adminlte.min.js'
                ],
                [
                    'type' => 'js',
                    'isFromCDN' => false,
                    'isInlineScript' => true,
                    'location' => 'js/app.min.js'
                ],
            ],
        ],
        
        /*
         * If your custom layout requires a specific plugin then you can either
         * enable the plugin after changing layout or
         * use this option. This method is useful if layout is changed by the 
         * application during execution such as different layout for different use roles
         */
        'layout_plugins' => [//plugins required for a specific layout
            LayoutOption::$default => [
                PluginOption::$overlayScrollbars,
            ],
            LayoutOption::$topNavigation => [
                PluginOption::$overlayScrollbars,
            ],
        ],
        
        /*
          |--------------------------------------------------------------------------
          | Title
          |--------------------------------------------------------------------------
          | Here you can change the default title of your admin panel.
         */
        'default_title' => 'AdminLTE 3',
        'title_prefix' => '',
        'title_postfix' => ' - Laminas AdminLTE Integration',
        
        /*
          |--------------------------------------------------------------------------
          | Favicon
          |--------------------------------------------------------------------------
          | Here you can activate the favicon.
         */
        'use_favicon' => true,
        'favicons' => [
            /*
            [
                'type' => '',
                'location' => 'favicons/apple-icon-57x57.png',
                'rel' => 'apple-touch-icon',
                'sizes' => '57x57'
            ],
            [
                'type' => '',
                'location' => 'favicons/apple-icon-60x60.png',
                'rel' => 'apple-touch-icon',
                'sizes' => '60x60'
            ],
            [
                'type' => '',
                'location' => 'favicons/apple-icon-72x72.png',
                'rel' => 'apple-touch-icon',
                'sizes' => '72x72'
            ],
            [
                'type' => '',
                'location' => 'favicons/apple-icon-76x76.png',
                'rel' => 'apple-touch-icon',
                'sizes' => '76x76'
            ],
            [
                'type' => '',
                'location' => 'favicons/apple-icon-114x114.png',
                'rel' => 'apple-touch-icon',
                'sizes' => '114x114'
            ],
            [
                'type' => '',
                'location' => 'favicons/apple-icon-120x120.png',
                'rel' => 'apple-touch-icon',
                'sizes' => '120x120'
            ],
            [
                'type' => '',
                'location' => 'favicons/apple-icon-144x144.png',
                'rel' => 'apple-touch-icon',
                'sizes' => '144x144'
            ],
            [
                'type' => '',
                'location' => 'favicons/apple-icon-152x152.png',
                'rel' => 'apple-touch-icon',
                'sizes' => '152x152'
            ],
            [
                'type' => '',
                'location' => 'favicons/apple-icon-180x180.png',
                'rel' => 'apple-touch-icon',
                'sizes' => '180x180'
            ],
            [
                'type' => 'image/png',
                'location' => 'favicons/favicon-16x16.png',
                'rel' => 'icon',
                'sizes' => '16x16'
            ],
            [
                'type' => 'image/png',
                'location' => 'favicons/favicon-32x32.png',
                'rel' => 'icon',
                'sizes' => '32x32'
            ],
            [
                'type' => 'image/png',
                'location' => 'favicons/favicon-96x96.png',
                'rel' => 'icon',
                'sizes' => '96x96'
            ],
            [
                'type' => 'image/png',
                'location' => 'favicons/favicon-192x192.png',
                'rel' => 'icon',
                'sizes' => '192x192'
            ],
             */
            [
                'type' => 'image/vnd.microsoft.icon',
                'location' => 'favicons/favicon.ico',
                'rel' => 'shortcut icon',
                'sizes' => '48x48'
            ],
             
        ],
        
        /*
          |--------------------------------------------------------------------------
          | Logo
          |--------------------------------------------------------------------------
          | Here you can change the logo of your admin panel.
         */
        'logo' => 'Laminas-AdminLTE3',
        'logo_img' => 'dist/img/AdminLTELogo.png',
        'logo_img_class' => 'brand-image img-circle elevation-3',
        'logo_img_alt' => 'Laminas-AdminLTE3',
        
        /*
          |--------------------------------------------------------------------------
          | User Menu
          |--------------------------------------------------------------------------
          | Here you can activate and change the user menu.
         */
        'usermenu_enabled' => true,
        'usermenu_header_class' => ColorOption::$bgLightblue,
        'usermenu_profile_route' => NULL,
        'usermenu_logout_route' => NULL,
        
        /*
          |--------------------------------------------------------------------------
          | Layout
          |--------------------------------------------------------------------------
          | Here we change the layout of your admin panel.
          | ['xs' => true, 'md' => false, 'xl' => true]
         */
        'layout_topnav' => null,
        'layout_topnav_with_sidebar' => true,
        'layout_boxed' => null,
        'layout_fixed_sidebar' => null,
        'layout_fixed_navbar' => null,
        'layout_fixed_footer' => null,
        
        /*
          |--------------------------------------------------------------------------
          | Authentication Views Classes
          |--------------------------------------------------------------------------
          | Here you can change the look and behavior of the authentication views.
         */
        'classes_auth_card' => 'card-outline card-primary',
        'classes_auth_header' => '',
        'classes_auth_body' => '',
        'classes_auth_footer' => '',
        'classes_auth_icon' => '',
        'classes_auth_btn' => 'btn-flat btn-primary',
        
        /*
          |--------------------------------------------------------------------------
          | Admin Panel Classes
          |--------------------------------------------------------------------------
          | Here you can change the look and behavior of the admin panel.
         */
        'classes_body' => '',
        'classes_brand' => '',
        'classes_brand_text' => 'font-weight-light',
        'classes_content_header' => '',
        'classes_content_wrapper' => '',
        'classes_content' => '',
        'classes_sidebar' => 'sidebar-dark-primary elevation-4',
        'classes_topnav' => 'navbar-white navbar-light navbar-expand-md',
        'classes_topnav_container' => 'container',
        'classes_breadcrumb' => 'float-sm-right text-sm',
        
        /*
          |--------------------------------------------------------------------------
          | Sidebar
          |--------------------------------------------------------------------------
          | Here we can modify the sidebar of the admin panel.
         */
        'sidebar_mini' => false,
        'sidebar_collapse' => true,
        
        /*
          |--------------------------------------------------------------------------
          | Control Sidebar (Right Sidebar)
          |--------------------------------------------------------------------------
          | Here we can modify the right sidebar aka control sidebar of the admin panel.
         */
        'right_sidebar' => true,
        'right_sidebar_icon' => 'fas fa-cogs',
        'right_sidebar_theme' => 'dark',
        
        /*
          |--------------------------------------------------------------------------
          | URLs
          |--------------------------------------------------------------------------
          | Here we can modify the url settings of the admin panel.
         */
        'use_route_url' => false,
        'dashboard_url' => 'home',
        'logout_url' => 'logout',
        'login_url' => 'login',
        'register_url' => 'register',
        'password_reset_url' => 'password/reset',
        'password_email_url' => 'password/email',
        'profile_url' => false,
        
        /*
          |--------------------------------------------------------------------------
          | Role wise layouts
          |--------------------------------------------------------------------------
          | These settings can be used to apply different layouts for user roles
          | 'role_service'   -> service key for role management service
          | 'method_to_call' -> it is used to get role name ofcurrently logged user 
         */
        'role_wise_layouts' => [
            'enabled' => false,
            'role_service' => '',
            'method_to_call' => '',
            'layouts' => [
                //'admin' => LayoutOption::$topNavWithSidebar,
                //'user' => LayoutOption::$topNavigation,
                //'default' => LayoutOption::$topNavigation,
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'laminas-adminlte-examples' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/laminas-adminlte-examples[/:layout_type]',
                    'constraints' => [
                        'layout-type' => '[a-zA-Z][a-zA-Z0-9_-]+',
                    ],
                    'defaults' => [
                        'controller' => ExamplesController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_map' => [
            LayoutOption::$default => __DIR__ . '/../view/layout/default.phtml',
            LayoutOption::$sidebar => __DIR__ . '/../view/layout/sidebar.phtml',
            LayoutOption::$boxed => __DIR__ . '/../view/layout/boxed.phtml',
            LayoutOption::$topNavWithSidebar => __DIR__ . '/../view/layout/top-nav-with-sidebar.phtml',
            LayoutOption::$topNavigation => __DIR__ . '/../view/layout/top-navigation.phtml',
            LayoutOption::$error404 => __DIR__ . '/../view/error/404.phtml',
            LayoutOption::$errorIndex => __DIR__ . '/../view/error/index.phtml',
            PartialOption::$customizPanel => __DIR__ . '/../view/__partial/customization-panel.phtml',
            PartialOption::$breadcrumb => __DIR__ . '/../view/__partial/navigation/breadcrumb.phtml',
            PartialOption::$menuSide => __DIR__ . '/../view/__partial/navigation/menu-side.phtml',
            PartialOption::$menuSimple => __DIR__ . '/../view/__partial/navigation/menu-simple.phtml',
            PartialOption::$menuTop => __DIR__ . '/../view/__partial/navigation/menu-top.phtml',
            PartialOption::$menuItem => __DIR__ . '/../view/__partial/navigation/menu-item.phtml',
            PartialOption::$menuItemSide => __DIR__ . '/../view/__partial/navigation/menu-item-side.phtml',
            PartialOption::$menuItemTree => __DIR__ . '/../view/__partial/navigation/menu-item-tree.phtml',
            PartialOption::$menuItemTreeSide => __DIR__ . '/../view/__partial/navigation/menu-item-tree-side.phtml',
            PartialOption::$searchForm => __DIR__ . '/../view/__partial/search-form.phtml',
            PartialOption::$footer => __DIR__ . '/../view/__partial/footer.phtml',
            PartialOption::$userInfoSidebar => __DIR__ . '/../view/__partial/user-info-sidebar.phtml',
            PartialOption::$userInfoTopbar => __DIR__ . '/../view/__partial/user-info-topbar.phtml',
            PartialOption::$sidebarMenu => __DIR__ . '/../view/__partial/sidebar-menu.phtml',
            PartialOption::$topNavigation => __DIR__ . '/../view/__partial/top-navigation.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'asset_manager' => [
        'resolver_configs' => [
            'paths' => [
                $aLTEDirAssets,
                __DIR__ . '/../public/'
            ],
            'collections' => array(
                'js/d.js' => array(
                    'plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
                    'plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js',
                ),
            ),
        ],
    ],
    'navigation' => [
        'default' => [
        ],
        'laminas-adminlte-examples-navigation' => [
            [
                'label' => 'Home',
                'route' => 'home',
                'showIcon' => true,
                'showIconInBreadcrumb' => true,
                'icon' => 'fas fa-home',
                'labelRight' => 5,
                'labelColor' => 'primary',
            ],
            [
                'label' => '<strong>LAYOUT OPTIONS</strong>',
                'uri' => '#',
                'header' => true,
            ],
            [
                'label' => 'Layout Options',
                'uri' => '#',
                'showIcon' => true,
                'showIconInBreadcrumb' => true,
                'icon' => 'fas fa-copy',
                'pages' => [
                    [
                        'label' => 'Sidebar',
                        'route' => 'laminas-adminlte-examples',
                        'showIcon' => true,
                        'showIconInBreadcrumb' => false,
                        'icon' => 'far fa-circle nav-icon',
                        'params' => [
                            'layout_type' => str_replace('layout/', '', LayoutOption::$sidebar)
                        ],
                        'labelRight' => 4,
                        'labelColor' => 'danger',
                    ],
                    [
                        'label' => 'Top Navigation',
                        'route' => 'laminas-adminlte-examples',
                        'showIcon' => true,
                        'showIconInBreadcrumb' => false,
                        'icon' => 'far fa-circle nav-icon',
                        'params' => [
                            'layout_type' => str_replace('layout/', '', LayoutOption::$topNavigation)
                        ]
                    ],
                    [
                        'label' => 'Top Nav+Sidebar',
                        'route' => 'laminas-adminlte-examples',
                        'showIcon' => true,
                        'showIconInBreadcrumb' => false,
                        'icon' => 'far fa-circle nav-icon',
                        'params' => [
                            'layout_type' => str_replace('layout/', '', LayoutOption::$topNavWithSidebar)
                        ]
                    ],
                    [
                        'label' => 'Boxed',
                        'route' => 'laminas-adminlte-examples',
                        'showIcon' => true,
                        'showIconInBreadcrumb' => false,
                        'icon' => 'far fa-circle nav-icon',
                        'params' => [
                            'layout_type' => str_replace('layout/', '', LayoutOption::$boxed)
                        ]
                    ],
                ],
            ],
        ],
    ],
    'circlical' => [
        'user' => [
            'guards' => [
                'laminas-adminlte' => [
                    'controllers' => [
                        ExamplesController::class => [
                            'default' => [],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
