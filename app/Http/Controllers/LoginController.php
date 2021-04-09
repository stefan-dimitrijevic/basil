<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends BasicController
{
    public function showLoginForm()
    {
        return view('auth.login', $this->data);
    }

    public function login(ValidateLoginRequest $request)
    {
        try {
            $user = User::where('email', $request->get('email'))->first();
            if ($user && \Hash::check($request->get('password'), $user->password)) {
                $request->session()->put('user', $user);
                \Log::channel('user_activities')->info('The user ' . $user->name . ' ('. $user->email .') has logged in.');
                if ($user->role_id == 1) {
                    return redirect()->route('admin.recipes.index');
                }
                return redirect()->route('recipes.index')->with('success', 'You have successfully logged in.');
            } else {
                return back()->with('error_credentials', 'These credentials do not match our records.')->withInput();
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'An error has occurred. Please, try again later.');
        }

    }

    public function logout(Request $request)
    {
        $user = session()->get('user');
        $request->session()->invalidate();
        \Log::channel('user_activities')->info('The user ' . $user->name . ' ('. $user->email .') has logged out.');
        return redirect()->route('login.showLoginForm');
    }
}
