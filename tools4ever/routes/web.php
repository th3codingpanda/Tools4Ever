<?php
use Illuminate\Http\Request;
use App\Models\product;
use App\Http\Controllers\product_controller;
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
Route::post('/product_create', [product_controller::class, 'create']);
Route::post('/product_edit/{product}', [product_controller::class, 'edit']);
Route::post('/product_delete/{product}', [product_controller::class, 'delete']);

