<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 8/8/17
 * Time: 1:38 AM
 */

namespace MembersManager\Entities;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="meta_congregations")
 */
class Meta_Congregation extends BaseTable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(name="name", type="string", unique=true, nullable=false)
     */
    protected $name;
    /**
     * @ORM\ManyToOne(targetEntity="Meta_Presbytery")
     * @ORM\JoinColumn(name="presbytery_id", referencedColumnName="id")
     * @var Meta_Presbytery $presbytery
     */
    protected $presbytery;
    /**
     * @ORM\Column(name="description", type="string", unique=false, nullable=true)
     */
    protected $description;
    public function getArray(){
        return array(
            'id'=>$this->getId(),
            'name'=>$this->getName(),
            'description'=>$this->getDescription(),
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
}