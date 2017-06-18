<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/17/17
 * Time: 1:09 PM
 */

namespace MembersManager\Services;


use Doctrine\ORM\EntityManager;
use MembersManager\Entities\Group;
use MembersManager\Entities\MemberProfile;
use MembersManager\Entities\MemberAddress;
use MembersManager\Entities\MemberContact;
use MembersManager\Entities\MembersPlege;
use MembersManager\Entities\Privilege;
use MembersManager\Entities\User;

class Service implements ServieMethods
{
    /**
     * @var EntityManager $EntityManager
     */
    protected $EntityManager;

    /**
     * Service constructor.
     * @param EntityManager $EntityManager
     */
    public function __construct(EntityManager $EntityManager)
    {
        $this->EntityManager = $EntityManager;
    }


    public function addUser(User $user)
    {
        try{
            $user->setId(null);
            $user->setIsActive(0);
            $user->setIsDeleted(0);
            $user->setCreatedDate(new \DateTime('now'));
            $user->setUpdatedDate(new \DateTime('now'));
            $user->setUserPass(sha1($user->getUserPass()));
            $this->EntityManager->persist($user);
            $this->EntityManager->flush();
            if($user->getId()){
                return $user;
            }else{
                return null;
            }
        }catch (\Exception $exception){
            print $exception->getMessage();
        }
    }

    public function getUser(User $user)
    {
        if($user->getId()){
            $foundUser = $this->EntityManager->getRepository(User::class)->find($user->getId());
            return $foundUser;
        }else{
            return null;
        }
    }

    public function getUserByEmail(User $user)
    {
        // TODO: Implement getUserByEmail() method.
    }

    public function getUserByID(User $user)
    {
        // TODO: Implement getUserByID() method.
    }

    public function checkUser(User $user)
    {
        try{
            $allUsers = $this->EntityManager->getRepository(User::class)->findAll();
            foreach ($allUsers as $_user){
                /**
                 * @var User $_user
                 */
                if(($_user->getUserPass() == sha1($user->getUserPass())) && (($_user->getUserName() == $user->getUserName()) || ($_user->getEmail() == $user->getUserName()))){
                    return $_user;
                }
            }
        }catch (\Exception $exception){
            echo $exception->getMessage();
        }
        return null;
    }

    public function getAllUsers()
    {
        $foundUsers = [];
        $allUsers = $this->EntityManager->getRepository(User::class)->findAll();
        foreach ($allUsers as $_user){
            /**
             * @var User $_user
             */
            if(!$_user->getisDeleted()){
                $foundUsers[] = $_user->getArray();
            }
        }
        return $foundUsers;
    }

    public function updateUser(User $user)
    {
        try{
            if($user->getId()){
                $this->EntityManager->persist($user);
                $this->EntityManager->flush();
                if($user->getId()){
                    return $user;
                }
            }
            return null;
        }catch (\Exception $exception){
            print_r($exception);
            return null;
        }
    }

    public function removeUser(User $user)
    {
        // TODO: Implement removeUser() method.
    }

    public function addPrivilege(Privilege $privilege)
    {
        $privilege->setId(null);
        $privilege->setIsActive(1);
        $privilege->setIsDeleted(0);
        $privilege->setCreatedDate(new \DateTime('now'));
        $privilege->setUpdatedDate(new \DateTime('now'));
        $this->EntityManager->persist($privilege);
        $this->EntityManager->flush();
        if($privilege->getId()){
            return $privilege;
        }else{
            return null;
        }
    }

    public function getPrivilege(Privilege $privilege)
    {
        if($privilege->getId()){
            $foundPrivilege = $this->EntityManager->getRepository(Privilege::class)->find($privilege->getId());
            return $foundPrivilege;
        }else{
            return null;
        }
    }

    public function getAllPrivilege()
    {
        $foundPrivileges = [];
        $allPrivileges = $this->EntityManager->getRepository(Privilege::class)->findAll();
        foreach ($allPrivileges as $privilege){
            /**
             * @var Privilege $privilege
             */
            if($privilege->getId()>1){
                $foundPrivileges[] = $privilege->getArray();
            }
        }
        return $foundPrivileges;
    }

    public function getLessPrivilege(Privilege $privilege)
    {
        $foundPrivileges = [];
        $allPrivileges = $this->EntityManager->getRepository(Privilege::class)->findAll();
        foreach ($allPrivileges as $_privilege){
            /**
             * @var Privilege $_privilege
             */
            if($privilege->getId()<3){
                if($privilege->getId() <= $_privilege->getId()){
                    $foundPrivileges[] = $_privilege->getArray();
                }
            }else{
                if($privilege->getId() < $_privilege->getId()){
                    $foundPrivileges[] = $_privilege->getArray();
                }
            }
        }
        return $foundPrivileges;
    }

