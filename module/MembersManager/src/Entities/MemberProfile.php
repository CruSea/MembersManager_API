<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/17/17
 * Time: 4:40 PM
 */

namespace MembersManager\Entities;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="members")
 */
class MemberProfile extends BaseTable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(name="first_Name", type="string", unique=false, nullable=false)
     */
    protected $firstName;
    /**
     * @ORM\Column(name="middle_name", type="string", unique=false, nullable=true)
     */
    protected $middleName;

    /**
     * @ORM\Column(name="last_Name", type="string", unique=false, nullable=true)
     */
    protected $lastName;
    /**
     * @ORM\Column(name="phone", type="string", unique=false, nullable=true)
     */
    protected $phone;
    /**
     * @ORM\Column(name="email", type="string", unique=false, nullable=true)
     */
    protected $email;

    /**
     * @ORM\Column(name="age", type="integer", unique=false, nullable=true)
     */
    protected $age;
    /**
     * @ORM\Column(name="sex", type="string", unique=false, nullable=true)
     */
    protected $sex;

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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param mixed $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    public function getArray(){
        return array(
            'id'=>$this->getId(),
            'first_name'=>$this->getFirstName(),
            'middle_name'=>$this->getMiddleName(),
            'last_name'=>$this->getLastName(),
            'phone'=>$this->getPhone(),
            'email'=>$this->getEmail(),
            'age'=>$this->getAge(),
            'sex'=>$this->getSex(),
            'is_deleted'=>$this->getIsDeleted(),
            'is_active'=>$this->getIsActive(),
            'updated_by'=>$this->getUpdatedBy()->getFullName(),
            'updated_date'=>$this->getUpdatedDate(),
            'created_by'=>$this->getCreatedBy()->getFullName(),
            'created_date'=>$this->getCreatedDate(),
        );
    }

}