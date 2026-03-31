
<?php
use Illuminate\Support\Facades\DB;
?>
@extends('layouts.layout_storage')

@section('title', 'Storage')

@section('header')
    @parent
@endsection

@section('content')
<div class="storage_display">
      <table >
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
    ->get();
    foreach ($full_storage as $product) {
    echo "<tr>";

    //echo "<td> <a href='details.php?id=" . $product['name'] . "'>" . $product['name'] . "</a></td>";
      echo "<td>" . $product->storage_id . "</td>";
      echo "<td>" . $product->product_name . "</td>";
      echo "<td>" . $product->type ."</td>";
      echo "<td>" . $product->manufacturer . "</td>";
      echo "<td>"  .$product->location_name . "</td>";
      echo "<td>" ."€" . $product->buy_price . "</td>";
      echo "<td>". "€" .$product->sell_price . "</td>";
      echo "<td>" .$product->amount . "</td>";
      echo "<td>".$product->minimum_amount . "</td>";
      echo "</tr>";
}
    echo "</table>";
    
    ?>
    </div>
    
@endsection

@section('footer')
    @parent
@endsection