
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
    <h1>Order product</h1>
        <table>
    <tr>
      <th>Product Name</th>
      <th>Type</th>
      <th>Manufacturer</th>
      <th>Location</th>
      <th>Buy price</th>
      <th>Sell price</th>
      <th>Amount</th>
      <th>Minimum amount</th>
      <th>Create</th>
    </tr>
    <tr>
      <form method="POST" action="order_create">
        
        <td><select name="name">
          @foreach (product::orderBy('name')->get() as $product)
          <option value="{{$product->name}}">{{$product->name}}</option>  
          @endforeach
        </select></td>
        <td><input type="text" name="type"></td>
        <td><input type="text" name="manufacturer" ></td>
        <td><select name="location">          
          @foreach (location::orderBy('name')->get() as $location)
          <option value="{{$location->name}}">{{$location->name}}</option>  
          @endforeach
        </select></td>
        <td><input type="number" name="buy_price" ></td>
        <td><input type="text" name="sell_price" ></td>
        <td><input type="text" name="amount" ></td>
        <td><input type="text" name="minimum_amount" ></td>
        <td><button type="submit">create</button></td>
      </form>
    </tr>
    </table>
</div>
@endsection

@section('footer')
    @parent
@endsection