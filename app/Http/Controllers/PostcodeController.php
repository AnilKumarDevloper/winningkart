<?php

namespace App\Http\Controllers;

use App\Models\Postcode;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostcodeController extends Controller{
    public function index(Request $request){
        try{
             if ($request->wantsJson()) {
            $search_val = $request->search_value;
            if($search_val != ''){
                $postcodes = Postcode::where('pincode', 'LIKE', '%'.$search_val.'%')
                ->orWhere('area_name', 'LIKE', '%'.$search_val.'%')
                ->orWhere('city', 'LIKE', '%'.$search_val.'%')
                ->orWhere('district', 'LIKE', '%'.$search_val.'%')
                ->orWhere('state', 'LIKE', '%'.$search_val.'%')
                ->paginate(50);
                return response()->json([
                    "postcode_table" => view('backend.delivery_location.partial_table', compact('postcodes'))->render()
                ]);
            }
        }else{
            $postcodes = Postcode::orderBy('id', 'desc')->paginate(50);
            return view('backend.delivery_location.index', compact('postcodes'));
        } 
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

    public function destroy(Request $request){
        try{
            Postcode::destroy($request->id);
            return response()->json([
                "status" => "success", 
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function changeStatus(Request $request){
        try{
            Postcode::where('id', $request->id)->update([
                "status" => $request->status
            ]);
            return response()->json([
                "status" => "success"
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function enableAllPostcode(){
        try{

        }catch(\Exception$e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function disableAllPostcode(){
        try{

        }catch(\Exception$e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function searchPostcode(Request $request){
        // $validate = $request->validate([
        //     "search_value" => ["required"]
        // ]);
        try{
            $search_val = $request->search_value;
            if($search_val != ''){
            $postcodes = Postcode::where('pincode', 'LIKE', '%'.$search_val.'%')
            ->orWhere('area_name', 'LIKE', '%'.$search_val.'%')
            ->orWhere('city', 'LIKE', '%'.$search_val.'%')
            ->orWhere('district', 'LIKE', '%'.$search_val.'%')
            ->orWhere('state', 'LIKE', '%'.$search_val.'%')
            ->paginate(50);
            }else{
                  $postcodes = Postcode::orderBy('id', 'desc')->paginate(50);  
            }
            return response()->json([
                "postcode_table" => view('backend.delivery_location.partial_table', compact('postcodes'))->render()
            ]);
             
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    } 
}
