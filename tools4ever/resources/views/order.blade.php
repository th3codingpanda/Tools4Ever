
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
      <th>Location</th>
      <th>Buy price</th>
      <th>Sell price</th>
      <th>Amount</th>
      <th>Minimum amount</th>
      <th>Delivery date</th>
      <th>Create</th>
    </tr>
    <tr>
      <form method="POST" action="order_create" autocomplete="off">
        
        <td><select name="name">
          @foreach (product::orderBy('name')->get() as $product)
          <option value="{{$product->name}}">{{$product->name}}</option>  
          @endforeach
        </select></td>
        <td><select name="location">          
          @foreach (location::orderBy('name')->get() as $location)
          <option value="{{$location->name}}">{{$location->name}}</option>  
          @endforeach
        </select></td>
        <td><input type="number" name="buy_price" placeholder="0.00" required  min="0" max="9999.99" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" ></td>
        <td><input type="number" name="sell_price" placeholder="0.00" required  min="0" max="9999.99" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" ></td>
        <td><input type="number" name="amount" placeholder="0" required  min="0" max="99999999999" value="0" step="1" title="Amount" pattern="^\d+(?:\.+\d{1,2})?$" ></td>
        <td><input type="number" name="minimum_amount" placeholder="0.00" required  min="0" max="99999999999" value="0" step="1" title="Amount" pattern="^\d+(?:\.+\d{1,2})?$" ></td>
        <td><input type="date" name="delivery_date" ></td>
        <td><button type="submit">create</button></td>
      </form>
    </tr>
    </table>
</div>
@endsection

@section('footer')
    @parent
@endsection