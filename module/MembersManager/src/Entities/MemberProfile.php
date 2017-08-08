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
     * @ORM\ManyToOne(targetEntity="Meta_Country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * @var Meta_Country $country
     */
    protected $country;
    /**
     * @ORM\ManyToOne(targetEntity="Meta_Region")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * @var Meta_Region $region
     */
    protected $region;
    /**
     * @ORM\ManyToOne(targetEntity="Meta_City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * @var Meta_City $city
     */
    protected $city;
    /**
     * @ORM\Column(name="wereda", type="string", unique=false, nullable=true)
     */
    protected $wereda;
    /**
     * @ORM\Column(name="kebele", type="string", unique=false, nullable=true)
     */
    protected $kebele;
    /**
     * @ORM\Column(name="house_number", type="string", unique=false, nullable=true)
     */
    protected $houseNumber;
    /**
     * @ORM\Column(name="postal_box", type="string", unique=false, nullable=true)
     */
    protected $postalBox;
    /**
     * @ORM\ManyToOne(targetEntity="Meta_Synod")
     * @ORM\JoinColumn(name="synod_id", referencedColumnName="id")
     * @var Meta_Synod $synod
     */
    protected $synod;
    /**
     * @ORM\ManyToOne(targetEntity="Meta_Presbytery")
     * @ORM\JoinColumn(name="presbytery_id", referencedColumnName="id")
     * @var Meta_Presbytery $presbytery
     */
    protected $presbytery;
    /**
     * @ORM\ManyToOne(targetEntity="Meta_Congregation")
     * @ORM\JoinColumn(name="congregation_id", referencedColumnName="id")
     * @var Meta_Congregation $congregation
     */
    protected $congregation;
    /**
     * @ORM\Column(name="other_congregation", type="string", unique=false, nullable=true)
     */
    protected $otherCongregation;
    /**
     * @ORM\ManyToOne(targetEntity="Meta_Occupation")
     * @ORM\JoinColumn(name="occupation_id", referencedColumnName="id")
     * @var Meta_Occupation $occupation
     */
    protected $occupation;
    /**
     * @ORM\Column(name="other_occupation", type="string", unique=false, nullable=true)
     */
    protected $otherOccupation;
    /**
     * @ORM\Column(name="educational_background", type="string", unique=false, nullable=true)
     */
    protected $educationalBackground;
    /**
     * @ORM\Column(name="qualification", type="string", unique=false, nullable=true)
     */
    protected $qualification;

    public function getArray(){
        return array(
            'id'=>$this->getId(),
            'full_name'=>$this->getFirstName()." ".$this->getMiddleName()." ".$this->getLastName(),
            'first_name'=>$this->getFirstName(),
            'middle_name'=>$this->getMiddleName(),
            'last_name'=>$this->getLastName(),
            'phone'=>$this->getPhone(),
            'email'=>$this->getEmail(),
            'age'=>$this->getAge(),
            'sex'=>$this->getSex(),
            'qualification'=>$this->getQualification(),
            'educational_background'=>$this->getEducationalBackground(),
            'other_occupation'=>$this->getEducationalBackground(),
            'other_congregation'=>$this->getOtherCongregation(),
            'postal_box'=>$this->getPostalBox(),
            'house_number'=>$this->getHouseNumber(),
            'kebele'=>$this->getKebele(),
            'wereda'=>$this->getWereda(),
            'congregation'=>$this->getCongregation()?$this->getCongregation()->getName():"",
            'occupation'=>$this->getOccupation()?$this->getOccupation()->getName():"",
            'occupation'=>$this->getOccupation()?$this->getOccupation()->getName():"",
            'presbytery'=>$this->getPresbytery()?$this->getPresbytery()->getName():"",
            'synod'=>$this->getSynod()?$this->getSynod()->getName():"",
            'city'=>$this->getCity()?$this->getCity()->getName():"",
            'region'=>$this->getRegion()?$this->getRegion()->getName():"",
            'country'=>$this->getCountry()?$this->getCountry()->getName():"",
            'is_deleted'=>$this->getIsDeleted(),
            'is_active'=>$this->getIsActive(),
            'updated_by'=>$this->getUpdatedBy()->getFullName(),
            'updated_date'=>$this->getUpdatedDate(),
            'created_by'=>$this->getCreatedBy()->getFullName(),
            'created_date'=>$this->getCreatedDate(),
        );
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

    /**
     * @return Meta_Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param Meta_Country $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return Meta_Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param Meta_Region $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return Meta_City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param Meta_City $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getWereda()
    {
        return $this->wereda;
    }

    /**
     * @param mixed $wereda
     */
    public function setWereda($wereda)
    {
        $this->wereda = $wereda;
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

    /**
     * @return mixed
     */
    public function getPostalBox()
    {
        return $this->postalBox;
    }

    /**
     * @param mixed $postalBox
     */
    public function setPostalBox($postalBox)
    {
        $this->postalBox = $postalBox;
    }

    /**
     * @return Meta_Synod
     */
    public function getSynod()
    {
        return $this->synod;
    }

    /**
     * @param Meta_Synod $synod
     */
    public function setSynod($synod)
    {
        $this->synod = $synod;
    }

    /**
     * @return Meta_Presbytery
     */
    public function getPresbytery()
    {
        return $this->presbytery;
    }

    /**
     * @param Meta_Presbytery $presbytery
     */
    public function setPresbytery($presbytery)
    {
        $this->presbytery = $presbytery;
    }

    /**
     * @return Meta_Congregation
     */
    public function getCongregation()
    {
        return $this->congregation;
    }

    /**
     * @param Meta_Congregation $congregation
     */
    public function setCongregation($congregation)
    {
        $this->congregation = $congregation;
    }

    /**
     * @return mixed
     */
    public function getOtherCongregation()
    {
        return $this->otherCongregation;
    }

    /**
     * @param mixed $otherCongregation
     */
    public function setOtherCongregation($otherCongregation)
    {
        $this->otherCongregation = $otherCongregation;
    }

    /**
     * @return Meta_Occupation
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @param Meta_Occupation $occupation
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
    }

    /**
     * @return mixed
     */
    public function getOtherOccupation()
    {
        return $this->otherOccupation;
    }

    /**
     * @param mixed $otherOccupation
     */
    public function setOtherOccupation($otherOccupation)
    {
        $this->otherOccupation = $otherOccupation;
    }

    /**
     * @return mixed
     */
    public function getEducationalBackground()
    {
        return $this->educationalBackground;
    }

    /**
     * @param mixed $educationalBackground
     */
    public function setEducationalBackground($educationalBackground)
    {
        $this->educationalBackground = $educationalBackground;
    }

    /**
     * @return mixed
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * @param mixed $qualification
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
    }





}