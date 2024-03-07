<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Personal;
use Illuminate\Support\Facades\Auth;

class PersonalAuthController extends Controller
{
    function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:personal,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in admins table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('personal')->attempt($creds) ){
            return redirect()->route('personal.home');
        }else{
            return redirect()->route('persomal.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('personal')->logout();
        return redirect('/');
    }
}
