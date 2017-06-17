<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/17/17
 * Time: 1:26 PM
 */

namespace MembersManager\Services;


use MembersManager\Entities\MemberProfile;
use MembersManager\Entities\Privilege;
use MembersManager\Entities\User;

interface ServieMethods
{

    /**
     * User Table
     * @return mixed
     */
    public function addUser(User $user);
    public function getUser(User $user);
    public function getUserByEmail(User $user);
    public function getUserByID(User $user);
    public function getAllUsers();
    public function checkUser(User $user);
    public function updateUser(User $user);
    public function removeUser(User $user);

    /**
     * Privilege
     * @return mixed
     */
    public function addPrivilege(Privilege $privilege);
    public function getPrivilege(Privilege $privilege);
    public function getAllPrivilege();
    public function getLessPrivilege(Privilege $privilege);

    /**
     * Member Profiles
     * @return mixed
     */
    public function addMemberProfile(MemberProfile $memberProfile);
    public function getMemberProfile(MemberProfile $memberProfile);
    public function getAllMemberProfile();
    public function updateMemberProfile(MemberProfile $memberProfile);
    public function removeMemberProfile(MemberProfile $memberProfile);
}