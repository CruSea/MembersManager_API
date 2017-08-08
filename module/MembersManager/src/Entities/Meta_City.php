<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 8/8/17
 * Time: 1:29 AM
 */

namespace MembersManager\Entities;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="meta_cities")
 */
class Meta_City
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
     * @ORM\ManyToOne(targetEntity="Meta_Region")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * @var Meta_Region $region
     */
    protected $region;
}