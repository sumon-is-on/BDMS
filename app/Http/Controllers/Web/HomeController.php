<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class HomeController extends Controller
{
    public function home(){
        $donors = User::where('role_id',3)->get();
        $patients = User::where('role_id',2)->get();
        return view('Web.Home', compact('donors','patients'));
    }

    # profile
    public function profile($id){
        $user = User::find($id);
        return view('Web.User.profile',compact('user'));
    }

    # profile edit
    public function edit($id){
        $roles = Role::where('id','!=',1)->get();
        $user = User::find($id);
        return view('Web.User.edit',compact('user','roles'));
    }

    #profile update
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
                notify()->success('Profile updated successfully');
                return to_route('web.user.profile',$user->id);
            } catch (\Throwable $th) {
                notify()->error($th->getMessage());
                return redirect()->back();
        }
    }

    #About
    public function about(){
        return view('Web.Pages.about');
    }

}
