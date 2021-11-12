<?php

namespace LaminasAdminLTE\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use LaminasAdminLTE\ModuleOptions\ModuleOptions;

class LayoutClasses extends AbstractHelper {

    /**
     * @var \LaminasAdminLTE\ModuleOptions\ModuleOptions 
     */
    private $moduleOptions;

    /**
     * CSS classes for body
     * @var array
     */
    private $bodyCssClassOptions = [
        'layout_topnav' => [
            'default' => 'layout-top-nav ',
        ],
        'layout_boxed' => [
            'default' => 'layout-boxed ',
        ],
        'layout_fixed_sidebar' => [
            'default' => 'layout-fixed ',
        ],
        'layout_fixed_navbar' => [
            'default' => 'layout-navbar-fixed ',
            'xs' => [
                0 => 'layout-navbar-not-fixed ',
                1 => 'layout-navbar-fixed ',
            ],
            'sm' => [
                0 => 'layout-sm-navbar-not-fixed ',
                1 => 'layout-sm-navbar-fixed ',
            ],
            'md' => [
                0 => 'layout-md-navbar-not-fixed ',
                1 => 'layout-md-navbar-fixed ',
            ],
            'lg' => [
                0 => 'layout-lg-navbar-not-fixed ',
                1 => 'layout-lg-navbar-fixed ',
            ],
            'xl' => [
                0 => 'layout-xl-navbar-not-fixed ',
                1 => 'layout-xl-navbar-fixed ',
            ],
        ],
        'layout_fixed_footer' => [
            'default' => 'layout-footer-fixed ',
            'xs' => [
                0 => 'layout-footer-not-fixed ',
                1 => 'layout-footer-fixed ',
            ],
            'sm' => [
                0 => 'layout-sm-footer-not-fixed ',
                1 => 'layout-sm-footer-fixed ',
            ],
            'md' => [
                0 => 'layout-md-footer-not-fixed ',
                1 => 'layout-md-footer-fixed ',
            ],
            'lg' => [
                0 => 'layout-lg-footer-not-fixed ',
                1 => 'layout-lg-footer-fixed ',
            ],
            'xl' => [
                0 => 'layout-xl-footer-not-fixed ',
                1 => 'layout-xl-footer-fixed ',
            ],
        ],
    ];
    private $cssHelperLookup = [
        'body' => 'getBodyClass',
        'body_layout' => 'getBodyLayoutClass',
        'brand' => 'getBrandClass',
        'brand_text' => 'getBrandTextClass',
        'content_header' => 'getContentHeaderClass',
        'content_wrapper' => 'getContentWrapperClass',
        'content' => 'getContentClass',
        'sidebar' => 'getSidebarClass',
        'sidebarNav' => 'getSidebarNavClass',
        'topnav' => 'getTopnavClass',
        'topnav_nav' => 'getTopnavNavClass',
        'topnav_container' => 'getTopNavContainerClass',
        'logo_img_class' => 'getLogoImgClass',
        'breadcrumb' => 'getBreadcrumbClass'
    ];

    public function __construct(ModuleOptions $moduleOptions) {
        $this->moduleOptions = $moduleOptions;
    }

    /**
     * @return string 
     * @param string $selector
     */
    public function __invoke($selector = 'body') {
        if (!array_key_exists($selector, $this->cssHelperLookup)) {
            throw new \Exception("Helper key " . $selector . " does not exists");
        }
        $method = $this->cssHelperLookup[$selector];
        return $this->$method();
    }

    private function getBodyClass() {
        return $this->moduleOptions->classes_body;
    }
    
