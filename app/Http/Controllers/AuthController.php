<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use PDO;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login()
    {
       if(!empty(Auth::check())){
        return redirect('admin/dashboard');
       }
    return view('auth.login');
    }

    public function AuthLogin(Request $request){


      if(Auth::attempt(['email'=> $request->email, 'password' => $request->password])){

        return redirect('admin/dashboard');

      }else{
        return redirect()->back()->with('error', 'Please enter current email and password');
      }
    }



    public function AuthLogout(){
        Auth::logout();
        return redirect(url(''));
    }
}
