<?php
namespace Application\Listener;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;

class UserListener implements ListenerAggregateInterface{
    
    private $listeners = array();

    public function attach(EventManagerInterface $events) {
        $sharedManager = $events->getSharedManager();
        $this->listeners[] = $sharedManager->attach(
            'Application\Service\UserService', 
            'login', 
            array($this, 'login'),
            200
        );
        $this->listeners[] = $sharedManager->attach(
            'Application\Service\UserService', 
            'logout', 
            array($this, 'logout'),
            100
        );
    }

    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }
    
    public function login() {
        $path = ROOT_PATH . '/data/cache/UserLogin.txt';
        file_put_contents($path, 'Log in!!!');
    }
    
    public function logout() {
        $path = ROOT_PATH . '/data/cache/UserLogout.txt';
        file_put_contents($path, 'Log out!!!');
    }

}