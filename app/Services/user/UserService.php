<?php

namespace App\Services\user;

use App\Models\User;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserService implements UserServiceInterface
{
    private $userDao;

    /**
     * Constructor class
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
       
    }

    
    /**
      * Get user data by search criteria
      * @param $userCriteria
      * @return UserObject
      */
      public function getAllUserList($userCriteria)
      {
        return $this->userDao->getAllUserList($userCriteria);
      }


    /**
     * Store register user data
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param filename
     * @return
     */
    public function storeUser($request, $filename)
    {
        // save user information
        $userId = $this->userDao->storeUser($this->setUserData($request, $filename));
    }

    /**
     * Set user data to model
     * @param Illuminate\Http\Request $request
     * @return User
     */
    private function setUserData($request, $filename)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile = $filename;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->create_user_id = Auth::user()->id;
        $user->updated_user_id = Auth::user()->id;
        $user->created_at = now();
        $user->updated_at = now();
       
        return $user;
    }

     /**
      * Get user data by id
      * @param int
      * @return User
      */
    public function getUserDataById($userId)
      {
          return $this->userDao->getUserDataById($userId);
      }

      
    // /**
    //   * Get user data by id
    //   * @param int
    //   * @return User
    //   */
    public function getEditUserById($userId)
      {
          return $this->userDao->getEditUserById($userId);
      }


    /**
     * Update user data
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param int $id
     */
    public function updateUser($request, $id, $filename)
    {
        // update user data
        $user = $this->userDao->getUserDataById($id);
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            
            $user->profile = $filename;
            $user->type = $request->type;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->dob = $request->dob;
            $user->updated_user_id = Auth::user()->id;
            $user->updated_at = now();

            $this->userDao->updateUser($user);
        }
    }
    
    /**
     * Delete user data
     * @param String $userIds
     * @return Boolean
     */
    public function deleteUser($userId)
    {
        return $this->userDao->deleteUser($userId);
    }

    /**
     * Update user password
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param int $id
     */
    public function changePassword($request)
    {
        // update user password
        $id = Auth::user()->id;
        $user = $this->userDao->getUserDataById($id);
        if ($user) {
            if (isset($request->newpassword) && isset($request->confirmPwd)) {
                $user->password = Hash::make($request->newpassword);
                $user->updated_user_id = Auth::user()->id;
                $user->updated_at = NOW();
            }
            $this->userDao->updatePassword($user);
        }

    }



}