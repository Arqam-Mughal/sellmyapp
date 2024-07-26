<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function authenticate(Request $req){

        // dd($req->all());
        // die;
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()){

            if(Auth::attempt($req->only('email','password'))){

                // $user = Auth::user();
                // if($user->hasRole('admin')){
                // }

                    return redirect()->route('admin.dashboard');
            }
            return back()->withErrors(['error' => 'The provided credentials do not match our records']);

        }else{
            return redirect()->route('admin.login')->withErrors($validator)
            ->withInput($req->only('email'));
        }
        }

}
