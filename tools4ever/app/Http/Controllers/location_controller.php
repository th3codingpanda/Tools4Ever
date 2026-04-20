<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\location;
use App\Models\storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class location_controller extends Controller
{
public function create(Request $request)
    {  
        $validator = Validator::make($request->all(), [
            'name' => ['required','min:1','max:50', Rule::unique('location')],
        ]);
        if ($validator->fails()) {
                    return redirect('location')
                        ->withErrors($validator)
                        ->withInput();
                    //TODO:Make this return actual errors
        }
        location::create(['name'=>$request->input("name"),['timestamps' => false]]);
        return redirect("location");
    }
    
    public function edit(location $location,Request $request)
    {   
    $validator = Validator::make($request->all(), [
        'name' => ['required','min:1','max:50', Rule::unique('location')->ignore($location)]
    ]);
    
    if ($validator->fails()) {
        return redirect('location')
                    ->withErrors($validator)
                    ->withInput();
                    //TODO:Make this return actual errors
    }

             $location->updateOrFail(["name"=>$request->input("name"),['timestamps' => false]]);        
        return redirect("location");
    }
        public function delete(location $location)
    {
        storage::where("location_id",$location->location_id)->delete();
        $location->delete();
        return redirect("location");
    }
    
}
