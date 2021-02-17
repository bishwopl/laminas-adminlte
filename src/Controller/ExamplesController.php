<?php

/**
 * @author Bishwo Prasad Lamichhane <bishwo.prasad@gmail.com>
 */

namespace LaminasAdminLTE\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use LaminasAdminLTE\ThemeOptions\LayoutOption;
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
        $layoutType = $this->params()->fromRoute('layout_type', NULL);
        $layoutType = $layoutType == NULL ? $layoutType = LayoutOption::$default : 'layout/' . $layoutType;
        $this->layout($layoutType);
        $this->layout()->pageTitle = 'Example Page';
        return new ViewModel();
    }
}
