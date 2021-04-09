<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends BasicController
{
    public function showRegistrationForm ()
    {
        return view('auth.register', $this->data);
    }

    public function register(StoreUserRequest $request)
    {
        try {
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = \Hash::make($request->get('password'));
            $user->role_id = 2;
            $user->save();
            $request->session()->put('user', $user);
            \Log::channel('user_activities')->info('The user ' . $user->name . ' ('. $user->email .') has registered.');
            return redirect()->route('recipes.index')->with('success', 'You have successfully registered.');
        } catch (\Exception $exception) {
            return back()->with('error', 'An error has occurred. Please, try again later.');
        }
    }
}
