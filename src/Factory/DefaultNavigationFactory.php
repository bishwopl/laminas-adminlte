<?php

declare(strict_types=1);

namespace LaminasAdminLTE\Factory;

use CirclicalUser\Service\AccessService;
use Laminas\Navigation\Service\AbstractNavigationFactory;

/**
 * Default navigation factory.
 */
class DefaultNavigationFactory extends AbstractNavigationFactory {

    private AccessService $accessService;

    /**
     * @return string
     */
    protected function getName() {
        return 'default';
    }

    protected function getPages(\Psr\Container\ContainerInterface $container) {
        $this->accessService = $container->get(AccessService::class);
        $pages = parent::getPages($container);
        $filtered = $this->filterNavigation($pages);
        return $filtered;
        \Symfony\Component\VarDumper\VarDumper::dump($this->filterNavigation($pages));
        die();
    }
    
    private function filterNavigation(array $pages){
        $ret = [];
        //\Symfony\Component\VarDumper\VarDumper::dump($pages);die();
        foreach($pages as $pageKey => $page){
            $filtered = $this->filterPages($page);
            if(!is_null($filtered)){
                $ret[$pageKey] = $filtered;
            }
        }
        return $ret;
    }

    private function filterPages($page): ?array {
        //Reached last node
        if(!is_array($page)){
            return null;
        }
        $ret = [];
        $controllerName = $page['controller'];
        $actions = !is_array($page['action']) ? [$page['action']] : $page['action'];
        $allowed = true;
        foreach ($actions as $ac) {
            $allowed = $allowed && $this->accessService->canAccessAction($controllerName, $ac);
        }
        if($allowed){
            $ret = $page;
            unset($ret['pages']);
            if(isset($page['pages']) && is_array($page['pages'])){
                $ret['pages'] = $this->filterNavigation($page['pages']);
            }
            return $ret;
        }
        return null;
    }

}
