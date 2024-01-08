<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BloodRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(){
        $search=request()->query('search');
        if($search){
            $brs = BloodRequest::where('asking_bg','like',"%$search%")
            ->orWhere('hospital','like',"%$search%")
            ->get();
        }else{
            $brs = BloodRequest::with('Patient','Donor')->get();
        }
        return view('Backend.Request.index', compact('brs','search'));
    }


    public function show($id){
        $values = BloodRequest::with('Patient','Donor')->where('id',$id)->get();
        // dd($brs);
        return view('Backend.Request.show',compact('values'));
    }
}
