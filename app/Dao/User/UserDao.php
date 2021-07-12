<?php

class UserDao implements UserDaoInterface
{
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
}
