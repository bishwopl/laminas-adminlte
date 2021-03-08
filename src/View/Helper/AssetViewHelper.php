<?php

namespace LaminasAdminLTE\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use LaminasAdminLTE\ModuleOptions\ModuleOptionsInterface;

/**
 * @author Bishwo Prasad Lamichhane <bishwo.prasad@gmail.com>
 */
class AssetViewHelper extends AbstractHelper {

    private $assetTypesMethod = [
        'brandlogo'                  => 'getBrandLogo',
        'brandnamefull'              => 'getBrandNameFull',
        'brandnameshort'             => 'getBrandNameShort',
        'showsearch'                 => 'getShowSearch',
        'showcontrol'                => 'getShowControl',
        'showbreadcrumb'             => 'getShowBreadcrumb',
        'topnavigationkey'           => 'getTopNavigationKey',
        'sidebarnavigationkey'       => 'getSidebarNavigationKey',
        'navigationkeyforbreadcrumb' => 'getNavigationKeyForBreadcrumb',
        'accentcolor'                => 'getAccentColor',
        'topnavbarskin'              => 'getTopNavbarSkin',
        'sidebarskin'                => 'getSidebarSkin',
        'brandlinkcolor'             => 'getBrandLinkColor',
    ];

    /**
     * @var \LaminasAdminLTE\ModuleOptions\ModuleOptionsInterface 
     */
    private $moduleOptions;

    public function __construct(ModuleOptionsInterface $moduleOptions) {
        $this->moduleOptions = $moduleOptions;
    }

    /**
     * @return string 
     * @param string $assetType valid values are 'css' or 'js'
     */
    public function __invoke($assetType) {
        if (array_key_exists(strtolower($assetType), $this->assetTypesMethod)) {
            $method = $this->assetTypesMethod[strtolower($assetType)];
            return $this->$method();
        } else {
            throw new \Exception("Asset type must be either "
                    . implode(',', array_keys($this->assetTypesMethod))."'$assetType' given.");
        }
        return;
    }

    public function getBrandLogo() {
        return $this->moduleOptions->brandLogo;
    }

    public function getBrandNameFull() {
        return $this->moduleOptions->brandNameF;
    }

    public function getBrandNameShort() {
        return $this->moduleOptions->brandNameS;
    }

    public function getShowSearch() {
        return $this->moduleOptions->showSearch;
    }

    public function getShowControl() {
        return $this->moduleOptions->showControl;
    }

    public function getShowBreadcrumb() {
        return $this->moduleOptions->showBreadcrumb;
    }

    public function getTopNavigationKey() {
        return $this->moduleOptions->topNavigationKey;
    }

    public function getSidebarNavigationKey() {
        return $this->moduleOptions->sidebarNavigationKey;
    }
    
    public function getNavigationKeyForBreadcrumb() {
        return $this->moduleOptions->navigationKeyForBreadcrumb;
    }
    
    public function getAccentColor(){
        return $this->moduleOptions->accentColor;
    }
    
    public function getTopNavbarSkin(){
        return $this->moduleOptions->topNavbarSkin;
    }
    
    public function getSidebarSkin(){
        return $this->moduleOptions->sidebarSkin;
    }
    
    public function getBrandLinkColor(){
        return $this->moduleOptions->brandLinkColor;
    }

}
