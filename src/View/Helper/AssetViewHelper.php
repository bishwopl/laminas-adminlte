<?php

namespace LaminasAdminLTE\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use LaminasAdminLTE\ModuleOptions\ModuleOptionsInterface;
use Laminas\View\Renderer\RendererInterface;

/**
 * @author Bishwo Prasad Lamichhane <bishwo.prasad@gmail.com>
 */
class AssetViewHelper extends AbstractHelper {

    private $assetTypesMethod = [
        'css' => 'displayCss',
        'js' => 'displayJs',
        'favicon' => 'displayFavicon',
        'meta' => 'displayMeta',
        'brandlogo' => 'getBrandLogo',
        'brandnamefull' => 'getBrandNameFull',
        'brandnameshort' => 'getBrandNameShort',
        'showsearch' => 'getShowSearch',
        'showcontrol' => 'getShowControl',
        'showbreadcrumb' => 'getShowBreadcrumb',
        'topnavigationkey' => 'getTopNavigationKey',
        'sidebarnavigationkey' => 'getSidebarNavigationKey',
    ];
    private $metaTypesMethod = [
        'name' => 'appendName',
        'http-equiv' => 'appendHttpEquiv',
        'property' => 'appendProperty',
        'itemprop' => 'appendItemprop',
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
    public function __invoke($assetType, RendererInterface $renderer) {
        if (array_key_exists(strtolower($assetType), $this->assetTypesMethod)) {
            $method = $this->assetTypesMethod[strtolower($assetType)];
            return $this->$method($renderer);
        } else {
            throw new \Exception("Asset type must be either "
                    . implode(',', array_keys($this->assetTypesMethod)));
        }
        return;
    }

    /**
     * Returns css includes for HTML page
     */
    private function displayCss(RendererInterface $renderer) {
        $ret = PHP_EOL;
        $cssAssetsToInclude = $this->moduleOptions->getCssAssetsToIncludeInHTML();
        foreach ($cssAssetsToInclude as $file) {
            if ($file->isFromCDN == true) {
                $href = $file->location;
            } else {
                $href = $renderer->basePath($file->location);
            }
            $ret = $renderer->headLink()->appendStylesheet($href) . PHP_EOL;
        }
        return $ret;
    }

    /**
     * Returns js includes for HTML page
     */
    private function displayJs(RendererInterface $renderer) {
        $ret = PHP_EOL;
        $jsAssetsToInclude = $this->moduleOptions->getJsAssetsToIncludeInHTML();
        foreach ($jsAssetsToInclude as $file) {
            if ($file->isFromCDN == true) {
                $href = $file->location;
            } else {
                $href = $renderer->basePath($file->location);
            }
            $ret = $renderer->inlineScript()->appendFile($href) . PHP_EOL;
        }
        return $ret;
    }

    private function displayFavicon(RendererInterface $renderer) {
        $ret = PHP_EOL . $renderer->headLink([
                    'rel' => 'shortcut icon',
                    'type' => 'image/vnd.microsoft.icon',
                    'href' => $renderer->basePath($this->moduleOptions->favicon)
                ]) . PHP_EOL;
        return $ret;
    }

    public function displayMeta(RendererInterface $renderer) {
        $ret = PHP_EOL;
        $metas = $this->moduleOptions->meta;
        foreach ($metas as $m) {
            $method = $this->metaTypesMethod[$m->type];
            $ret = $renderer->headMeta()->$method($m->key, $m->content) . PHP_EOL;
        }
        return $ret . PHP_EOL;
    }

    public function getBrandLogo(RendererInterface $renderer) {
        return $renderer->basePath($this->moduleOptions->brandLogo);
    }

    public function getBrandNameFull(RendererInterface $renderer) {
        return $this->moduleOptions->brandNameF;
    }

    public function getBrandNameShort(RendererInterface $renderer) {
        return $this->moduleOptions->brandNameS;
    }

    public function getShowSearch(RendererInterface $renderer) {
        return $this->moduleOptions->showSearch;
    }

    public function getShowControl(RendererInterface $renderer) {
        return $this->moduleOptions->showControl;
    }

    public function getShowBreadcrumb(RendererInterface $renderer) {
        return $this->moduleOptions->showBreadcrumb;
    }

    public function getTopNavigationKey(RendererInterface $renderer) {
        return $this->moduleOptions->topNavigationKey;
    }

    public function getSidebarNavigationKey(RendererInterface $renderer) {
        return $this->moduleOptions->sidebarNavigationKey;
    }

}
