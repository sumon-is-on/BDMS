<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller{

    public function login(){
        return view('Backend.Auth.login');
    }


    public function loginPost(Request $request){
        // dd($request->all());
        $validation = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'
        ]);
        if ($validation->fails()) {
            notify()->error('Invalid credentials');
            return redirect()->back();
        }
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials)){
            notify()->success('Logged in successfull');
            return redirect()->route('backend.dashboard');
        }
        else{
            notify()->error('Invalid credentials');
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        notify()->success('Logged out successfull');
        return redirect()->route('web.home');
    }

}
