<?php
namespace Application\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Application\Service\UserService;
 
class UserController extends AbstractActionController
{
    protected $userService;
    
    public function __construct(UserService $userService) 
    {
        $this->userService = $userService;
    }  
    
    public function loginAction() {
        $loggedIn = $this->userService->login();
        
        return array(
            'loggedIn'  => $loggedIn
        );
    }

    public function logoutAction() {
        $loggedOut = $this->userService->logout();
        
        return array(
            'loggedOut'  => $loggedOut
        );
    }
    
}