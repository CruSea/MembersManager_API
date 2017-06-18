<?php
/**
 * Created by PhpStorm.
 * User: fre
 * Date: 6/17/17
 * Time: 5:57 PM
 */

namespace MembersManager\Entities;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="memberContact")
 */
class MemberContact extends BaseTable
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     *
     * @ORM\ManyToOne(targetEntity="MemberProfile")
     * @ORM\JoinColumn(name="member_id", referencedColumnName="id")
     * @var MemberProfile $member_id
     */
    protected $member_id;


    /**
     * @ORM\Column(name="officePhone", type="string", unique=true, nullable=false)
     */
    protected $officePhone;

    /**
     * @ORM\Column(name="homePhone", type="string", unique=true, nullable=false)
     */
    protected $homePhone;


    /**
     * @ORM\Column(name="POBOX", type="string", unique=true, nullable=false)
     */
    protected $POBOX;

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
     * @return MemberProfile
     */
    public function getMemberId()
    {
        return $this->member_id;
    }

    /**
     * @param MemberProfile $member_id
     */
    public function setMemberId($member_id)
    {
        $this->member_id = $member_id;
    }

    /**
     * @return mixed
     */
    public function getOfficePhone()
    {
        return $this->officePhone;
    }

    /**
     * @param mixed $officePhone
     */
    public function setOfficePhone($officePhone)
    {
        $this->officePhone = $officePhone;
    }

    /**
     * @return mixed
     */
    public function getHomePhone()
    {
        return $this->homePhone;
    }

    /**
     * @param mixed $homePhone
     */
    public function setHomePhone($homePhone)
    {
        $this->homePhone = $homePhone;
    }

    /**
     * @return mixed
     */
    public function getPOBOX()
    {
        return $this->POBOX;
    }

    /**
     * @param mixed $POBOX
     */
    public function setPOBOX($POBOX)
    {
        $this->POBOX = $POBOX;
    }

    public function getArray(){
        return array(
            'id'=>$this->getId(),
            'member_id'=>$this->getMemberId(),
            'officePhone'=>$this->getOfficePhone(),
            'homePhone'=>$this->getHomePhone(),
            'POBOX'=>$this->getPOBOX(),
            'is_deleted'=>$this->getIsDeleted(),
            'is_active'=>$this->getIsActive(),
            'updated_by'=>$this->getUpdatedBy()->getFullName(),
            'updated_date'=>$this->getUpdatedDate(),
            'created_by'=>$this->getCreatedBy()->getFullName(),
            'created_date'=>$this->getCreatedDate(),
        );
    }
}