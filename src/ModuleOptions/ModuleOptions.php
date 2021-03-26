<?php

namespace LaminasAdminLTE\ModuleOptions;

use Laminas\Config\Config;

class ModuleOptions extends Config {

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

        if ($layoutPlugins !== NULL) {
            $layoutPlugins = $layoutPlugins->toArray();
        } else {
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
            if ($p->active == true || in_array($pluginName, $layoutPlugins)) {
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

    public function isTopNavigationLayout() {
        return $this->layout_topnav == true;
    }

    public function isTopnavWithSidebarLayout() {
        return $this->layout_topnav_with_sidebar == true;
    }

    public function isBoxedlayout() {
        return $this->layout_boxed == true;
    }

    public function isSidebarLayout() {
        return !($this->isTopNavigationLayout() || $this->isTopnavWithSidebarLayout() || $this->isBoxedlayout());
    }

}
