<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

use App\Repositories\ImageRepository;

use App\Models\User;

use Alert;

class ProfileController extends BaseController
{
    public function index(User $user)
    {
    	return view('admin.user.profile')->with([
    		'user' => $user,
    	]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

    	return view('admin.user.edit')->with([
    		'user' => $user,
    	]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'bio' => 'required',
            'facebook' => 'alpha_dash',
            'twitter' => 'alpha_dash',
            'linkedin' => 'alpha_dash',
        ]);

        $user->fill([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'bio' => $request->input('bio'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'linkedin' => $request->input('linkedin'),
        ])->save();

        Alert::success('Profile Updated', 'Success')->persistent("Close");

        return redirect()->route('admin.user.profile', $user->username);
    }

    public function changepwd(User $user)
    {
        $this->authorize('update', $user);

    	return view('admin.user.updatepwd')->with([
    		'user' => $user,
    	]);
    }

    public function updatepwd(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $this->validate($request, [
            'old_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed'
        ]);

        if(Hash::check($request->input('old_password'), $user->password)) {
            $user->fill([
                'password' => Hash::make($request->input('password'))
            ])->save();
        }

        Alert::success('Password Updated', 'Success')->persistent("Close");

        return redirect()->route('admin.user.profile', $user->username);
    }

    public function getUpdateAvatar(User $user)
    {
        $this->authorize('update', $user);

        return view('admin.user.avatar')->with([
            'user' => $user
        ]);
    }

    public function postUpdateAvatar(Request $request, User $user, ImageRepository $image)
    {
        $this->authorize('update', $user);

        if($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $avatar = $image->update_avatar($request->file('avatar'));
            $user->fill([
                'avatar' => $avatar
            ])->save();

            Alert::success('Avatar Updated', 'Success')->persistent("Close");
        } else {
            Alert::error('Oops.. Soemthing went wrong', 'error')->persistent("Close");
        }

        return redirect()->route('admin.user.profile', $user->username);
    }
}
