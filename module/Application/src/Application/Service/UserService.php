<?php
namespace Application\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Application\Repository\UserRepository;

class UserService implements 
                    ServiceLocatorAwareInterface,
                    EventManagerAwareInterface{
    
    private $userRepository;
    private $serviceLocator;
    private $eventManager;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getServiceLocator() {
        return $this->serviceLocator;
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }

    public function getEventManager(){
        if (!$this->eventManager) { 
             $this->setEventManager(new EventManager(__CLASS__)); 
        }
        return $this->eventManager;
    }

    public function setEventManager(EventManagerInterface $eventManager) {
        $this->eventManager = $eventManager;
    }

    public function find($id){
        return $this->userRepository->find($id);
    }
    
    public function insert($entity){
        $this->userRepository->insert($entity);
    }
    
    public function delete($entity){
        $this->userRepository->delete($entity);
    }
    
    public function update($entity){
        $this->userRepository->update($entity);
    }

    public function login() {
        $loggedIn = true;
        $this->getEventManager()->trigger('login', $this, array('loggedIn' => $loggedIn));
        
        return $loggedIn;
    }

    public function logout() {
        $loggedOut = true;
        $this->getEventManager()->trigger('logout', $this, array('loggedOut' => $loggedOut));
        
        return $loggedOut;
    }
}
