<?php

/**
 * @author Bishwo Prasad Lamichhane <bishwo.prasad@gmail.com>
 */

namespace LaminasAdminLTE\Listener;

use Laminas\EventManager\AbstractListenerAggregate;
use Laminas\EventManager\EventManagerInterface;
use Laminas\Mvc\MvcEvent;
use Laminas\View\Resolver\TemplateMapResolver;
use LaminasAdminLTE\ModuleOptions\ModuleOptionsInterface;

class LayoutListener extends AbstractListenerAggregate {

    /** @var TemplateMapResolver */
    private $templateMapResolver;

    /**
     * @var \LaminasAdminLTE\ModuleOptions\ModuleOptionsInterface
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
            ModuleOptionsInterface $moduleOptions) {
        $this->templateMapResolver = $templateMapResolver;
        $this->moduleOptions = $moduleOptions;
    }

    public function attach(EventManagerInterface $events, $priority = 1) {
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
        // Get and check the route match object
        $routeMatch = $event->getRouteMatch();
        if (!$routeMatch) {
            return;
        }
        // Get and check the parameter for current controller
        $controller = $routeMatch->getParam('controller');
        if (!$controller) {
            return;
        }
        // Extract module name
        $module = strtolower(substr($controller, 0, strpos($controller, '\\')));

        if ($module == 'laminasadminlte') {
            return;
        }
        // Change template
        $layoutViewModel->setTemplate($this->moduleOptions->getSelectedLayout());
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

        foreach ($metas as $m) {
            $method = $this->metaTypesMethod[$m->type];
            $viewManager->get('headMeta')->$method($m->key, $m->content);
        }
        
        $viewManager->get('headLink')([
            'rel' => 'shortcut icon',
            'type' => 'image/vnd.microsoft.icon',
            'href' => $viewManager->get('basePath')($this->moduleOptions->favicon)
        ]);
        
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
