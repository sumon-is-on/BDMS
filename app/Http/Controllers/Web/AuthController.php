<?php

namespace App\Http\Controllers\Web;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function webLogin(){
        return view('Web.Auth.login');
    }

    public function loginPost(Request $request){
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
            return redirect()->route('web.home');
        }
        else{
            notify()->error('Invalid credentials');
            return redirect()->back();
        }
    }

    # Logout
    public function logout(){
        Auth::logout();
        notify()->success('Logged out successfull');
        return redirect()->route('web.home');
    }




    # Registration Page
    public function registration(){
        $roles = Role::where('id','!=',1)->get();
        return view('Web.Auth.registration',compact('roles'));
    }


    #Registration Post
    public function registrationPost(Request $request){
        // dd($request->all());
        $validation = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'phone'=>'required|unique:users,phone',
            'password'=>'required'
        ]);
        if ($validation->fails()) {
            notify()->error('Enter all the fields');
            return redirect()->back();
        }
        try {
            $filename=null;
            if($request->hasFile('image')){
                $image=$request->file('image');
                $filename=date('Ymdhis').'.'.$image->getClientOriginalExtension();
                $image->storeAs('/users',$filename);
            }
            User::create([
                'name'=>$request->name,
                'role_id'=>$request->role_id,
                'image'=>$filename,
                'email'=>$request->email,
                'gender'=>$request->gender,
                'password'=>bcrypt($request->password),
                'phone'=>$request->phone,
                'blood_group'=>$request->blood_group,
                'address'=>$request->address
            ]);
            notify()->success('Registration successfull. please Login');
            return to_route('user.login');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }
}
