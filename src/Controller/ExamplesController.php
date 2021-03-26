<?php

namespace LaminasAdminLTE\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use LaminasAdminLTE\ModuleOptions\ModuleOptions;

class ExamplesController extends AbstractActionController {

    /**
     * Module Options
     * @var \LaminasAdminLTE\ModuleOptions\ModuleOptions 
     */
    private $options;

    public function __construct(ModuleOptions $options) {
        $this->options = $options;
    }
    
    public function indexAction() {
        $this->layout()->pageTitle = 'Example Page';
        return new ViewModel();
    }
}
