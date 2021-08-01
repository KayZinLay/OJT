<?php
namespace App\Dao\User;

use DB;
use App\Models\User;
use App\Contracts\Dao\User\UserDaoInterface;
use Illuminate\Support\Facades\Auth;

class UserDao implements UserDaoInterface
{

    /**
     * Get user data by search criteria
     * @param $userCriteria(Array)
     * @return UserObject
     */
    public function getAllUserList($userCriteria)
    {
        
        $users = User::select()->whereNull('deleted_at')
                                ->whereNull('deleted_user_id');
                if (! empty($userCriteria['name'])) {
                    $users ->where('name', 'like', '%' . $userCriteria['name'] . '%');
                }
                if (! empty($userCriteria['email'])) {
                    $users ->where('email', $userCriteria['email']);
                }
                if (! empty($userCriteria['createfrom']) && ! empty($userCriteria['createto'])) {
                    $users ->whereBetween('created_at', [$userCriteria['createfrom'], $userCriteria['createto']]);
                }

        $users = $users->orderBy('users.id','desc')->paginate(5,array('users.*'));
       
        return $users;
        
    }

   /**
     * Store register user data
     * @param User
     * @return
     */
    public function storeUser($user)
    {
        $user->save();
        return $user->id;
    }

    /**
     * Get user data by id
     * @param -
     * @return User
     */
    public function getUserDataById($userId)
    {
        return User::find($userId);
    }

    /**
     * Get user data by id
     * @param -
     * @return User
     */
    public function getEditUserById($userId)
    {
        return User::find($userId);
    }


    /**
     * Update user data
     * @param User
     * @return int
     */
    public function updateUser($user)
    {
        return $user->update();
    }

    /**
     * Delete user data
     * @param Array $userIdArr
     * @return Boolean
     */
    public function deleteUser($userId)
    {
        $user_id = User::find($userId)->id;
        User::where('id', $user_id)->update([
            'deleted_user_id' => Auth::user()->id,
            'deleted_at' => now()
        ]);
        return true;
    }

    /**
     * Update user password
     * @param User
     * @return int
     */
    public function updatePassword($user)
    {
        return $user->update();
    }

}
