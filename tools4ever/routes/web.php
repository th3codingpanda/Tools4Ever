<?php
use Illuminate\Http\Request;
use App\Models\product;
use App\Http\Controllers\product_controller;
use App\Http\Controllers\location_controller;
use App\Http\Controllers\order_controller;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestPayloadValueResolver;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('home');
});

Route::get('/storage', function () {
    return view('storage');
});
Route::get('/products', function ( ) {
    return view('products');
});
Route::get('/order', function ( ) {
    return view('order');
});
Route::get('/location', function ( ) {
    return view('location');
});



//product related
Route::post('/product_create', [product_controller::class, 'create']);
Route::post('/product_edit/{product}', [product_controller::class, 'edit']);
Route::post('/product_delete/{product}', [product_controller::class, 'delete']);
//location
Route::post('/location_create', [location_controller::class, 'create']);
Route::post('/location_edit/{location}', [location_controller::class, 'edit']);
Route::post('/location_delete/{location}', [location_controller::class, 'delete']);
//order
Route::post('/order_create', [order_controller::class, 'create']);
Route::post('/order_confirm/{order}', [order_controller::class, 'delivered']);
Route::post('/order_delete/{order}', [order_controller::class, 'delete']);
//storage