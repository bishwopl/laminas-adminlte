<?php

namespace LaminasAdminLTE\ModuleOptions;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use LaminasAdminLTE\ModuleOptions\ModuleOptions;

class ModuleOptionsFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $config = $container->get('config')['laminas_adminlte'];
        return new ModuleOptions($config);
    }

}
