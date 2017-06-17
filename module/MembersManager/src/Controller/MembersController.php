<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/17/17
 * Time: 1:08 PM
 */

namespace MembersManager\Controller;


use Doctrine\ORM\EntityManager;
use MembersManager\Services\Service;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class MembersController extends AbstractRestfulController
{
    /**
     * @var Service $ServiceManager
     */
    protected $ServiceManager;

    /**
     * MembersController constructor.
     * @param Service $ServiceManager
     */
    public function __construct(Service $ServiceManager)
    {
        $this->ServiceManager = $ServiceManager;
    }


    public function get($id)
    {
        return new JsonModel(array("API Controller"));
    }
    public function getList()
    {
        return new JsonModel(array("API Controller"));
    }
    public function create($data)
    {
        return new JsonModel(array("API POST Controller"));
    }
}