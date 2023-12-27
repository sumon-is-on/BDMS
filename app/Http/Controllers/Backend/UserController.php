<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{


    public function index(Request $request){
        $search=request()->query('search');
        if($search){
            $users=User::where('name','like',"%$search%")
            ->orWhere('email','like',"%$search%")
            ->orWhere('phone','like',"%$search%")->get();
        }else{
            $users=User::with('Roles')->get();
        }
        // dd($users);
        return view('Backend.User.index',compact('users','search'));
    }



    public function create(){
        $roles=Role::where('id','!=',1)->get();
        $user=new User();
        return view('Backend.User.create',compact('roles','user'));
    }



    public function post(Request $request){
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
            notify()->success('User created successfully');
            return to_route('user.index');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }


    public function show($id){
        $user=User::find($id);
        return view('Backend.User.view',compact('user'));
    }


    public function edit($id){
        $roles=Role::all();
        $user=User::find($id);
        return view('Backend.User.edit',compact('user','roles'));
    }


    public function update(Request $request, $id){
        $user = User::find($id);
        try {
            $filename=null;
            if($request->hasFile('image')){
                $image=$request->file('image');
                $filename=date('Ymdhis').'.'.$image->getClientOriginalExtension();
                $image->storeAs('/users',$filename);
            }
            $user->update([
                'name'=>$request->input('name',$user->name),
                'role_id'=>$request->input('role_id',$user->role_id),
                'image'=>$filename ?? $user->image,
                'email'=>$request->input('email',$user->email),
                'gender'=>$request->input('gender',$user->gender),
                'phone'=>$request->input('phone',$user->phone),
                'blood_group'=>$request->input('blood_group',$user->blood_group),
                'address'=>$request->input('address',$user->address)
            ]);
            $user->save();
                notify()->success('User created successfully');
                return to_route('user.index');
            } catch (\Throwable $th) {
                notify()->error($th->getMessage());
                return redirect()->back();
        }
    }


    public function delete($id){
        $user=User::find($id);
        if($user){
            $user->delete();
            notify()->success('user deleted successfully');
            return to_route('user.index');
        }else{
            notify()->info('User invalid');
            return to_route('user.index');
        }
    }

}
