<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 8/8/17
 * Time: 1:35 AM
 */

namespace MembersManager\Entities;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="meta_presbyteries")
 */

class Meta_Presbytery extends BaseTable
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
     * @ORM\Column(name="description", type="string", unique=false, nullable=true)
     */
    protected $description;
    /**
     * @ORM\ManyToOne(targetEntity="Meta_Synod")
     * @ORM\JoinColumn(name="synod_id", referencedColumnName="id")
     * @var Meta_Synod $synod
     */
    protected $synod;
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

}