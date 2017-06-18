<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/17/17
 * Time: 1:26 PM
 */

namespace MembersManager\Services;


use MembersManager\Entities\Group;
use MembersManager\Entities\MemberProfile;
use MembersManager\Entities\Privilege;
use MembersManager\Entities\User;
use MembersManager\Entities\MembersPlege;
use MembersManager\Entities\MemberAddress;
use MembersManager\Entities\MemberContact;


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

    /**
     * Member Profiles
     * @return mixed
     */
    public function addGroup(Group $group);
    public function getGroup(Group $group);
    public function getAllGroup();
    public function updateGroup(Group $group);
    public function removeGroup(Group $group);

    /**
     * Member Profiles
     * @return mixed
     */
    public function addMembersPlege(MembersPlege $membersPlege);
    public function getMembersPlege(MembersPlege $membersPlege);
    public function getAllMembersPlege();
    public function updateMemberPlege(MembersPlege $membersPlege);
    public function removeMemberPlege(MembersPlege $membersPlege);


    /**
     * Member Address
     * @return mixed
     */
    public function addMembersAddress(MemberAddress $membersAddress);
    public function getMembersAddress(MemberAddress $membersAddress);
    public function getAllMembersAddress();
    public function updateMembersAddress(MemberAddress $membersAddress);
    public function removeMembersAddress(MemberAddress $membersAddress);



    /**
     * Member Contact
     * @return mixed
     */
    public function addMembersContact(MemberContact $memberContact);
    public function getMembersContact(MemberContact $memberContact);
    public function getAllMembersContact();
    public function updateMemberContact(MemberContact $memberContact);
    public function remveMemberContact(MemberContact $memberContact);

}