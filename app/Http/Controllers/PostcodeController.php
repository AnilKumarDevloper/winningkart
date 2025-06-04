<?php

namespace App\Http\Controllers;

use App\Models\Postcode;
use Illuminate\Http\Request;

class PostcodeController extends Controller{
    public function index(){
        try{
            $postcodes = Postcode::paginate(50); 
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
                "pincode" => ['required'],
                "area" => ['required'],
                "city" => ['required'],
                "state" => ['required'],
            ]);
        try{
            Postcode::create([
                "pincode" => $request->pincode,
                "area_name" => $request->area,
                "city" => $request->city,
                "district" => $request->district,
                "state" => $request->state,
            ]);
            return view('backend.delivery_location.index');
        }catch(\Exception $e){
            abort('500');
        }
    }

}
