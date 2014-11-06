<?php
namespace Application\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Di\Di;

class UserServiceFactory implements FactoryInterface{
    
    public function createService(ServiceLocatorInterface $serviceLocator) {
        // Setting dependencies
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $userRepository = $entityManager->getRepository('Application\Entity\User');
        
        // Injecting dependencies
        $di = new Di();
        $di->instanceManager()->setParameters('Application\Service\UserService', array(
            'userRepository' => $userRepository
        ));

        // Returning instance
        return $di->get('Application\Service\UserService');
    }

}