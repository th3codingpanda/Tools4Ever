
<?php
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\location;
?>
@extends('layouts.layout_storage')

@section('title', 'Storage')

@section('header')
    @parent
@endsection

@section('content')
<div class="storage_display">
      <table>
    <tr>
      <th>Storage Id</th>
      <th>Product Name</th>
      <th>Type</th>
      <th>Manufacturer</th>
      <th>Location</th>
      <th>Buy price</th>
      <th>Sell price</th>
      <th>Amount</th>
      <th>Minimum amount</th>

    </tr>
    <?php
    $full_storage = DB::table('storage')
    ->join('product', 'product.product_id', '=', 'storage.product_id')
    ->join('location', 'location.location_id', '=', 'storage.location_id')
    ->select('storage.*', 'product.name as product_name', 'product.*','location.name as location_name','location.*')
     ->orderBy('storage.storage_id')
    ->get(); ?>
    @foreach ($full_storage as $product) 
    <tr>
      <td> {{$product->storage_id}}</td>
       <td>{{$product->product_name}}</td>
       <td>{{$product->type}}</td>
       <td>{{$product->manufacturer}}</td>
       <td>{{$product->location_name}}</td>
       <td>€{{$product->buy_price}}</td>
       <td>€{{$product->sell_price}}</td>
       <td>{{$product->amount}}</td>
       <td>{{$product->minimum_amount}}</td>
       </tr>
@endforeach
     </table>
    </div>
    
@endsection

@section('footer')
    @parent
@endsection