<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){
        $search = request()->query('search');
        if ($search) {
            $patients = User::where(function($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%")
                      ->orWhere('phone', 'like', "%$search%");
            })
            ->where('role_id', 2)
            ->get();
        } else {
            $patients = User::where('role_id', 2)->get();
        }
        return view('Backend.Patient.index',compact('search','patients'));
    }

    public function show($id){
        $patient=User::find($id);
        return view('Backend.Patient.view',compact('patient'));
    }
}