    public function addMemberProfile(MemberProfile $memberProfile)
    {
        $memberProfile->setId(null);
        $memberProfile->setIsActive(1);
        $memberProfile->setIsDeleted(0);
        $memberProfile->setCreatedDate(new \DateTime('now'));
        $memberProfile->setUpdatedDate(new \DateTime('now'));
        $this->EntityManager->persist($memberProfile);
        $this->EntityManager->flush();
        if($memberProfile->getId()){
            return $memberProfile;
        }else{
            return null;
        }
    }

    public function getMemberProfile(MemberProfile $memberProfile)
    {
        if($memberProfile->getId()){
            $foundMemberProfile = $this->EntityManager->getRepository(MemberProfile::class)->find($memberProfile->getId());
            return $foundMemberProfile;
        }else{
            return null;
        }
    }

    public function getAllMemberProfile()
    {
        $foundMemberProfile = [];
        $allMemberProfiles = $this->EntityManager->getRepository(MemberProfile::class)->findAll();
        foreach ($allMemberProfiles as $memberProfile){
            /**
             * @var MemberProfile $memberProfile
             */
            if(!$memberProfile->getisDeleted()){
                $foundMemberProfile[] = $memberProfile->getArray();
            }
        }
        return $foundMemberProfile;
    }

    public function updateMemberProfile(MemberProfile $memberProfile)
    {
        try{
            if($memberProfile->getId()){
                $this->EntityManager->persist($memberProfile);
                $this->EntityManager->flush();
                if($memberProfile->getId()){
                    return $memberProfile;
                }
            }
            return null;
        }catch (\Exception $exception){
            print_r($exception);
            return null;
        }
    }

