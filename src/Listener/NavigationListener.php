<?php

namespace LaminasAdminLTE\Listener;

use Laminas\EventManager\AbstractListenerAggregate;
use Laminas\EventManager\EventManagerInterface;
use Laminas\EventManager\Event;
use CirclicalUser\Service\AccessService;

class NavigationListener extends AbstractListenerAggregate {

    /**
     *
     * @var \CirclicalUser\Service\AccessService 
     */
    protected $accessService;

    public function __construct(AccessService $accessService) {
        $this->accessService = $accessService;
    }

    public function attach(EventManagerInterface $events, $priority = -999): void  {
        $this->listeners[] = $events->attach(
                'isAllowed',
                [$this, 'accept'],
                $priority
        );
    }

    public function accept(Event $event): bool {
        /* @var $page \Laminas\Navigation\Page\Mvc */
        $page = $event->getParams()['page'];
        
        //\Symfony\Component\VarDumper\VarDumper::dump($page); die();
        
        $controllerName = $page->getController();
        $actions = $page->getAction();
        try{
            $allowed = true;
            if(!is_array($actions)){
                $actions = [$actions];
            }
            foreach ($actions as $ac){
                $allowed = $allowed && $this->accessService->canAccessAction($controllerName, $ac);
            }
            return $allowed;
        } catch (\Exception $ex) {
            echo $ex->getMessage(); die();
            return false;
        }
    }

}
