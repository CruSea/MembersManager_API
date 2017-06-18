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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getUserPass()
    {
        return $this->userPass;
    }

    /**
     * @param mixed $userPass
     */
    public function setUserPass($userPass)
    {
        $this->userPass = $userPass;
    }

    public function getArray(){
        return array(
            'id'=>$this->getId(),
            'user_name'=>$this->getUserName(),
            'user_pass'=>$this->getUserPass(),
        );
    }
}