    public function removeMemberProfile(MemberProfile $memberProfile)
    {
        if($memberProfile){
            /**
             * @var User $foundUser
             */
            $foundMemberProfile = $this->getMemberProfile($memberProfile);
            if($foundMemberProfile){
                $this->EntityManager->remove($foundMemberProfile);
                $this->EntityManager->flush();
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    public function addGroup(Group $group)
    {
        $group->setId(null);
        $group->setIsActive(1);
        $group->setIsDeleted(0);
        $group->setCreatedDate(new \DateTime('now'));
        $group->setUpdatedDate(new \DateTime('now'));
        $this->EntityManager->persist($group);
        $this->EntityManager->flush();
        if($group->getId()){
            return $group;
        }else{
            return null;
        }
    }

    public function getGroup(Group $group)
    {
        if($group->getId()){
            $foundGroup = $this->EntityManager->getRepository(Group::class)->find($group->getId());
            return $foundGroup;
        }else{
            return null;
        }
    }

    public function getAllGroup()
    {
        $foundGroups = [];
        $allfoundGroups = $this->EntityManager->getRepository(MemberProfile::class)->findAll();
        foreach ($allfoundGroups as $group){
            /**
             * @var Group $group
             */
            if(!$group->getisDeleted()){
                $foundMemberProfile[] = $group->getArray();
            }
        }
        return $foundGroups;
    }

    public function updateGroup(Group $group)
    {
        try{
            if($group->getId()){
                $this->EntityManager->persist($group);
                $this->EntityManager->flush();
                if($group->getId()){
                    return $group;
                }
            }
            return null;
        }catch (\Exception $exception){
            print_r($exception);
            return null;
        }
    }

    public function removeGroup(Group $group)
    {
        if($group){
            /**
             * @var Group $foundGroup
             */
            $foundGroup = $this->getGroup($group);
            if($foundGroup){
                $this->EntityManager->remove($foundGroup);
                $this->EntityManager->flush();
                return true;
            }else{
                return false;
            }
        }
        return false;
    }



    public function addMembersAddress(MemberAddress $membersAddress)
    {
        $membersAddress->setId(null);
        $membersAddress->setIsActive(1);
        $membersAddress->setIsDeleted(0);
        $membersAddress->setCreatedDate(new \DateTime('now'));
        $membersAddress->setUpdatedDate(new \DateTime('now'));
        $this->EntityManager->persist($membersAddress);
        $this->EntityManager->flush();
        if($membersAddress->getId()){
            return $membersAddress;
        }else{
            return null;
        }
    }

    public function getAllMembersAddress()
    {
        $foundMemberAddress = [];
        $allMemberAddress = $this->EntityManager->getRepository(MemberAddress::class)->findAll();
        foreach ($allMemberAddress as $membersAddress){
            /**
             * @var MemberAddress $membersAddress
             */
            if(!$membersAddress->getisDeleted()){
                $foundMemberAddress[] = $membersAddress->getArray();
            }
        }
        return $foundMemberAddress;
    }

    public function getMembersAddress(MemberAddress $membersAddress)
    {
        if($membersAddress->getId()){
            $foundMemberAddress = $this->EntityManager->getRepository(MemberAddress::class)->find($membersAddress->getId());
            return $foundMemberAddress;
        }else{
            return null;
        }
    }

    public function removeMembersAddress(MemberAddress $membersAddress)
    {
        if($membersAddress){
            /**
             * @var MemberAddress $foundMemberAddress
             */
            $foundMemberAddress = $this->getMembersAddress($membersAddress);
            if($foundMemberAddress){
                $this->EntityManager->remove($foundMemberAddress);
                $this->EntityManager->flush();
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    public function updateMembersAddress(MemberAddress $membersAddress)
    {
        try{
            if($membersAddress->getId()){
                $this->EntityManager->persist($membersAddress);
                $this->EntityManager->flush();
                if($membersAddress->getId()){
                    return $membersAddress;
                }
            }
            return null;
        }catch (\Exception $exception){
            print_r($exception);
            return null;
        }
    }



    public function addMembersContact(MemberContact $memberContact)
    {
        $memberContact->setId(null);
        $memberContact->setIsActive(1);
        $memberContact->setIsDeleted(0);
        $memberContact->setCreatedDate(new \DateTime('now'));
        $memberContact->setUpdatedDate(new \DateTime('now'));
        $this->EntityManager->persist($memberContact);
        $this->EntityManager->flush();
        if($memberContact->getId()){
            return $memberContact;
        }else{
            return null;
        }
    }

    public function getAllMembersContact()
    {
        $foundMemberContact = [];
        $allMemberContact = $this->EntityManager->getRepository(MemberContact::class)->findAll();
        foreach ($allMemberContact as $memberContact){
            /**
             * @var MemberContact $memberContact
             */
            if(!$memberContact->getisDeleted()){
                $foundMemberContact[] = $memberContact->getArray();
            }
        }
        return $foundMemberContact;
    }

    public function getMembersContact(MemberContact $memberContact)
    {
        if($memberContact->getId()){
            $foundMemberContact = $this->EntityManager->getRepository(MemberContact::class)->find($memberContact->getId());
            return $foundMemberContact;
        }else{
            return null;
        }
    }

    public function updateMemberContact(MemberContact $memberContact)
    {
        try{
            if($memberContact->getId()){
                $this->EntityManager->persist($memberContact);
                $this->EntityManager->flush();
                if($memberContact->getId()){
                    return $memberContact;
                }
            }
            return null;
        }catch (\Exception $exception){
            print_r($exception);
            return null;
        }
    }

    public function remveMemberContact(MemberContact $memberContact)
    {
        if($memberContact){
            /**
             * @var MemberContact  $foundMemberContact
             */
            $foundMemberContact = $this->getMembersContact($memberContact);
            if($foundMemberContact){
                $this->EntityManager->remove($foundMemberContact);
                $this->EntityManager->flush();
                return true;
            }else{
                return false;
            }
        }
        return false;
    }



    public function addMembersPlege(MembersPlege $membersPlege)
    {
        $membersPlege->setId(null);
        $membersPlege->setIsActive(1);
        $membersPlege->setIsDeleted(0);
        $membersPlege->setCreatedDate(new \DateTime('now'));
        $membersPlege->setUpdatedDate(new \DateTime('now'));
        $this->EntityManager->persist($membersPlege);
        $this->EntityManager->flush();
        if($membersPlege->getId()){
            return $membersPlege;
        }else{
            return null;
        }
    }

    public function getAllMembersPlege()
    {
        $foundMemberPlege = [];
        $allMemberPlege = $this->EntityManager->getRepository(MembersPlege::class)->findAll();
        foreach ($allMemberPlege as $membersPlege){
            /**
             * @var MembersPlege $membersPlege
             */
            if(!$membersPlege->getisDeleted()){
                $foundMemberPlege[] = $membersPlege->getArray();
            }
        }
        return $foundMemberPlege;
    }

    public function getMembersPlege(MembersPlege $membersPlege)
    {
        if($membersPlege->getId()){
            $foundMembersPlege = $this->EntityManager->getRepository(MembersPlege::class)->find($membersPlege->getId());
            return $foundMembersPlege;
        }else{
            return null;
        }
    }

    public function removeMemberPlege(MembersPlege $membersPlege)
    {
        if($membersPlege){
            /**
             * @var MembersPlege $foundMemberPlege
             */
            $foundMembersPlege = $this->getMembersPlege($$membersPlege);
            if($foundMembersPlege){
                $this->EntityManager->remove($foundMembersPlege);
                $this->EntityManager->flush();
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    public function updateMemberPlege(MembersPlege $membersPlege)
    {
        try{
            if($membersPlege->getId()){
                $this->EntityManager->persist($membersPlege);
                $this->EntityManager->flush();
                if($membersPlege->getId()){
                    return $membersPlege;
                }
            }
            return null;
        }catch (\Exception $exception){
            print_r($exception);
            return null;
        }
    }
}