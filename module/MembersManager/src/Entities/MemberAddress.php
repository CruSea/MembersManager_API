<?php
/**
 * Created by PhpStorm.
 * User: fre
 * Date: 6/17/17
 * Time: 5:56 PM
 */

namespace MembersManager\Entities;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="memberAddress")
 */
class MemberAddress
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
     * @ORM\Column(name="country", type="string", unique=true, nullable=false)
     */
    protected $country;

    /**
     * @ORM\Column(name="nationality", type="string", unique=true, nullable=false)
     */
    protected $nationality;

    /**
     * @ORM\Column(name="region", type="string", unique=true, nullable=false)
     */
    protected $region;

    /**
     * @ORM\Column(name="city", type="string", unique=true, nullable=false)
     */
    protected $city;

    /**
     * @ORM\Column(name="woreda", type="string", unique=true, nullable=false)
     */
    protected $woreda;

    /**
     * @ORM\Column(name="kebele", type="string", unique=true, nullable=false)
     */
    protected $kebele;

    /**
     * @ORM\Column(name="houseNumber", type="string", unique=true, nullable=false)
     */
    protected $houseNumber;

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
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getWoreda()
    {
        return $this->woreda;
    }

    /**
     * @param mixed $woreda
     */
    public function setWoreda($woreda)
    {
        $this->woreda = $woreda;
    }

    /**
     * @return mixed
     */
    public function getKebele()
    {
        return $this->kebele;
    }

    /**
     * @param mixed $kebele
     */
    public function setKebele($kebele)
    {
        $this->kebele = $kebele;
    }

    /**
     * @return mixed
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * @param mixed $houseNumber
     */
    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;
    }

    public function getArray(){
        return array(
            'id'=>$this->getId(),
            'member_id'=>$this->getMemberId(),
            'country'=>$this->getCountry(),
            'nationality'=>$this->getNationality(),
            'region'=>$this->getRegion(),
            'city'=>$this->getCity(),
            'woreda'=>$this->getWoreda(),
            'keble'=>$this->getKebele(),
            'houseNumber'=>$this->getHouseNumber(),
        );
    }
}