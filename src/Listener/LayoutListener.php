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

}
