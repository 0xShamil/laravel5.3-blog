<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AddNewUserRequest;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Message;
use App\Models\Role;

use Alert;

use App\Events\UserWasRegistered;

class UsersController extends BaseController
{
	public function __construct()
	{
		$this->middleware('can:manage-users');
	}

	public function show(User $user)
    {
    	return view('admin.users.index')->with([
    		'users' => $user->get(),
    	]);
    }

    public function showUserRegistrationForm(Role $role)
    {
    	return view('admin.users.add')->with([
    		'roles' => $role->get()
    	]);
    }

    public function registerUser(AddNewUserRequest $request)
    {
    	$user = User::create([
    		'first_name' => $request->input('first_name'),
    		'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->roles()->attach(Role::where('id', $request->input('role'))->first());

        event(new UserWasRegistered($user));

        /*$activationService->sendActivationMail($user);*/

        Alert::success('User Added successfully', 'Success')->persistent("Close");

        return redirect()->route('admin.users');
    }

    public function updateUserRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();

        if($request['role_author']) {
            $user->roles()->attach(Role::where('name', 'Author')->first());
        }
        if($request['role_editor']) {
            $user->roles()->attach(Role::where('name', 'Editor')->first());
        }
        if($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }

        return redirect()->route('admin.users');
    }
}
