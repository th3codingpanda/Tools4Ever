<?php

use App\Models\product;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestPayloadValueResolver;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

Route::get('/storage', function () {
    return view('storage');
});
Route::get('/products', function ( ) {
    return view('products');
});
Route::post('/product_delete/{product_to_be_deleted}', function (product $product_to_be_deleted) {
    
          // DB::select('select * from storage where product_id = ?', $product_to_be_deleted["product_id"])::delete(); 
        
        $product_to_be_deleted->delete();
    
    return redirect('products');
});
