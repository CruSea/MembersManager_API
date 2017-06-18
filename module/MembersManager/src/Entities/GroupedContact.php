<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/17/17
 * Time: 8:12 PM
 */

namespace MembersManager\Entities;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="grouped_contacts",uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"group_id", "member_profile_id"})})
 */
class GroupedContact extends BaseTable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="Group")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     * @var Group $group
     */
    protected $group;
    /**
     * @ORM\ManyToOne(targetEntity="MemberProfile")
     * @ORM\JoinColumn(name="member_profile_id", referencedColumnName="id")
     * @var MemberProfile $memberProfile
     */
    protected $memberProfile;

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
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param Group $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return MemberProfile
     */
    public function getMemberProfile()
    {
        return $this->memberProfile;
    }

    /**
     * @param MemberProfile $memberProfile
     */
    public function setMemberProfile($memberProfile)
    {
        $this->memberProfile = $memberProfile;
    }



    public function getArray(){
        return array(
            'id'=>$this->getId(),
            'group'=>$this->getGroup()->getArray(),
            'member_profile'=>$this->getMemberProfile()->getArray(),
            'is_deleted'=>$this->getIsDeleted(),
            'is_active'=>$this->getIsActive(),
            'updated_by'=>$this->getUpdatedBy()->getFullName(),
            'updated_date'=>$this->getUpdatedDate(),
            'created_by'=>$this->getCreatedBy()->getFullName(),
            'created_date'=>$this->getCreatedDate(),
        );
    }
}