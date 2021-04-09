<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\BasicController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BasicController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::with('role')->orderBy('updated_at', 'desc')->get();
        return view('admin.users.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['roles'] = Role::all();
        return view('admin.users.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8'
            ]);

            if ($validator->passes()) {
                try {
                    $user = new User();
                    $user->name = $request->get('name');
                    $user->email = $request->get('email');
                    $user->password = \Hash::make($request->get('password'));
                    $user->role_id = $request->get('role');
                    $user->save();
                    return response()->json('Sucessfully created', 201);
                } catch (\Exception $e) {
                    return response()->json($e->getMessage(), 500);
                }
            }
            return response()->json(['errors' => $validator->errors()->all()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['roles'] = Role::all();
        $this->data['user'] = User::find($id);
        return view('admin.users.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                $user = User::find($id);
                $user->role_id = $request->get('role');
                $user->save();
                return response()->json('Sucessfully updated', 204);
            } catch (\Exception $e) {
                return response()->json($e->getMessage(), 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = User::find($id);
            $user->delete();
            return response()->json('Successfully deleted', 204);
        }
    }
}
