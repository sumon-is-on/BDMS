<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $users = User::all()->count();
        $donors = User::where('role_id',3)->count();
        $patients = User::where('role_id',2)->count();
        return view('Backend.Dashboard',compact('users','donors','patients'));
    }
}
