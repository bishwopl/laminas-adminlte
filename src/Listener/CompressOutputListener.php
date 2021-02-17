<?php

/**
 * @author Bishwo Prasad Lamichhane <bishwo.prasad@gmail.com>
 */

namespace LaminasAdminLTE\Listener;

use Laminas\EventManager\AbstractListenerAggregate;
use Laminas\EventManager\EventManagerInterface;
use Laminas\Mvc\MvcEvent;
use LaminasAdminLTE\ModuleOptions\ModuleOptionsInterface;

class CompressOutputListener extends AbstractListenerAggregate {

    /**
     * @var \LaminasAdminLTE\ModuleOptions\ModuleOptionsInterface
     */
    private $moduleOptions;

    public function __construct(ModuleOptionsInterface $moduleOptions) {
        $this->moduleOptions = $moduleOptions;
    }

    /**
     * Priority must be lowest which prevents conflicts with any asset manager packages
     * @param EventManagerInterface $events
     * @param type $priority
     */
    public function attach(EventManagerInterface $events, $priority = 1) {
        $this->listeners[] = $events->attach(
                MvcEvent::EVENT_FINISH,
                [$this, 'compressOutput'],
                $priority
        );
    }

    public function compressOutput(MvcEvent $event): void {
        if ($this->moduleOptions->compressOutput == true) {
            $response = $event->getResponse();
            $content = $response->getBody();
            $header = $response->getHeaders();
            $acceptEncoding = $event->getRequest()->getServer('HTTP_ACCEPT_ENCODING');            
            $isMinifiedAsset = strpos($event->getRequest()->getRequestUri(), '.min.');
            
            //Leave the assets that are already minified
            if (strpos($acceptEncoding, 'gzip') !== false && $isMinifiedAsset == false) {
                //header('Content-Encoding: gzip');
                $header->addHeaderLine('Content-Encoding: gzip');
                $content = preg_replace(array('/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s', '#(?://)?<![CDATA[(.*?)(?://)?]]>#s'), array('>', '<', '\\1', "//&lt;![CDATA[n" . '1' . "n//]]>"), $content);
                $content = gzencode($content, $this->moduleOptions->compressionLevel);
            }
            $response->setContent($content);
        }
    }

}
