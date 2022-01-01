<?php

namespace LaminasAdminLTE\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use LaminasAdminLTE\ModuleOptions\ModuleOptions;
use LaminasAdminLTE\ThemeOptions\LayoutOption;

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
        $vm = new ViewModel();
        $this->layout()->pageTitle = 'Example Page';
        $layoutType = $this->params()->fromRoute('layout_type');
        switch ($layoutType){
            case  'top-navigation' :
                $this->layout()->setTemplate(LayoutOption::topNavigation);
                $vm->setOption('lockLayout', true);
                break;
            case 'boxed' :
                $this->layout()->setTemplate(LayoutOption::boxed);
                $vm->setOption('lockLayout', true);
                break;
            case 'sidebar' :
                $this->layout()->setTemplate(LayoutOption::sidebar);
                $vm->setOption('lockLayout', true);
                break;
            case 'top-nav-with-sidebar' :
                $this->layout()->setTemplate(LayoutOption::topNavWithSidebar);
                $vm->setOption('lockLayout', true);
                break;
            case true:
                $this->layout()->setTemplate(LayoutOption::default);
        }
        return $vm;
    }
}
