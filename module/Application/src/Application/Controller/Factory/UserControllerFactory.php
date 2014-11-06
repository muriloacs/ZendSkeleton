<?php
namespace Application\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Di\Di;

class UserControllerFactory implements FactoryInterface{
    
    public function createService(ServiceLocatorInterface $serviceManager) {
        // Setting dependencies
        $serviceLocator = $serviceManager->getServiceLocator();
        $userService = $serviceLocator->get('Application\Service\UserService');
            
        // Injecting dependencies
        $di = new Di();
        $di->instanceManager()->setParameters('Application\Controller\UserController', array(
            'userService' => $userService
        ));

        // Returning instance
        return $di->get('Application\Controller\UserController');
    }

}

