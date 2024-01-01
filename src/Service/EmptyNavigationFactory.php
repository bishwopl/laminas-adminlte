<?php

namespace LaminasAdminLTE\Service;

use Laminas\Navigation\Service\AbstractNavigationFactory;

/**
 * Default navigation factory.
 */
class EmptyNavigationFactory extends AbstractNavigationFactory
{
    /**
     * @return string
     */
    protected function getName()
    {
        return 'empty-navigation';
    }
}
