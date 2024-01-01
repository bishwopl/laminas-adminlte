<?php

namespace LaminasAdminLTE;

use Laminas\ModuleManager\Feature\ViewHelperProviderInterface;
use Laminas\Mvc\MvcEvent;
use LaminasAdminLTE\ModuleOptions\ModuleOptions;
use LaminasAdminLTE\Listener\LayoutListener;
use LaminasAdminLTE\View\Helper\ConfigViewHelper;
use LaminasAdminLTE\View\Helper\LayoutClasses;
use Laminas\View\Resolver\TemplateMapResolver;
use CirclicalUser\Service\AuthenticationService;
use CirclicalUser\Service\AccessService;
use LaminasAdminLTE\Listener\NavigationListener;

class Module implements ViewHelperProviderInterface {

    public function getConfig(): array {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(MvcEvent $event): void {
        $application = $event->getApplication();
        $sm = $application->getServiceManager();
        
        $roleService = null;
        $moduleOptions = $sm->get(ModuleOptions::class);
        
        /** @var TemplateMapResolver $templateMapResolver */
        $templateMapResolver = $sm->get(
            'ViewTemplateMapResolver'
        );

        if($moduleOptions->role_wise_layouts['enabled'] == true){
            $roleService = $sm->get(
                $moduleOptions->role_wise_layouts['role_service']
            );
        }
        
        $listenerLayout = new LayoutListener($templateMapResolver, $moduleOptions, $roleService);
        $listenerLayout->attach($application->getEventManager());
        
        $helperPluginManager = $sm->get('ViewHelperManager');
        $plugin = $helperPluginManager->get('navigation');
        $plugin->getEventManager();
        $navigationListener = new NavigationListener($sm->get(AccessService::class));
        $navigationListener->attach($plugin->getEventManager());
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
                },
                'getUserImage' => function($e) {
                    $authenticationService = $e->get(AuthenticationService::class);
                    return new View\Helper\GetUserImage($authenticationService);
                },
                'getUserInfo' => function($e) {
                    $authenticationService = $e->get(AuthenticationService::class);
                    return new View\Helper\GetUserInfo($authenticationService);
                },
                'getUserName' => function($e) {
                    $authenticationService = $e->get(AuthenticationService::class);
                    return new View\Helper\GetUserName($authenticationService);
                },
                'isLoggedIn' => function($e) {
                    $authenticationService = $e->get(AuthenticationService::class);
                    return new View\Helper\IsLoggedIn($authenticationService);
                },
            ],
        ];
    }

}
