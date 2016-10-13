<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Password;

use Alert;

class WelcomeController extends Controller
{
    use ResetsPasswords;

    protected $redirectPath = '/';

    public function index(Request $request, string $token = null)
    {
        if (! $user = User::findByToken($token)) {
            Alert::error('The link you clicked is invalid.');

            return redirect()->to('/login');
        };

        return view('welcome')->with([
            'token' => $token,
            'email' => $request->email,
            'user' => $user
        ]);
    }

    public function savePassword(Request $request)
    {
        return $this->reset($request);
    }

    /**
     * Get the response for a successful password reset.
     */
    protected function sendResetResponse($response)
    {
        //Alert::success('You are now logged in! Your password was saved.', 'Welcome!');

        return redirect('/admin/dashboard')->with('success', 'You are now logged in! Your password was saved'); 
    }
}
