<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ContactController extends Controller
{

    public function index(){
        $contacts = Contact::all();
        return view('Backend.Contact.index',compact('contacts'));
    }

    
    public function create(){
        return view('Web.Contact.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);
        try {
            Contact::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'message'=>$request->message,
            ]);
            notify()->success('Your queries has been submitted.');
            return to_route('web.home');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }
}
