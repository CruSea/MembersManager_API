<?php
/**
 * Created by PhpStorm.
 * User: fre
 * Date: 6/17/17
 * Time: 6:28 PM
 */

namespace MembersManager\Entities;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="MembersPlege")
 */
class MembersPlege
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
     * @ORM\Column(name="monthly", type="float", unique=true, nullable=false)
     */
    protected $monthly;

    /**
     * @ORM\Column(name="yearly", type="float", unique=true, nullable=false)
     */
    protected $yearly;

    /**
     * @ORM\Column(name="specialGift", type="float", unique=true, nullable=false)
     */
    protected $specialGift;

    /**
     * @ORM\Column(name="otherSupport", type="string", unique=true, nullable=false)
     */
    protected $otherSupport;

    /**
     * @return mixed
     */
    public function getOtherSupport()
    {
        return $this->otherSupport;
    }

    /**
     * @param mixed $otherSupport
     */
    public function setOtherSupport($otherSupport)
    {
        $this->otherSupport = $otherSupport;
    }


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
    public function getMonthly()
    {
        return $this->monthly;
    }

    /**
     * @param mixed $monthly
     */
    public function setMonthly($monthly)
    {
        $this->monthly = $monthly;
    }

    /**
     * @return mixed
     */
    public function getYearly()
    {
        return $this->yearly;
    }

    /**
     * @param mixed $yearly
     */
    public function setYearly($yearly)
    {
        $this->yearly = $yearly;
    }

    /**
     * @return mixed
     */
    public function getSpecialGift()
    {
        return $this->specialGift;
    }

    /**
     * @param mixed $specialGift
     */
    public function setSpecialGift($specialGift)
    {
        $this->specialGift = $specialGift;
    }


    public function getArray(){
        return array(
            'id'=>$this->getId(),
            'member_id'=>$this->getMemberId(),
            'monthly'=>$this->getMonthly(),
            'yearly'=>$this->getYearly(),
            'specialGift'=>$this->getSpecialGift(),
            'otherSupport'=>$this->getOtherSupport(),

        );
    }

}