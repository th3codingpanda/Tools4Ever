
<?php
use Illuminate\Support\Facades\DB;
use App\Models\product;
?>
@extends('layouts.layout_storage')
@vite(['resources/css/layout_storage.css','resources/js/app.js'])
@section('title', 'Storage')

@section('header')
    @parent
@endsection
@section('content')
<div class="storage_display">
      <table >
    <tr>
      <th>Product Id</th>
      <th>Product Name</th>
      <th>Type</th>
      <th>Manufacturer</th>
      <th>Buy price</th>
      <th>Sell price</th>
      <th>Edit</th>
      <th>Delete</th>

    </tr>

    @foreach ( product::all() as $product )
    <tr>
    {{-- <td> <a href='details.php?id=" . $product['name'] . "'>" . $product['name'] . "</a></td>"; --}}
     <td>{{  $product['product_id']}}</td>
     <td>{{  $product['name']}}</td>
     <td>{{  $product['type']}}</td>
     <td>{{ $product['manufacturer']}}</td>
     <td>€{{$product['buy_price']  }}</td>
     <td>€{{ $product['sell_price'] }}</td>
     <td><button onclick='test()'>Edit</button>
<td>
  <form id="{{$product->product_id}}" method="POST" style="margin: 0;" onsubmit='return mySubmitFunction(event,{{$product->product_id}},{{json_encode($product->name)}},{{json_encode(DB::table("storage")->join("product", "product.product_id", "=", "storage.product_id")->join("location", "location.location_id", "=", "storage.location_id")->select("storage.storage_id","location.name as location_name")->where("storage.product_id" ,"=", $product["product_id"])->get())}})'  action="product_delete/{{$product->product_id}}">
     <button>Delete</button></td>
         </form>
    </tr>

  @endforeach
    </table>
    </div>
    
@endsection

@section('footer')
    @parent
@endsection