<?php

namespace LaminasAdminLTE\ModuleOptions;

use Laminas\Config\Config;

/**
 * @author Bishwo Prasad Lamichhane <bishwo.prasad@gmail.com>
 */
class ModuleOptions extends Config implements ModuleOptionsInterface {

    /**
     * List of Javascript assets to include in HTML
     * @var array
     */
    private $jsAssetList = NULL;

    /**
     * List of CSS assets to include in HTML
     * @var array
     */
    private $cssAssetList = NULL;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $array, $allowModifications = false) {
        parent::__construct($array, $allowModifications);
    }

    /**
     * {@inheritdoc}
     */
    public function getSelectedLayout() {
        return $this->layout;
    }

    /**
     * {@inheritdoc}
     */
    public function getCssAssetsToIncludeInHTML(): array {
        if (!is_array($this->cssAssetList)) {
            $this->populateIncludeArrays();
        }
        return $this->cssAssetList;
    }

    /**
     * {@inheritdoc}
     */
    public function getJsAssetsToIncludeInHTML(): array {
        if (!is_array($this->jsAssetList)) {
            $this->populateIncludeArrays();
        }
        return $this->jsAssetList;
    }

    private function populateIncludeArrays() {
        $themeAssets = $this->get('theme_assets');
        $plugins = $this->get('plugins');
        $layoutPlugins = $this->get('layout_plugins')[$this->getSelectedLayout()];
        
        if($layoutPlugins !== NULL){
            $layoutPlugins = $layoutPlugins->toArray();
        }else{
            $layoutPlugins = [];
        }
        
        foreach ($themeAssets->files as $file) {
            if ($file->type == 'js') {
                $this->jsAssetList[] = $file;
            } else {
                $this->cssAssetList[] = $file;
            }
        }

        foreach ($plugins as $pluginName => $p) {
            if (true || in_array($pluginName, $layoutPlugins)) {
                foreach ($p->files as $file) {
                    if ($file->type == 'js') {
                        $this->jsAssetList[] = $file;
                    } else {
                        $this->cssAssetList[] = $file;
                    }
                }
            }
        }
        return;
    }
}
