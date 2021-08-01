<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{

    /**
     * Get user data by search criteria
     * @param -
     * @return UserObject
     */
    public function getAllUserList($userCriteria);

    /**
     * Store register user data
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @return
    */
    public function storeUser($request,$filename);

    /**
      * Get user data by id
      * @param int
      * @return User
      */
    public function getUserDataById($userId);

    /**
     * Delete user data
     * @param int $userId
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
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param int $id
     */
    public function updateUser($request, $id, $filename);

}