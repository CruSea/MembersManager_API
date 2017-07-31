<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

$dbParams = array(
    'hostname' => '127.0.0.1',  // IMS Server
//    'hostname' => 'localhost:8889', // Localserver

//    'dbname' => 'MembersManagement', // Local Server
    'dbname' => 'IMSMembership_Production', // IMS Production Server
//    'dbname' => 'IMSMembership_Staging', // IMS Staging Server

//    'port' => 8889, // Local Server
//    'port' => 3306, // IMS Server

    'username' => 'bengeos',
    'password' => 'passben',

//    'database' => 'MembersManagement' // Local Server
    'database' => 'IMSMembership_Production'  // IMS Production Server
//    'database' => 'IMSMembership_Staging'  // IMS Staging Server
);
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'params' => array(
                    'host' => $dbParams['hostname'],
                    'port' => $dbParams['port'],
                    'user' => $dbParams['username'],
                    'password' => $dbParams['password'],
                    'dbname' => $dbParams['database'],
                    'driverOptions' => array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                    ),
                )
            )
        )
    )
);
