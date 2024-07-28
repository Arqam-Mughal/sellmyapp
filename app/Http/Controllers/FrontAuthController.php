<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\FrontResponseController;

class FrontAuthController extends FrontResponseController
{
    public function register(){
        if(Auth::check()){
            return redirect()->route('front.home');
        }
        return view('front.register');
    }

    public function registerStore(Request $request){

       $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ], ['name.required' => ':attribute is strictly required!',
            'email.required' => ':attribute is strictly required!',
            'password.required' => ':attribute is strictly required!',
            'c_password.required' => ':attribute is strictly required!']);

        // dd($request->all());
        if($validator->passes()){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        session()->flash('success', 'User Registered SuccessFully!');
        // return $this->successResponse('User Registered SuccessFully!', true);
        return redirect()->route('front.login');

        }else{
            return back()->withErrors($validator)->withInput($request->only('name'));
        }

    }

    public function login(Request $request){
        // dd($request->intented);
        if(Auth::check()){
            return redirect()->route('front.home');
        }
        return view('front.login', ['intented' => $request->intented]);

    }

    public function authenticate(Request $request){

        // dd($request->intented);
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'password' => 'required',
        ],
        ['name.required' => ':attribute is strictly required!',
            'password.required' => ':attribute is strictly required!',
        ]
    );

    if($validator->passes()){
        // dd($request->intented);
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password])){

            $intendedUrl = $request->input('intented', route('front.home'));
            return redirect()->intended($intendedUrl);

            // return redirect()->route('front.home');
        }
        return back()->with('error', 'The provided credentials do not match our records');
    }else{
        return redirect()->route('front.login')->withErrors($validator)
        ->withInput($request->only('email'));
    }

    }

    public function logout(){

        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('front.login');

    }
}
