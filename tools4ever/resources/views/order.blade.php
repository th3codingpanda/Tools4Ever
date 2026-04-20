
<?php
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\location;
use App\Models\order;
?>
@extends('layouts.layout_storage')

@section('title', 'Orders')

@section('header')
    @parent
@endsection

@section('content')
<div class="storage_display">
    <h1>Order product</h1>
        <table>
    <tr>
      <th>Product</th>
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
        
        <td><select name="product_id">
          @foreach (product::orderBy('name')->get() as $product)
          <option value="{{$product->product_id}}" >{{$product->name}}</option>  
          @endforeach
        </select></td>
        <td><select name="location_id">          
          @foreach (location::orderBy('name')->get() as $location)
          <option value="{{$location->location_id}}">{{$location->name}}</option>  
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



<div class="storage_display">
      <table>
    <tr>
      <th>Delivery date</th>
      <th>Order id</th>
      <th>Product</th>
      <th>Location</th>
      <th>Amount</th>
      <th>Minimum amount</th>
      <th>Arrived</th>
      <th>Delete</th>

    </tr>
    {{-- Displays all product information and allows for editing --}}
     <?php
    $orders = DB::table('order')
    ->join('product', 'product.product_id', '=', 'order.product_id')
    ->join('location', 'location.location_id', '=', 'order.location_id')
    ->select('order.*', 'product.name as product_name','location.name as location_name')
     ->orderBy('order.delivery_date')
    ->get(); 
      ?>
    @foreach ( $orders as $order )
    <tr>
     <td >{{  $order->delivery_date}} </td>
     <td>{{  $order->order_id}}</td>
     <td >{{  $order->product_name}} </td>
     <td >{{  $order->location_name}} </td>
     <td >{{  $order->amount}} </td>
     <td >{{  $order->minimum_amount}} </td>
     
      <form method="POST" action="order/confirm/{{$order->order_id}}">
      <td>
        <button>Confirm</button>
      </td>
    </form>
    {{-- allows for deletion of orders --}}
    <form method="POST" action="order_delete/{{$order->order_id}}">
     <td>
       <button>Delete</button>
     </td>
     </form>
    </tr>

  @endforeach
    </table>
    </div>
@endsection

@section('footer')
    @parent
@endsection