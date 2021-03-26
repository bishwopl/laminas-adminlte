<?php

namespace LaminasAdminLTE\Listener;

use Laminas\EventManager\AbstractListenerAggregate;
use Laminas\EventManager\EventManagerInterface;
use Laminas\Mvc\MvcEvent;
use Laminas\View\Resolver\TemplateMapResolver;
use LaminasAdminLTE\ModuleOptions\ModuleOptions;

class LayoutListener extends AbstractListenerAggregate {

    /** @var TemplateMapResolver */
    private $templateMapResolver;

    /**
     * @var \LaminasAdminLTE\ModuleOptions\ModuleOptions
     */
    private $moduleOptions;
    
    private $metaTypesMethod = [
        'name' => 'appendName',
        'http-equiv' => 'appendHttpEquiv',
        'property' => 'appendProperty',
        'itemprop' => 'appendItemprop',
    ];

    public function __construct(
            TemplateMapResolver $templateMapResolver,
            ModuleOptions $moduleOptions) {
        $this->templateMapResolver = $templateMapResolver;
        $this->moduleOptions = $moduleOptions;
    }

    public function attach(EventManagerInterface $events, $priority = 99999) {
        $this->listeners[] = $events->attach(
                MvcEvent::EVENT_RENDER,
                [$this, 'setLayout'],
                $priority
        );
        $this->listeners[] = $events->attach(
                MvcEvent::EVENT_RENDER,
                [$this, 'setScriptStyleFaviconAndMeta'],
                $priority
        );
    }

    public function setLayout(MvcEvent $event): void {
        // Get the view model
        $layoutViewModel = $event->getViewModel();
        // Rendering without layout?
        if ($layoutViewModel->terminate()) {
            return;
        }
        if($layoutViewModel->lockLayout == true){
            return;
        }
        
        // Change template
        $layout = \LaminasAdminLTE\ThemeOptions\LayoutOption::$sidebar;
        if($this->moduleOptions->isTopNavigationLayout()){
            $layout = \LaminasAdminLTE\ThemeOptions\LayoutOption::$topNavigation;
        }elseif($this->moduleOptions->isTopnavWithSidebarLayout()){
            $layout = \LaminasAdminLTE\ThemeOptions\LayoutOption::$topNavWithSidebar;
        }elseif($this->moduleOptions->isBoxedlayout()){
            $layout = \LaminasAdminLTE\ThemeOptions\LayoutOption::$boxed;
        }
        
        $layoutViewModel->setTemplate($layout);
    }

    /**
     * Set headScripts, meta, favicon, styleSheets and inline scripts
     * @param MvcEvent $event
     * @return void
     */
    public function setScriptStyleFaviconAndMeta(MvcEvent $event): void {

        $layoutViewModel = $event->getViewModel();
        if ($layoutViewModel->terminate()) {
            return;
        }
        
        $sm = $event->getApplication()->getServiceManager();
        $viewManager = $sm->get('ViewHelperManager');
        

        $jsAssetsToInclude = $this->moduleOptions->getJsAssetsToIncludeInHTML();
        $cssAssetsToInclude = $this->moduleOptions->getCssAssetsToIncludeInHTML();
        $metas = $this->moduleOptions->meta;
        $iconsToDisplay = [];

        foreach ($metas as $m) {
            $method = $this->metaTypesMethod[$m->type];
            $viewManager->get('headMeta')->$method($m->key, $m->content);
        }
        
        if($this->moduleOptions->use_favicon == true){
            $iconsToDisplay = $this->moduleOptions->favicons;
        }
        
        foreach($iconsToDisplay as $icon){
            $viewManager->get('headLink')([
                'rel' => $icon['rel'],
                'type' => $icon['type'],
                'href' => $viewManager->get('basePath')($icon['location']),
                'sizes' => $icon['sizes'],
            ]);
        }
        
        foreach ($cssAssetsToInclude as $file) {
            $href = $file->isFromCDN == true ? $file->location : $viewManager->get('basePath')($file->location);
            $viewManager->get('headLink')->appendStylesheet($href);
        }

        foreach ($jsAssetsToInclude as $file) {
            $href = $file->isFromCDN == true ? $file->location : $viewManager->get('basePath')($file->location);
            if ($file->isInlineScript == true) {
                $viewManager->get('inlineScript')->appendFile($href);
            } else {
                $viewManager->get('headScript')->appendFile($href);
            }
        }
    }
}
