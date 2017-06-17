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
     * @ORM\Column(name="first_Name", type="string", unique=true, nullable=false)
     */
    protected $firstName;
    /**
     * @ORM\Column(name="middle_name", type="string", unique=true, nullable=false)
     */
    protected $middleName;

    /**
     * @ORM\Column(name="last_Name", type="string", unique=true, nullable=false)
     */
    protected $lastName;

    /**
     * @ORM\Column(name="age", type="integer", unique=true, nullable=false)
     */
    protected $age;
    /**
     * @ORM\Column(name="sex", type="string", unique=true, nullable=false)
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




    /**
     * @param mixed $qualification
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
    }

    public function getArray(){
        return array(
            'id'=>$this->getId(),
            'firstName'=>$this->getFirstName(),
            'lastName'=>$this->getLastName(),
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