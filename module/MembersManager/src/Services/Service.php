<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/17/17
 * Time: 1:09 PM
 */

namespace MembersManager\Services;


use Doctrine\ORM\EntityManager;
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
            $foundUsers[] = $_user->getArray();
        }
        return $foundUsers;
    }

    public function updateUser(User $user)
    {
        // TODO: Implement updateUser() method.
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
            if($privilege->getId()>2){
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


}