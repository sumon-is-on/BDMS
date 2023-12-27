<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $donors = User::where('role_id',3)->get();
        $patients = User::where('role_id',2)->get();
        return view('Web.Home', compact('donors','patients'));
    }
}
