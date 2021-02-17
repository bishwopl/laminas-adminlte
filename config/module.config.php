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
        ],
    ],
    'laminas_adminlte' => [
        'compressOutput'       => true,
        'compressionLevel'     => 9, //can be 0 to 9, 9 for maximum compression
        'favicon'              => 'img/favicon.ico', //url relative to basepth
        'brandLogo'            => 'dist/img/AdminLTELogo.png', //url relative to basepth
        'brandNameF'           => 'AdminLTE3 - Laminas MVC Framework Integration',
        'brandNameS'           => 'Laminas-AdminLTE3',
        'showControl'          => true,
        'showSearch'           => true,
        'showBreadcrumb'       => false,
        'layout'               => LayoutOption::$topNavigation,
        'topNavigationKey'     => 'default',
        'sidebarNavigationKey' => 'default',
        'plugins'              => require __DIR__.'/plugins.config.php',
        'meta'                 => [ //generates <meta {type} = {key} content = {content}>
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
                    'type'      => 'js',
                    'isFromCDN' => false,
                    'location'  => 'plugins/jquery/jquery.min.js'
                ],
                [
                    'type'      => 'js',
                    'isFromCDN' => false,
                    'location'  => 'plugins/bootstrap/js/bootstrap.min.js'
                ],
                [
                    'type'      => 'js',
                    'isFromCDN' => false,
                    'location'  => 'dist/js/adminlte.min.js'
                ],
                [
                    'type'      => 'js',
                    'isFromCDN' => false,
                    'location'  => 'js/app.js'
                ],
            ],
        ],
        'layout_plugins' => [ //plugins required for a specific layout
            LayoutOption::$fixedSidebar => [
                PluginOption::$overlayScrollbars,
                PluginOption::$datatables,
            ],
            LayoutOption::$topNavigation => [
                PluginOption::$overlayScrollbars,
                PluginOption::$datatables,
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
                ],
            ],
        ],
    ],
];
