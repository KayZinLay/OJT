<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
    /**
     * Store register user data
     * @param Illuminate\Http\Request $request
     * @return
    */
    public function storeUser($request);
}