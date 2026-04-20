<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class order_controller extends Controller
{
       public function create(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'product_id' => ['required'],
            'location_id' => ['required'],
            'buy_price' => ['required'],
            'sell_price' => ['required'],
            'amount' => ['required'],
            'minimum_amount' => ['required'],
            'delivery_date' => ['required']
            
        ]);
        
        if ($validator->fails()) {
                    return redirect('order')
                        ->withErrors($validator)
                        ->withInput();
                    //TODO:Make this return actual errors
        }
                     
        order::create(['product_id'=>$request->input("product_id"),'location_id'=>$request->input("location_id"),'buy_price'=>$request->input("buy_price"),'sell_price'=>$request->input("sell_price"),'amount'=>$request->input("amount"),'minimum_amount'=>$request->input("minimum_amount"),'delivery_date'=>$request->input("delivery_date")]);
        return redirect("order");
    }
        
}
