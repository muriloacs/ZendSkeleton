<?php
/**
 * Doctrine's database connection for development enviroment.
 *
 * Remove the .dist extension from this file to able a local connection.
 *
 * @NOTE: When .dist is removed this file is ignored from Git by default with the .gitignore included
 * in ZendSkeletonApplication. This is a good practice, as it prevents sensitive
 * credentials from accidentally being committed into version control.
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