    private function getBodyLayoutClass(){
        $bodyClasses = [];
        $setting = $this->moduleOptions;
        foreach ($this->bodyCssClassOptions as $layoutName => $classNames) {
            $setting = $this->moduleOptions->$layoutName;

            if ($setting == null) {
                continue;
            }

            if (is_object($setting)) {
                $setting = $setting->toArray();
            }

            if (is_array($setting)) {
                foreach ($setting as $key => $value) {
                    if (isset($classNames[$key])) {
                        $bodyClasses[$this->bodyCssClassOptions[$layoutName][$key][(int) $value]] = '';
                    }
                }
            } elseif ($setting == true) {
                $bodyClasses[$classNames['default']] = '';
            }
        }
        $ret = implode(" ", array_keys($bodyClasses)) . " "
                . ($this->moduleOptions->sidebar_mini==true?" sidebar-mini ":"")
                . ($this->moduleOptions->sidebar_collapse==true && $this->moduleOptions->isSidebarLayout() ? " sidebar-collapse ":"");
        return $ret;
    }

    /**
     * Extra classes for the brand. 
     * Classes will be added to element a.navbar-brand if layout_topnav is used, 
     * otherwise they will be added to element a.brand-link.
     */
    public function getBrandClass() {
        return $this->moduleOptions->classes_brand;
    }
    
    /**
     * Extra classes for the brand text. 
     * Classes will be added to element span.brand-text.
     */
    public function getBrandTextClass() {
        return $this->moduleOptions->classes_brand_text;
    }

    /**
     * Classes for the content header container. 
     * Classes will be added to the container of element div.content-header. 
     * If you left this empty, a default class container will be used when 
     * layout_topnav is used, otherwise container-fluid will be used as default.
     */
    public function getContentHeaderClass() {
        return $this->moduleOptions->classes_content_header;
    }
    
    /**
     * Classes for content wrapper container. 
     * Classes will be added to the container of element div.content-wrapper.
     */
    public function getContentWrapperClass() {
        return $this->moduleOptions->classes_content_wrapper;
    }    

    /**
     * Classes for the content container. 
     * Classes will be added to the container of element div.content. 
     * If you left this empty, a default class container will be used when 
     * layout_topnav is used, otherwise container-fluid will be used as default.
     */
    public function getContentClass() {
        return $this->moduleOptions->classes_content;
    }

    /**
     * Extra classes for sidebar. 
     * Classes will be added to element aside.main-sidebar. 
     * There are some built-in classes you can use here to customize the sidebar theme: 
     *     sidebar-dark-<color> 
     *     sidebar-light-<color> 
     * Where <color> is an AdminLTE available color.
     */
    public function getSidebarClass() {
        return $this->moduleOptions->classes_sidebar;
    }
    
    /**
     * Extra classes for the sidebar navigation. 
     * Classes will be added to element ul.nav.nav-pills.nav-sidebar. 
     * There are some built-in classes that you can use here: 
     *    nav-child-indent to indent the child items.  
     *    nav-compact to get a compact nav style.  
     *    nav-flat to get a flat nav style. 
     *    nav-legacy to get a legacy v2 nav style.
     */
    public function getSidebarNavClass() {
        return $this->moduleOptions->classes_sidebar_nav;
    }
    
    /**
     * Extra classes for the top navigation bar. 
     * Classes will be added to element nav.main-header.navbar. 
     * There are some built-in classes you can use here to customize the topnav theme:
     *     navbar-<color> 
     * Where <color> is an AdminLTE available color.
     */
    public function getTopnavClass() {
        return $this->moduleOptions->classes_topnav;
    }

    /**
     * Extra classes for the top navigation. 
     * Classes will be added to element nav.main-header.navbar. 
     * When enabling layout_topnav the recommendation is to use 
     * navbar-expand-md to get items auto collapsed into a menu button on 
     * low screen sizes. Otherwise, stay with navbar-expand class.
     */
    public function getTopnavNavClass() {
        return $this->moduleOptions->classes_topnav_nav;
    }
    
    /**
     * Extra classes for top navigation bar container. 
     * Classes will be added to the div wrapper inside element nav.main-header.navbar.
     */
    public function getTopNavContainerClass() {
        return $this->moduleOptions->classes_topnav_container;
    }
    
    /**
     * Extra classes for the small logo image.
     */
    public function getLogoImgClass(){
        return $this->moduleOptions->logo_img_class;
    }
    
    /**
     * Extra classes for breadcrumb
     */
    public function getBreadcrumbClass(){
        return $this->moduleOptions->classes_breadcrumb;
    }
}
