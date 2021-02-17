<?php

/**
 * @author Bishwo Prasad Lamichhane <bishwo.prasad@gmail.com>
 */
namespace LaminasAdminLTE\ModuleOptions;

interface ModuleOptionsInterface {
    /**
     * Returns selected layout
     * string
     */
    public function getSelectedLayout();
    
    /**
     * @return array 
     */
    public function getJsAssetsToIncludeInHTML();
    
    /**
     * @return array
     */
    public function getCssAssetsToIncludeInHTML();
}