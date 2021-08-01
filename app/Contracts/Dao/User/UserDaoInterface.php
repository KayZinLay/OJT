<?php


namespace App\Contracts\Dao\User;

interface UserDaoInterface
{

     /**
     * Get user data by search criteria
     * @param -
     * @return UserObject
     */
    public function getAllUserList($userCriteria);

    /**
     * create UserProfile
     * @param -
     * @return Object
     */
    public function storeUser($user);

    /**
      * Get user data by id
      * @param int
      * @return User
      */
      public function getUserDataById($userId);

    /**
     * Delete user data
     * @param Integer $userId
     * @return Boolean
     */
    public function deleteUser($userId);

    /**
      * Get user data by id
      * @param int
      * @return User
      */
      public function getEditUserById($userId);

      /**
     * Update user data
     * @param User
     * @return int 
     */
    public function updateUser($user);

}