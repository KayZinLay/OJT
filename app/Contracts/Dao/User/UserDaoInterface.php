<?php


namespace App\Contracts\Dao\User;

interface UserDaoInterface
{
    /**
     * create UserProfile
     * @param -
     * @return Object
     */
    public function storeUser($user);
}