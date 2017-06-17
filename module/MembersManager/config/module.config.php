<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/17/17
 * Time: 1:07 PM
 */
namespace MembersManager;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use MembersManager\Controller\MembersController;
use MembersManager\Factories\MembersManagerFactories;

return array(
    'router' => array(
        'routes' => array(
            'members_api' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/api',
                    'defaults' => array(
                        'controller' => MembersController::class,
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            MembersController::class => MembersManagerFactories::class,
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
        'display_not_found_reason' => false,
        'display_exceptions' => false,
        'doctype' => 'HTML5',
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Entities')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entities' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
);