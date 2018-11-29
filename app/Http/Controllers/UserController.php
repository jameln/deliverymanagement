<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Role;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_admin()
    {
        $roles = \App\Role::all();
        return view('user/add_admin', array('roles' => $roles));
    }
    public function save_admin(Request $request)
    {
        $user = new \App\User();
        $user->password = Hash::make($request->add_password);
        $user->email = $request->add_email;
        $user->name = $request->add_name;
        $user->role_id = $request->add_role;
        $user->language_id = $request->add_language;
        $user->status = 1;
        $user->save();

        //flash(__("global.user_add_succees"))->success();
        return redirect('/user/manage');
    }

    public function allusers()
    {
        $users = \App\User::all();
        return view('user/all_users', compact('users'));
    }

}
