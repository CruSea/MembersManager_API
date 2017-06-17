<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/17/17
 * Time: 1:09 PM
 */

namespace MembersManager\Services;


use Doctrine\ORM\EntityManager;
use MembersManager\Entities\MemberProfile;
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


}