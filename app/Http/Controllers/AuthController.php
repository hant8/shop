<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{   
    
    public function login()
    {
        return view("auth.login");
    }
    public function login_proccess(Request $request)
    {
        $data = $request->validate([
            "email" => ["required","email","string"],
            "password" => ["required"],
        ]);
        
        if(auth('web')->attempt($data) )
        {   
            $user = auth()->user();
            if($user->role === 'admin')
            {
            auth('admin')->login($user);
            }
            return redirect()->route('home');
        }
        
        return redirect()->route('login')->withErrors(['email'=>'ошибка входа']);
    }
    public function logout()
    {
        auth('web')->logout();
        auth('admin')->logout();
       return redirect(route('home'));
    }
    public function register()
    {
        return view( "auth.register" );
    }
    public function register_proccess( Request $request )
    {
        $data = $request->validate( [
            "name" => [ "required","string" ],
            "email" => [ "required","email","string","unique:users,email" ],
            "password" => [ "required","confirmed" ],
        ]);
        
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 'manager',
            'password' => bcrypt( $data['password'])
        ]);
        if ($user)
        {
            auth('web')->login($user);
        }
        
        return redirect()->route('home');
    }
}
