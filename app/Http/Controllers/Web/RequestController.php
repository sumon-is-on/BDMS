<?php

namespace App\Http\Controllers\Web;

use App\Models\BloodRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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
            $bloodRequest = BloodRequest::create([
                'patient_id'=>$request->patient_id,
                'hospital'=>$request->hospital,
                'operation'=>$request->operation,
                'hospital_address'=>$request->hospital_address,
                'asking_bg'=>$request->asking_bg,
                'qty'=>$request->qty,
                'required_date'=>$request->required_date,
                'required_time'=>$request->required_time,
            ]);

            $patient = BloodRequest::with('Patient')->where('id', $bloodRequest->id)->first();
            if ($patient) {
                $users = User::where('role_id',3)->where('blood_group',$bloodRequest->asking_bg)->get();
                foreach($users as $user){
                    Mail::send('Web.Emails.donorNotification', [
                        'patient' => $patient->Patient,
                        'bloodRequest' => $bloodRequest
                    ], function ($message) use ($user) {
                        $message->to($user->email)->subject("New Blood Request");
                    });
                }
            }

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
