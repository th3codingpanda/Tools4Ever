<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class product_controller extends Controller
{
       public function create(Request $request)
    {  
        $validator = Validator::make($request->all(), [
            'name' => ['required','min:1','max:50', Rule::unique('product')],
            'type' => 'required|min:1|max:50',
            'manufacturer' => 'required|min:1|max:70',
        ]);
        if ($validator->fails()) {
                    return redirect('products')
                        ->withErrors($validator)
                        ->withInput();
                    //TODO:Make this return actual errors
        }
        product::create(['name'=>$request->input("name"),"type"=>$request->input("type"),"manufacturer"=>$request->input("manufacturer"),['timestamps' => false]]);
        return redirect("products");
    }
    public function edit(product $product,Request $request)
    {   
    $validator = Validator::make($request->all(), [
        'name' => ['required','min:1','max:50', Rule::unique('product')->ignore($product)],
        'type' => 'required|min:1|max:50',
        'manufacturer' => 'required|min:1|max:70',
    ]);
    
    if ($validator->fails()) {
        return redirect('products')
                    ->withErrors($validator)
                    ->withInput();
                    //TODO:Make this return actual errors
    }

             $product->updateOrFail(["name"=>$request->input("name"),"type"=>$request->input("type"),"manufacturer"=>$request->input("manufacturer"),['timestamps' => false]]);        
        return redirect("products");
    }
    public function delete(product $product)
    {
        storage::where("product_id",$product->product_id)->delete();
        $product->delete();
        return redirect("products");
    }
}
