<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 5/24/17
 * Time: 11:51 AM
 */

namespace NegaritSMS\Entities;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseTable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(name="user_name", type="string", unique=true, nullable=false)
     */
    protected $userName;
    /**
     * @ORM\Column(name="user_pass", type="string", unique=false, nullable=false)
     */
    protected $userPass;
    /**
     * @ORM\Column(name="full_name", type="string", unique=false, nullable=false)
     */
    protected $fullName;
    /**
     * @ORM\Column(name="user_email", type="string", unique=true, nullable=true)
     */
    protected $email;
    /**
     * @ORM\Column(name="user_phone", type="string", unique=true, nullable=true)
     */
    protected $phone;
    /**
     * One Product has Many Features.
     * @ORM\ManyToOne(targetEntity="Privilege")
     * @ORM\JoinColumn(name="privilege_id", referencedColumnName="id")
     * @var Privilege $privilege
     */
    protected $privilege;

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

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return Privilege
     */
    public function getPrivilege()
    {
        return $this->privilege;
    }

    /**
     * @param Privilege $privilege
     */
    public function setPrivilege($privilege)
    {
        $this->privilege = $privilege;
    }


    public function getArray(){
        return array(
            'id'=>$this->getId(),
            'user_name'=>$this->getUserName(),
            'full_name'=>$this->getFullName(),
            'email'=>$this->getEmail(),
            'phone'=>$this->getPhone(),
//            'privilege'=>$this->getPrivilege()->getArray(),
            'is_deleted'=>$this->getIsDeleted(),
            'is_active'=>$this->getIsActive(),
            'updated_by'=>$this->getUpdatedBy()->getFullName(),
            'updated_date'=>$this->getUpdatedDate(),
            'created_by'=>$this->getCreatedBy()->getFullName(),
            'created_date'=>$this->getCreatedDate(),
        );
    }
}