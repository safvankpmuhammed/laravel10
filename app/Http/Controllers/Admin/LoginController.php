<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class LoginController 
{
    public function login()
    {
        return view('admin.login');
    }

    public function doLogin()
    {
        $input = request()->only('username', 'password');
        if(auth()->guard('admin')->attempt($input, request('remember_me'))){
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->route('admin.login');
        }
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
