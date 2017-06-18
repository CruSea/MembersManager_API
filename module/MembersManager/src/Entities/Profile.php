<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/18/17
 * Time: 2:42 PM
 */

namespace MembersManager\Entities;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="profiles")
 */
class Profile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(name="user_name", type="string", unique=false, nullable=true)
     */
    protected $userName;
    /**
     * @ORM\Column(name="user_pass", type="string", unique=false, nullable=true)
     */
    protected $userPass;
}