<?php

namespace LaminasAdminLTE\Config;

use LaminasAdminLTE\ThemeOptions\ColorOption;
use LaminasAdminLTE\ThemeOptions\AccentColorOption;
use LaminasAdminLTE\ThemeOptions\NavbarSkinOption;
use LaminasAdminLTE\ThemeOptions\SidebarSkinOption;

class LayoutConfig {

    public static function getDarkPrimaryConfig() {
        return [
            'classes_body' => AccentColorOption::$accentPrimary,
            'classes_brand' => ColorOption::$navbarPrimary,
            'classes_brand_text' => 'font-weight-light',
            'classes_sidebar' => SidebarSkinOption::$sidebarDarkPrimary.' elevation-4',
            'classes_topnav' => NavbarSkinOption::$navbarDarkPrimary.' navbar-expand-md',
        ];
    }
    
    public static function getDarkInfoConfig() {
        return [
            'classes_body' => AccentColorOption::$accentInfo,
            'classes_brand' => ColorOption::$navbarInfo,
            'classes_brand_text' => 'font-weight-light',
            'classes_sidebar' => SidebarSkinOption::$sidebarDarkInfo.' elevation-4',
            'classes_topnav' => NavbarSkinOption::$navbarDarkInfo.' navbar-expand-md',
        ];
    }
    
    public static function getDarkSuccessConfig() {
        return [
            'classes_body' => AccentColorOption::$accentSuccess,
            'classes_brand' => ColorOption::$navbarSuccess,
            'classes_brand_text' => 'font-weight-light',
            'classes_sidebar' => SidebarSkinOption::$sidebarDarkSuccess.' elevation-4',
            'classes_topnav' => NavbarSkinOption::$navbarDarkSuccess.' navbar-expand-md',
        ];
    }
    
    public static function getDarkDangerConfig() {
        return [
            'classes_body' => AccentColorOption::$accentDanger,
            'classes_brand' => ColorOption::$navbarDanger,
            'classes_brand_text' => 'font-weight-light',
            'classes_sidebar' => SidebarSkinOption::$sidebarDarkDanger.' elevation-4',
            'classes_topnav' => NavbarSkinOption::$navbarDarkDanger.' navbar-expand-md',
        ];
    }
    
    public static function getDarkIndigoConfig() {
        return [
            'classes_body' => AccentColorOption::$accentIndigo,
            'classes_brand' => ColorOption::$navbarIndigo,
            'classes_brand_text' => 'font-weight-light',
            'classes_sidebar' => SidebarSkinOption::$sidebarDarkIndigo.' elevation-4',
            'classes_topnav' => NavbarSkinOption::$navbarDarkIndigo.' navbar-expand-md',
        ];
    }
    
    public static function getDarkPurpleConfig() {
        return [
            'classes_body' => AccentColorOption::$accentPurple,
            'classes_brand' => ColorOption::$navbarPurple,
            'classes_brand_text' => 'font-weight-light',
            'classes_sidebar' => SidebarSkinOption::$sidebarDarkPurple.' elevation-4',
            'classes_topnav' => NavbarSkinOption::$navbarDarkPurple.' navbar-expand-md',
        ];
    }
    
    public static function getDarkPinkConfig() {
        return [
            'classes_body' => AccentColorOption::$accentPink,
            'classes_brand' => ColorOption::$navbarPink,
            'classes_brand_text' => 'font-weight-light',
            'classes_sidebar' => SidebarSkinOption::$sidebarDarkPink.' elevation-4',
            'classes_topnav' => NavbarSkinOption::$navbarDarkPink.' navbar-expand-md',
        ];
    }
    
    public static function getDarkNavyConfig() {
        return [
            'classes_body' => AccentColorOption::$accentNavy,
            'classes_brand' => ColorOption::$navbarNavy,
            'classes_brand_text' => 'font-weight-light',
            'classes_sidebar' => SidebarSkinOption::$sidebarDarkNavy.' elevation-4',
            'classes_topnav' => NavbarSkinOption::$navbarDarkNavy.' navbar-expand-md',
        ];
    }
    
    public static function getDarkLightblueConfig() {
        return [
            'classes_body' => AccentColorOption::$accentLightblue,
            'classes_brand' => ColorOption::$navbarLightblue,
            'classes_brand_text' => 'font-weight-light',
            'classes_sidebar' => SidebarSkinOption::$sidebarDarkLightblue.' elevation-4',
            'classes_topnav' => NavbarSkinOption::$navbarDarkLightblue.' navbar-expand-md',
        ];
    }
    
    public static function getDarkTealConfig() {
        return [
            'classes_body' => AccentColorOption::$accentTeal,
            'classes_brand' => ColorOption::$navbarTeal,
            'classes_brand_text' => 'font-weight-light',
            'classes_sidebar' => SidebarSkinOption::$sidebarDarkTeal.' elevation-4',
            'classes_topnav' => NavbarSkinOption::$navbarDarkTeal.' navbar-expand-md',
        ];
    }
}
