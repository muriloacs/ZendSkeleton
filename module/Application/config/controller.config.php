<?php
/**
 * Controllers configuration.
 */

namespace Application;

return array(
    'invokables' => array(
        'Application\Controller\Index' => 'Application\Controller\IndexController'
    ),
    'factories' => array(
        'Application\Controller\User' => 'Application\Controller\Factory\UserControllerFactory'
    )
);
