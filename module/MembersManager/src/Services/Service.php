<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/17/17
 * Time: 1:09 PM
 */

namespace MembersManager\Services;


use Doctrine\ORM\EntityManager;

class Service
{
    /**
     * @var EntityManager $EntityManage
     */
    protected $EntityManage;

    /**
     * Service constructor.
     * @param EntityManager $EntityManage
     */
    public function __construct(EntityManager $EntityManage)
    {
        $this->EntityManage = $EntityManage;
    }

}