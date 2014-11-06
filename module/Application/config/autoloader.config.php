<?php
/**
 * Autoloaders configuration.
 */

namespace Application;

return array(
    'Zend\Loader\StandardAutoloader' => array(
        'namespaces' => array(
            __NAMESPACE__       => __DIR__ . '/../src/' . __NAMESPACE__
        ),
        'prefixes' => array(
            
        )
    )
);
