<?php

namespace LaminasAdminLTE\Config;

use LaminasAdminLTE\ThemeOptions\ColorOption;
use LaminasAdminLTE\ThemeOptions\AccentColorOption;
use LaminasAdminLTE\ThemeOptions\NavbarSkinOption;
use LaminasAdminLTE\ThemeOptions\SidebarSkinOption;

class LayoutConfig {

    public const darkPrimarySkin = [
        'clsses_body' => AccentColorOption::accentPrimary,
        'classes_brand' => ColorOption::navbarPrimary,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkPrimary.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkPrimary.' navbar-expand-md',
    ];
    
    public const darkSecondarySkin = [
        'clsses_body' => AccentColorOption::accentPrimary,
        'classes_brand' => ColorOption::navbarSecondary,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkPrimary.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkSecondary.' navbar-expand-md',
    ];
    
    public const darkInfoSkin = [
        'classes_body' => AccentColorOption::accentInfo,
        'classes_brand' => ColorOption::navbarInfo,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkInfo.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkInfo.' navbar-expand-md',
    ];
    
    public const darkSuccessSkin = [
        'classes_body' => AccentColorOption::accentSuccess,
        'classes_brand' => ColorOption::navbarSuccess,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkSuccess.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkSuccess.' navbar-expand-md',
    ];
    
    public const darkDangerSkin = [
        'classes_body' => AccentColorOption::accentDanger,
        'classes_brand' => ColorOption::navbarDanger,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkDanger.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkDanger.' navbar-expand-md',
    ];
    
    public const darkIndigoSkin = [
        'classes_body' => AccentColorOption::accentIndigo,
        'classes_brand' => ColorOption::navbarIndigo,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkIndigo.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkIndigo.' navbar-expand-md',
    ];
    
    public const darkPurpleSkin = [
        'classes_body' => AccentColorOption::accentPurple,
        'classes_brand' => ColorOption::navbarPurple,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkPurple.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkPurple.' navbar-expand-md',
    ];
    
    public const darkPinkSkin = [
        'classes_body' => AccentColorOption::accentPink,
        'classes_brand' => ColorOption::navbarPink,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkPink.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkPink.' navbar-expand-md',
    ];
    
    public const darkNavySkin = [
        'classes_body' => AccentColorOption::accentNavy,
        'classes_brand' => ColorOption::navbarNavy,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkNavy.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkNavy.' navbar-expand-md',
    ];
    
    public const darkLightblueSkin = [
        'classes_body' => AccentColorOption::accentLightblue,
        'classes_brand' => ColorOption::navbarLightblue,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkLightblue.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkLightblue.' navbar-expand-md',
    ];
    
    public const darkTealSkin = [
        'classes_body' => AccentColorOption::accentTeal,
        'classes_brand' => ColorOption::navbarTeal,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkTeal.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkTeal.' navbar-expand-md',
    ];
    
    public const darkCyanSkin = [
        'classes_body' => AccentColorOption::accentPrimary,
        'classes_brand' => ColorOption::navbarCyan,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkCyan.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkCyan.' navbar-expand-md',
    ];
    
    public const darkGreyDarkSkin = [
        'classes_body' => AccentColorOption::accentPrimary,
        'classes_brand' => ColorOption::navbarDarkGrayDark,
        'classes_brand_text' => 'font-weight-light text-white',
        'classes_sidebar' => SidebarSkinOption::sidebarDarkGrayDark.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarDarkGrayDark.' navbar-expand-md',
    ];
    
    public const lightPrimarySkin = [
        'classes_body' => AccentColorOption::accentPrimary,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightPrimary.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightWarningSkin = [
        'classes_body' => AccentColorOption::accentWarning,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightWarning.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightInfoSkin = [
        'classes_body' => AccentColorOption::accentInfo,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightInfo.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightDangerSkin = [
        'classes_body' => AccentColorOption::accentDanger,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightDanger.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightSuccessSkin = [
        'classes_body' => AccentColorOption::accentSuccess,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightSuccess.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightIndigoSkin = [
        'classes_body' => AccentColorOption::accentIndigo,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightIndigo.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightblueSkin = [
        'classes_body' => AccentColorOption::accentLightblue,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightLightblue.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightNavySkin = [
        'classes_body' => AccentColorOption::accentNavy,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightNavy.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightPurpleSkin = [
        'classes_body' => AccentColorOption::accentPurple,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightPurple.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightFuchsiaSkin = [
        'classes_body' => AccentColorOption::accentFuchsia,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightFuchsia.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightPinkSkin = [
        'classes_body' => AccentColorOption::accentPink,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightPink.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightMaroonSkin = [
        'classes_body' => AccentColorOption::accentMaroon,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightMaroon.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightOrangeSkin = [
        'classes_body' => AccentColorOption::accentOrange,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightOrange.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightLimeSkin = [
        'classes_body' => AccentColorOption::accentLime,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightLime.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightTealSkin = [
        'classes_body' => AccentColorOption::accentTeal,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightTeal.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
    public const lightOliveSkin = [
        'classes_body' => AccentColorOption::accentOlive,
        'classes_brand' => ColorOption::navbarLight,
        'classes_brand_text' => 'font-weight-light text-dark',
        'classes_sidebar' => SidebarSkinOption::sidebarLightOlive.' elevation-4',
        'classes_topnav' => NavbarSkinOption::navbarLight.' navbar-expand-md',
    ];
    
}
