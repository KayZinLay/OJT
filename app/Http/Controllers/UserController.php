<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Contracts\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Storage;

class UserController extends Controller
{
    private $userService;

    /**
     * Constructor
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

   /**
     * Get user data by search criteria
     * @param \Illuminate\Http\Request
     * @return userDataList(User Object)
     */
    public function getAllUserList(Request $request)
    {
        // set criteria
        $userCriteria = [
            'name' => (isset($_GET['name']) ? $_GET['name'] : ''),
            'email' => (isset($_GET['email']) ? $_GET['email'] : ''),
            'createfrom' => (isset($_GET['createdFrom']) ? $_GET['createdFrom'] : ''),
            'createto' => (isset($_GET['createdTo']) ? $_GET['createdTo'] : ''),
        ];
        // get user data by criteria
        $userDataList = $this->userService->getAllUserList($userCriteria);
        return view('user.userlist', compact('userDataList'));
        
    }

    /**
     * Get initial data for user register screen
     * @param -
     * @return view
     */
    public function getUserRegisterInit()
    {
        return view('user.user_register');
    }

    /**
     * Get initial data for user register screen
     * @param \Illuminate\Http\Request  $request
     * @return view
     */
    // public function confrimUser(Request $request)
    // {
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->type = $request->type;
    //     $user->phone = $request->phone;
    //     $user->dob = $request->dob;
    //     $user->address = $request->address;
    //     return view('user.userconfirm', compact('user'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNewUserData(Request $request)
    {
        // validation for user 
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'required|confirmed|min:6',
            'password' => 'min:6|required_with:confrimpassword|same:confrimpassword',
            'confrimpassword' => 'min:6',
            'profile' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
    
        $filename = $request->file('profile')->getClientOriginalName();
        $path = $request->profile->storeAs('public/image', $filename);
        //$path = $request->file('profile')->move(public_path().'/images');
        $this->userService->storeUser($request,$filename);
        return redirect()->route('userlist');
    }

    /**
     * Get initial data for user edit screen
     * @param -
     * @return view
     */
    public function getUserDataById()
    {
        // get user data
        $id = Auth::id();
        $user = $this->userService->getUserDataById($id);
        return view('user.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        
        if ($request->hasFile('profile') && $request->profile != '') {

            $user = $this->userService->getUserDataById($id);
            
            $path = storage_path().'/images/'.$user['profile'];
            
            //code for remove old file
            if(Storage::exists($path)) {
                unlink($path); //delete from storage
             }
  
            //upload new file
            $filename = $request->file('profile')->getClientOriginalName();
            $file = $request->file('profile')->storeAs('public/images', $filename); //new file path
            $this->userService->updateUser($request, $id, $filename);
        }
        
        return redirect()->route('userlist');
    }

    /**
     * Delete user data
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(Request $request)
    {
        $result = false;
        if (isset($request->id)) {
            $result = $this->userService->deleteUser($request->id);
        }
        
        return redirect()->route('userlist');
    }

    /**
     * Get initial data for user edit screen
     * @param int
     * @return view
     */
    public function getEditUserById($userId)
    {
        // get user data
        $user = $this->userService->getEditUserById($userId);
        return view('user.update', compact('user'));
    }

    /**
     * Get initial data for user password change screen
     * @param -
     * @return view
     */
    public function changeInitPassword()
    {
        return view('user.changepwd');
    }

    /**
     * Change Password
     * @param -
     * @return view
     */
    public function changePassword(Request $request)
    {
        $this->userService->changePassword($request);
        return redirect()->route('userlist');

    }
}
