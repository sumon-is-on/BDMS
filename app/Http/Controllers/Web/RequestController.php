<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BloodRequest;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    public function index(){
        $brs = BloodRequest::with('Patient','Donor')
                ->where('status','pending')->get();
        return view('Web.Request.index', compact('brs'));
    }

    public function create(){
        if(! auth()->user()){
            notify()->warning("Please Login to ask for blood");
            return redirect()->back();
        }else{
            return view('Web.Request.create');
        }
    }


    public function store(Request $request){
        $request->validate([
            'patient_id'=>'required',
            'hospital'=>'required',
            'asking_bg'=>'required',
            'required_date' => [
                'required',
                'date',
                'after_or_equal:' . now()->toDateString(),
            ],
            'qty'=>'required|max:3'
        ]);
        try {
            BloodRequest::create([
                'patient_id'=>$request->patient_id,
                'hospital'=>$request->hospital,
                'operation'=>$request->operation,
                'hospital_address'=>$request->hospital_address,
                'asking_bg'=>$request->asking_bg,
                'qty'=>$request->qty,
                'required_date'=>$request->required_date,
                'required_time'=>$request->required_time,
            ]);
            notify()->success('Your Request has been submitted. Please wait untill someone accepts.');
            return to_route('web.home');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }

    public function show($id){
        $br = BloodRequest::with('Patient')->find($id);
        return view('Web.Request.show',compact('br'));

    }
}
