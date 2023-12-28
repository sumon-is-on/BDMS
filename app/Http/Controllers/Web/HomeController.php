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

    public function profile($id){
        $user = User::find($id);
        return view('Web.User.profile',compact('user'));
    }

    public function edit($id){
        $roles = Role::where('id','!=',1)->get();
        $user = User::find($id);
        return view('Web.User.edit',compact('user','roles'));
    }
}
