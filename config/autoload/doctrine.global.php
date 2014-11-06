<?php
/**
 * Doctrine's database connection for production enviroment.
 */
return array(
  'doctrine' => array(
    'connection' => array(
        'orm_default' => array(
          'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
          'params' => array(
            'host'     => 'myhost',
            'port'     => '3306',
            'user'     => 'myuser',
            'password' => 'mypassword',
            'dbname'   => 'mydbname',
)))));