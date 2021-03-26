<?php

namespace LaminasAdminLTE;

use Laminas\ModuleManager\Feature\ViewHelperProviderInterface;
use Laminas\Mvc\MvcEvent;
use LaminasAdminLTE\ModuleOptions\ModuleOptions;
use LaminasAdminLTE\Listener\LayoutListener;
use LaminasAdminLTE\Listener\CompressOutputListener;
use LaminasAdminLTE\View\Helper\ConfigViewHelper;
use LaminasAdminLTE\View\Helper\LayoutClasses;

class Module implements ViewHelperProviderInterface {

    public function getConfig(): array {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(MvcEvent $event): void {
        $application = $event->getApplication();
        $moduleOptions = $application->getServiceManager()->get(ModuleOptions::class);
        
        /** @var TemplateMapResolver $templateMapResolver */
        $templateMapResolver = $application->getServiceManager()->get(
                'ViewTemplateMapResolver'
        );

        $listenerLayout = new LayoutListener($templateMapResolver, $moduleOptions);
        $listenerLayout->attach($application->getEventManager());
        
        //$listenerCompress = new CompressOutputListener($moduleOptions);
        //$listenerCompress->attach($application->getEventManager(),-999999);
    }

    public function getViewHelperConfig() {
        return [
            'factories' => [
                'getConfig' => function($e) {
                    $moduleOptions = $e->get(ModuleOptions::class);
                    return new ConfigViewHelper($moduleOptions);
                },
                'getCssClass' => function($e){
                    $moduleOptions = $e->get(ModuleOptions::class);
                    return new LayoutClasses($moduleOptions);
                }
            ],
        ];
    }

}
