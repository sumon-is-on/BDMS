<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donation;

class DonorController extends Controller
{
    public function index(){
        $search = request()->query('search');
        if ($search) {
            $donors = User::where(function($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%")
                      ->orWhere('blood_group', 'like', "%$search%")
                      ->orWhere('phone', 'like', "%$search%");
            })
            ->where('role_id', 2)
            ->get();
        } else {
            $donors = User::where('role_id', 3)->get();
        }
        return view('Backend.Donor.index',compact('search','donors'));
    }

    public function show($id){
        $donor=User::find($id);
        return view('Backend.Donor.view',compact('donor'));
    }

    public function history($id){
        $histories = Donation::with('BloodRequest.Patient','Donor')->where('donor_id',$id)->get();
        // dd($histories);
        return view('Backend.Donor.history',compact('histories'));
    }
}
