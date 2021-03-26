<?php

namespace LaminasAdminLTE\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use LaminasAdminLTE\ModuleOptions\ModuleOptions;

/**
 * Configuration values can be directly accessed from view
 */
class ConfigViewHelper extends AbstractHelper {
    /**
     * @var \LaminasAdminLTE\ModuleOptions\ModuleOptions 
     */
    private $moduleOptions;

    public function __construct(ModuleOptions $moduleOptions) {
        $this->moduleOptions = $moduleOptions;
    }

    /**
     * @return string 
     * @param string $configKey
     */
    public function __invoke($configKey) {
        return $this->moduleOptions->$configKey;
    }
}
