<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/17/17
 * Time: 1:26 PM
 */

namespace MembersManager\Services;


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
    public function checkUser(User $user);
    public function updateUser(User $user);
    public function removeUser(User $user);

    /**
     * Company Privilege
     * @return mixed
     */
    public function addPrivilege(Privilege $privilege);
    public function getPrivilege(Privilege $privilege);
    public function getAllPrivilege();
    public function getLessPrivilege(Privilege $privilege);
}