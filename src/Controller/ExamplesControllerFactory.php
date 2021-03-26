<?php

namespace LaminasAdminLTE\Controller;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use LaminasAdminLTE\Controller\ExamplesController;
use LaminasAdminLTE\ModuleOptions\ModuleOptions;

class ExamplesControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $moduleOptions = $container->get(ModuleOptions::class);
        return new ExamplesController($moduleOptions);
    }

}
