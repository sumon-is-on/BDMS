<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller{


    public function index(){
        $search=request()->query('search');
        if($search){
            $services = Service::where('name','like',"%$search%")->get();
        }else{
            $services = Service::all();
        }
        return view('Backend.Service.index', compact('services','search'));
    }

    public function create(){
        $service = new Service();
        return view('Backend.Service.create',compact('service'));
    }

    public function store(Request $request){
        $validation = Validator::make($request->all(),[
            'name'=>'required|unique:services,name',
        ]);
        if ($validation->fails()) {
            notify()->error('Enter all the fields');
            return redirect()->back();
        }
        try {
            $filename=null;
            if($request->hasFile('image')){
                $image=$request->file('image');
                $filename=date('Ymdhis').'.'.$image->getClientOriginalExtension();
                $image->storeAs('/services',$filename);
            }
            Service::create([
                'name'=>$request->name,
                'details'=>$request->details,
                'image'=>$filename,
            ]);
            notify()->success('Service created successfully');
            return to_route('service.index');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id){
        $service = Service::find($id);
        return view('Backend.Service.edit',compact('service'));
    }


    public function update(Request $request,$id){
        $service = Service::find($id);
        try {
            $filename=null;
            if($request->hasFile('image')){
                $image=$request->file('image');
                $filename=date('Ymdhis').'.'.$image->getClientOriginalExtension();
                $image->storeAs('/services',$filename);
            }
            $service->update([
                'name'=>$request->input('name',$service->name),
                'details'=>$request->input('details',$service->details),
                'image'=>$filename ?? $service->image,
            ]);
            $service->save();
                notify()->success('Service updated successfully');
                return to_route('service.index');
        } catch (\Throwable $th) {
                notify()->error($th->getMessage());
                return redirect()->back();
        }
    }


    public function delete($id){
        $service=Service::find($id);
        if($service){
            $service->delete();
            notify()->success('Service deleted successfully');
            return to_route('service.index');
        }else{
            notify()->info('Service invalid');
            return to_route('service.index');
        }
    }
}
