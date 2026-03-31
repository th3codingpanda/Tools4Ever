
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
     <td><button onclick='test()'> Edit</button></td>

      <td><button onclick='delete_product({{$product["product_id"]}},{{json_encode($product["name"])}},{{json_encode(DB::select("select * from storage where product_id = $product[product_id]"))}} )'>Delete</button></td>
    </tr>

  @endforeach
    </table>
    </div>
    
@endsection

@section('footer')
    @parent
@endsection