<?php

namespace LaminasAdminLTE\Listener;

use Laminas\EventManager\AbstractListenerAggregate;
use Laminas\EventManager\EventManagerInterface;
use Laminas\Mvc\MvcEvent;
use Laminas\View\Resolver\TemplateMapResolver;
use LaminasAdminLTE\ModuleOptions\ModuleOptions;
use LaminasAdminLTE\ThemeOptions\LayoutOption;

class LayoutListener extends AbstractListenerAggregate {

    /** 
     * @var TemplateMapResolver 
     */
    private $templateMapResolver;

    /**
     * @var \LaminasAdminLTE\ModuleOptions\ModuleOptions
     */
    private $moduleOptions;
    
    /**
     * @var object
     */
    private $roleService;
    
    private $metaTypesMethod = [
        'name' => 'appendName',
        'http-equiv' => 'appendHttpEquiv',
        'property' => 'appendProperty',
        'itemprop' => 'appendItemprop',
    ];

    public function __construct(
            TemplateMapResolver $templateMapResolver,
            ModuleOptions $moduleOptions,
            $roleService=null) {
        $this->templateMapResolver = $templateMapResolver;
        $this->moduleOptions = $moduleOptions;
        $this->roleService = $roleService;
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

        $layoutViewModel = $event->getViewModel();

        /* Rendering without layout */
        if ($layoutViewModel->terminate()) {
            return;
        }

        /*
         * Set default layout
         */
        $layout = LayoutOption::default;
        
        /*
         * If layout is set by controller ar a specific module
         * then read the 'lockLayout' option and do not change 
         * layout if 'lockLayout' is true.
         */
        if ($layoutViewModel->getOption('lockLayout') == true) {
            return;
        }
        if ($layoutViewModel->hasChildren()) {
            $children = $layoutViewModel->getChildren();
            foreach ($children as $c) {
                if ($c->getOption('lockLayout') == true) {
                    return;
                }
            }
        }
        
        /*
         * If role wise layouts enabled 
         *  - get roles from service
         *  - user can have multiple roles
         *  - but first layout in configuration is checked first
         *  - set layout from sonfig
         *  - if layout for role is not set revert to default
         */
        if($this->roleService !== null){
            $rolewiseConfig = $this->moduleOptions->role_wise_layouts->toArray();
            $method = $rolewiseConfig['method_to_get_roles'];
            $roles = $this->roleService->$method();
            if(is_string($roles)){
                $roles = [$roles];
            }
            $roleWiseLayouts = $rolewiseConfig['layouts'];
            $layout = $roleWiseLayouts['default'];
            foreach($roleWiseLayouts as $roleName => $layoutName){
                if(in_array($roleName, $roles)){
                    $layout = $layoutName;
                    break;
                }
            }
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

        $jsAssetsToInclude  = $this->moduleOptions->getJsAssetsToIncludeInHTML();
        $cssAssetsToInclude = $this->moduleOptions->getCssAssetsToIncludeInHTML();
        $metas = $this->moduleOptions->meta;
        $iconsToDisplay = [];

        foreach ($metas as $m) {
            $method = $this->metaTypesMethod[$m->type];
            $viewManager->get('headMeta')->$method($m->key, $m->content);
        }

        if ($this->moduleOptions->use_favicon == true) {
            $iconsToDisplay = $this->moduleOptions->favicons;
        }

        foreach ($iconsToDisplay as $icon) {
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
