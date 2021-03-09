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
         * Favicon of your application
         * url relative to basepth
         */
        'favicon' => 'img/favicon.ico',
        
        /*
         * Bramd logo of your application
         * url relative to basepth
         */
        'brandLogo' => 'dist/img/AdminLTELogo.png',
        
        /*
         * Full brand name of your organization
         */
        'brandNameF' => 'AdminLTE3 - Laminas MVC Framework Integration',
        
        /*
         * Short brand name of your organization
         */
        'brandNameS' => 'Laminas-AdminLTE3',
        
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
        'showBreadcrumb' => false,
        
        /*
         * Choose a layout for your application
         */
        'layout' => LayoutOption::$topNavigation,
        
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
        'plugins'  => require __DIR__.'/plugins.config.php',
        
        /*
         * Setting for accent color
         */
        'accentColor' => AccentColorOption::$accentLightblue,
        
        /*
         * Setting for top navigation bar skin 
         */
        'topNavbarSkin' => NavbarDarkSkinOption::$navbarLightblue,
        
        /*Setting for sidebar skin
         * 
         */
        'sidebarSkin' => SidebarSkinOption::$sidebarDarkLightblue,
        
        /*
         * Setting for brand logo skin
         */
        'brandLinkColor' => ColorOption::$bgLightblue,
        
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
                'type'    => 'name',
                'key'     => 'Content-Type',
                'content' => 'text/html; charset=UTF-8'
            ],
            [
                'type'    => 'http-equiv',
                'key'     => 'viewport',
                'content' => 'width=device-width, initial-scale=1.0'
            ],
            [
                'type'    => 'http-equiv',
                'key'     => 'X-UA-Compatible',
                'content' => 'IE=edge'
            ],
        ],
        
        /*
         * These assets are required for the theme
         */
        'theme_assets' => [
            'files' => [
                [
                    'type'      => 'css',
                    'isFromCDN' => false,
                    'location'  => 'plugins/fontawesome-free/css/all.min.css'
                ],
                [
                    'type'      => 'css',
                    'isFromCDN' => false,
                    'location'  => 'dist/css/adminlte.min.css'
                ],
                [
                    'type'           => 'js',
                    'isFromCDN'      => false,
                    'isInlineScript' => false,
                    'location'       => 'plugins/jquery/jquery.min.js'
                ],
                [
                    'type'           => 'js',
                    'isFromCDN'      => false,
                    'isInlineScript' => false,
                    'location'       => 'plugins/bootstrap/js/bootstrap.min.js'
                ],
                [
                    'type'           => 'js',
                    'isFromCDN'      => false,
                    'isInlineScript' => false,
                    'location'       => 'dist/js/adminlte.min.js'
                ],
                [
                    'type'           => 'js',
                    'isFromCDN'      => false,
                    'isInlineScript' => true,
                    'location'       => 'js/app.min.js'
                ],
            ],
        ],
        
        /*
         * If your custom layout requires a specific plugin then you can either
         * enable the plugin after changing layout or
         * use this option. This method is useful if layout is changed by the 
         * application during execution such as different layout for different use roles
         */
        'layout_plugins' => [ //plugins required for a specific layout
            LayoutOption::$fixedSidebar => [
                PluginOption::$overlayScrollbars,
            ],
            LayoutOption::$topNavigation => [
                PluginOption::$overlayScrollbars,
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
            LayoutOption::$default           => __DIR__ . '/../view/layout/default.phtml',
            LayoutOption::$boxed             => __DIR__ . '/../view/layout/boxed.phtml',
            LayoutOption::$fixedSidebar      => __DIR__ . '/../view/layout/fixed-sidebar.phtml',
            LayoutOption::$topNavWithSidebar => __DIR__ . '/../view/layout/top-nav-with-sidebar.phtml',
            LayoutOption::$topNavigation     => __DIR__ . '/../view/layout/top-navigation.phtml',
            LayoutOption::$fixedFooter       => __DIR__ . '/../view/layout/fixed-footer.phtml',
            LayoutOption::$fixedNavbar       => __DIR__ . '/../view/layout/fixed-navbar.phtml',
            LayoutOption::$error404          => __DIR__ . '/../view/error/404.phtml',
            LayoutOption::$errorIndex        => __DIR__ . '/../view/error/index.phtml',
            PartialOption::$breadcrumb       => __DIR__ . '/../view/__partial/breadcrumb.phtml',
            PartialOption::$customizPanel    => __DIR__ . '/../view/__partial/customization-panel.phtml',
            PartialOption::$menuSide         => __DIR__ . '/../view/__partial/menu-side.phtml',
            PartialOption::$menuSimple       => __DIR__ . '/../view/__partial/menu-simple.phtml',
            PartialOption::$menuTop          => __DIR__ . '/../view/__partial/menu-top.phtml',
            PartialOption::$menuItem         => __DIR__ . '/../view/__partial/menu-item.phtml',
            PartialOption::$menuItemSide     => __DIR__ . '/../view/__partial/menu-item-side.phtml',
            PartialOption::$menuItemTree     => __DIR__ . '/../view/__partial/menu-item-tree.phtml',
            PartialOption::$menuItemTreeSide => __DIR__ . '/../view/__partial/menu-item-tree-side.phtml',
            PartialOption::$searchForm       => __DIR__ . '/../view/__partial/search-form.phtml',
            PartialOption::$footer           => __DIR__ . '/../view/__partial/footer.phtml',
            PartialOption::$userInfoSidebar  => __DIR__ . '/../view/__partial/user-info-sidebar.phtml',
            PartialOption::$userInfoTopbar   => __DIR__ . '/../view/__partial/user-info-topbar.phtml',
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
                'icon'     => 'fas fa-home',
            ],
            [
                'label'  => 'Layout Options',
                'uri' => '#',
                'showIcon' => true,
                'showIconInBreadcrumb' => true,
                'icon'     => 'fas fa-copy',
                'pages' => [
                    [
                        'label'  => 'Default',
                        'route' => 'laminas-adminlte-examples',
                        'showIcon' => true,
                        'showIconInBreadcrumb' => false,
                        'icon'     => 'far fa-circle nav-icon',
                        'params' => [
                            'layout_type' => str_replace('layout/', '', LayoutOption::$default)
                        ]
                    ],
                    [
                        'label'  => 'Top Navigation',
                        'route' => 'laminas-adminlte-examples',
                        'showIcon' => true,
                        'showIconInBreadcrumb' => false,
                        'icon'     => 'far fa-circle nav-icon',
                        'params' => [
                            'layout_type' => str_replace('layout/', '', LayoutOption::$topNavigation)
                        ]
                    ],
                    [
                        'label'  => 'Top Nav+Sidebar',
                        'route' => 'laminas-adminlte-examples',
                        'showIcon' => true,
                        'showIconInBreadcrumb' => false,
                        'icon'     => 'far fa-circle nav-icon',
                        'params' => [
                            'layout_type' => str_replace('layout/', '', LayoutOption::$topNavWithSidebar)
                        ]
                    ],
                    [
                        'label'  => 'Boxed',
                        'route' => 'laminas-adminlte-examples',
                        'showIcon' => true,
                        'showIconInBreadcrumb' => false,
                        'icon'     => 'far fa-circle nav-icon',
                        'params' => [
                            'layout_type' => str_replace('layout/', '', LayoutOption::$boxed)
                        ]
                    ],
                    [
                        'label'  => 'Fixed Sidebar',
                        'route' => 'laminas-adminlte-examples',
                        'showIcon' => true,
                        'showIconInBreadcrumb' => false,
                        'icon'     => 'far fa-circle nav-icon',
                        'params' => [
                            'layout_type' => str_replace('layout/', '', LayoutOption::$fixedSidebar)
                        ]
                    ],
                    [
                        'label'  => 'Fixed Navbar',
                        'route' => 'laminas-adminlte-examples',
                        'showIcon' => true,
                        'showIconInBreadcrumb' => false,
                        'icon'     => 'far fa-circle nav-icon',
                        'params' => [
                            'layout_type' => str_replace('layout/', '', LayoutOption::$fixedNavbar)
                        ]
                    ],
                    [
                        'label'  => 'Fixed Footer',
                        'route' => 'laminas-adminlte-examples',
                        'showIcon' => true,
                        'showIconInBreadcrumb' => false,
                        'icon'     => 'far fa-circle nav-icon',
                        'params' => [
                            'layout_type' => str_replace('layout/', '', LayoutOption::$fixedFooter)
                        ]
                    ],
                ],
            ],
        ],
    ],
];
