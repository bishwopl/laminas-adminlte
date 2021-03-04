<?php

namespace LaminasAdminLTE\Service;

use Laminas\Navigation\Service\AbstractNavigationFactory;

/**
 * Default navigation factory.
 */
class CustomNavigationFactory extends AbstractNavigationFactory
{
    /**
     * @return string
     */
    protected function getName()
    {
        return 'laminas-adminlte-examples-navigation';
    }
}
