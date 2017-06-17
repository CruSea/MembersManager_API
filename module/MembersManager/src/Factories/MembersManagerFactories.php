<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/17/17
 * Time: 1:27 PM
 */

namespace MembersManager\Factories;


use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use MembersManager\Controller\MembersController;
use MembersManager\Services\Service;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class MembersManagerFactories implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new MembersController(new Service($entityManager));
    }
}