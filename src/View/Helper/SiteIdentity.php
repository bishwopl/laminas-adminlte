<?php

/**
 * 
 * @author Bishwo Prasad Lamichhane <bishwo.prasad@gmail.com>
 */

namespace LaminasAdminLTE\View\Helper;
use Laminas\View\Helper\AbstractHelper;

class SiteIdentity extends AbstractHelper
{
    protected $config;

    public function __construct($config) {
        $this->config = $config;
    }

    /**
     * 
     * @param string $type
     * @return mixed
     */
    public function __invoke($type)
    {
        if(isset($this->config[$type])){
            return $this->config[$type];
        }
        return '';
    }
}