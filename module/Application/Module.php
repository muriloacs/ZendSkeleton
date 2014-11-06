<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature;

class Module implements
                Feature\ConfigProviderInterface,
                Feature\AutoloaderProviderInterface,
                Feature\ServiceProviderInterface,
                Feature\ControllerProviderInterface,
                Feature\ViewHelperProviderInterface,
                Feature\ValidatorProviderInterface{

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        // Defining a different layout for each module
        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e){
            $controller = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            $config = $e->getApplication()->getServiceManager()->get('config');
            if (isset($config['module_layouts'][$moduleNamespace])) {
                $controller->layout($config['module_layouts'][$moduleNamespace]);
            }
        }, 100); 

        // This is how you define a listener to a given event
        $eventManager->attach(
                new \Application\Listener\UserListener()
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return include __DIR__ . '/config/autoloader.config.php';
    }

    public function getServiceConfig() {
        return include __DIR__ . '/config/service.config.php';
    }
    
    public function getControllerConfig() {
        return include __DIR__ . '/config/controller.config.php';
    }
    
    public function getViewHelperConfig() {
        return include __DIR__ . '/config/view-helper.config.php';
    }
    
    public function getValidatorConfig() {
        return include __DIR__ . '/config/validator.config.php';
    }

}