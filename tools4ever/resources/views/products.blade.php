
<?php
use Illuminate\Support\Facades\DB;
use App\Models\product;
?>
@extends('layouts.layout_storage')
@vite(['resources/css/layout_storage.css','resources/js/app.js'])
@section('title', 'Products')

@section('header')
    @parent
@endsection
@section('content')
<div class="storage_display">
        <table>
    <tr>
      <th>Product Name</th>
      <th>Type</th>
      <th>Manufacturer</th>
      <th>Create</th>
    </tr>
    <tr>
      <form method="POST" action="product_create">
        <td><input type="text" minlength="1"></td>
        <td><input type="text" minlength="1"></td>
        <td><input type="text" minlength="1"></td>
        <td><button type="submit">create</button></td>
      </form>
    </tr>
</div>
<div class="storage_display">
      <table>
    <tr>
      <th>Product Id</th>
      <th>Product Name</th>
      <th>Type</th>
      <th>Manufacturer</th>
      <th>Edit</th>
      <th>Delete</th>

    </tr>

    @foreach ( product::all() as $product )
    <tr>
      <form id="edit_{{$product->product_id}}" method="POST" onsubmit="return edit_product_mode(event,'edit_{{$product->product_id}}')" action="product_edit/{{ $product->product_id }}">
     <td>{{  $product->product_id}}</td>
     <td id="edit_{{$product->product_id}}_name_text">{{  $product->name}} </td>
     <td id="edit_{{$product->product_id}}_name_input" class="hide"><input type="text" value="{{$product->name}}" name="name"></td>
     <td id="edit_{{$product->product_id}}_type_text">{{  $product->type}} </td>
     <td id="edit_{{$product->product_id}}_type_input" class="hide"><input type="text" value="{{$product->type}}" name="type"></td>
     <td id="edit_{{$product->product_id}}_manufacturer_text">{{ $product->manufacturer}}</td>
     <td id="edit_{{$product->product_id}}_manufacturer_input" class="hide"><input type="text" value="{{$product->manufacturer}}" name="manufacturer"></td>
     <td id="edit_{{$product->product_id}}_edit_button"><button>Edit</button></td>
     <td id="edit_{{$product->product_id}}_confirm_button" class="hide"><button  onclick="confirm_edit('edit_{{$product->product_id}}')">Confirm</button></td>
     </form>
     <td>
      <?php
        $linked_items = DB::table("storage")->join("product", "product.product_id", "=", "storage.product_id")->join("location", "location.location_id", "=", "storage.location_id")->select("storage.storage_id","location.name as location_name")->where("storage.product_id" ,"=", $product["product_id"])->get();
      ?>
      <form id="{{$product->product_id}}" method="POST" style="margin: 0;" onsubmit='return submit_delete_product(event,{{$product->product_id}},{{json_encode($product->name)}},{{json_encode($linked_items)}})'  action="product_delete/{{$product->product_id}}">
       <button>Delete</button>
      </form>
     </td>
    </tr>

  @endforeach
    </table>
    </div>
    
@endsection

@section('footer')
    @parent
@endsection