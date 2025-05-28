<?php

namespace App\Http\Controllers;

use App\Models\DeliveryLocation;
use Illuminate\Http\Request;

class DeliveryLocationController extends Controller
{
    public function index(){
        return view('backend.delivery_location.index');
    }

    public function create(){
        return view('backend.delivery_location.create');
    }

    public function edit(){
        return view('backend.delivery_location.edit');
    }
    public function store(Request $request){
            $validate = $request->validate([
                "pincode" => ['required'],
                "area" => ['required'],
                "city" => ['required'],
                "state" => ['required'],
            ]);
        try{
            DeliveryLocation::create([
                "pincode" => $request->pincode,
                "area" => $request->area,
                "city" => $request->city,
                "state" => $request->state,
            ]);
            return view('backend.delivery_location.index');
        }catch(\Exception $e){
            return $e->getMessage();
            abort('500');
        }
    }
}
