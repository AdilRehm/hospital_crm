<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('/userrole');
    }

    public function login(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);
    }

    public function register_new_user(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'=>'required',
            'user_phone'=>'required',
            'email'=>'required|unique:users|email',
            'email_verified_at'=>'required',
            'password'=>'required'
        ]);
        User::created([
            'name'=>$request->name,
            'user_phone'=>$request->user_phone,
            'email'=> $request->email,
            'email_verified_at'=> $request->email_verified_at,
            'password'=> Hash::make($request->password)
        ]);
        return view('userrole');
    }
}
