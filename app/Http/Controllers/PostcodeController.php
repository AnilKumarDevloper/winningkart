<?php

namespace App\Http\Controllers;

use App\Models\Postcode;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostcodeController extends Controller{
    public function index(){
        try{
            $postcodes = Postcode::orderBy('id', 'desc')->paginate(50); 
            
            return view('backend.delivery_location.index', compact('postcodes'));

        }catch(\Exception $e){
            abort('500');
        }
    }

    public function create(){
        return view('backend.delivery_location.create');
    }

    public function edit($id){
          try{
            $postcode = Postcode::where('id', $id)->first();
            return view('backend.delivery_location.edit', compact('postcode'));
        }catch(\Exception $e){
            abort('500');
        } 
    }
    public function store(Request $request){
            $validate = $request->validate([
                "pincode" => ['required', 'digits:6', 'unique:postcodes,pincode'],
                "area_name" => ['required', 'string'],
                "city" => ['required', 'string'],
                "district" => ['required', 'string'],
                "state" => ['required', 'string'],
            ]);
        try{
            Postcode::create([
                "pincode" => $request->pincode,
                "area_name" => $request->area_name,
                "city" => $request->city,
                "district" => $request->district,
                "state" => $request->state,
            ]);
            return redirect()->route('admin.postcode');
        }catch(\Exception $e){ 
            abort('500');
        }
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            "pincode" => ['required', 'digits:6', 'unique:postcodes,pincode', Rule::unique('postcodes', 'pincode')->ignore($id)],
            "area_name" => ['required', 'string'],
            "city" => ['required', 'string'],
            "district" => ['required', 'string'],
            "state" => ['required', 'string'],
        ]);
        try{
            Postcode::where('id', $id)->update([
                "pincode" => $request->pincode,
                "area_name" => $request->area_name,
                "city" => $request->city,
                "district" => $request->district,
                "state" => $request->state,
            ]);
            return redirect()->route('admin.postcode');
        }catch(\Exception $e){
            abort('500');
        }
    }

    public function destroy(){
        try{

        }catch(\Exception $e){
            abort('500');
        }
    }

    public function change_status(){
        try{

        }catch(\Exception $e){
            abort('500');
        }
    }

}
