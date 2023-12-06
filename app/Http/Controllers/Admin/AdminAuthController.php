<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Koordinator;
use App\Models\Admin;


class AdminAuthController extends Controller
{
    function login(){

        
        return view('login');
    }

    function aksilogin(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('admin/dashboard')->with('success','Selamat datang admin !');
        }else if(Auth::guard('koordinator')->attempt($credentials)){
            return redirect('koordinator/dashboard')->with('success','Selamat datang koordinator !');
        }else{
            return back()->with('danger', 'Login gagal periksa kembali email atau password anda !');
        }
    }

    
    
}
