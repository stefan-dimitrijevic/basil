<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateUserUpdateRequest;
use App\Models\Recipe;
use App\Models\User;
use App\Rules\Password;
use Illuminate\Http\Request;

class ProfileController extends BasicController
{
    public function show($id)
    {
        $this->data['user'] = User::find($id);
        $this->data['recipes'] = Recipe::with(['user', 'category'])->where('user_id', $id)->get();
        return view('profile.show', $this->data);
    }

    public function edit()
    {
//        $this->data['user'] = User::find($id);
        return view('profile.edit', $this->data);
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'passwordOld' => 'required|string',
                'password' => 'required|string|min:8'
            ]);
        }
        if ($validator->passes()) {
            try {
                $user = User::find(session()->get('user')->id);
                if (\Hash::check($request->get('passwordOld'), $user->password)) {
                    if ($request->get('password') == $request->get('passwordConfirm')) {
                        $user->name = $request->get('name');
                        $user->password = \Hash::make($request->get('password'));
                        $user->save();
                        $request->session()->invalidate();
                        $request->session()->put('user', $user);
                        \Log::channel('user_activities')->info('The user ' . $user->name . ' (' . $user->email . ') updated profile.');
                        return response()->json('Sucessfully edited', 204);
                    } else {
                        return response()->json('confirm_error', 409);
                    }
                } else {
                    return response()->json('passError', 401);
                }
            } catch (\Exception $e) {
                return response()->json($e->getMessage(), 500);
            }
        }
        return response()->json(['errors' => $validator->errors()->all()], 400);
    }
}
