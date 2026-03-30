
<?php
use Illuminate\Support\Facades\DB;
use App\Models\product;

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
      <th>Product Name</th>
      <th>Type</th>
      <th>Manufacturer</th>
      <th>Buy price</th>
      <th>Sellprice</th>
    </tr>
    <?php
    foreach (product::all() as $product) {
    echo "<tr>";
      //echo "<td> <a href='details.php?id=" . $product['name'] . "'>" . $product['name'] . "</a></td>";
      echo "<td>" . $product['name'] . "</td>";
      echo "<td>" . $product['type'] . "</td>";
      echo "<td>" . $product['manufacturer'] . "</td>";
      echo "<td>" ."€" . $product['buy_price'] . "</td>";
      echo "<td>". "€" .$product['sell_price'] . "</td>";
      echo "</tr>";
}
    echo "</table>";
    
    ?>
    </div>
    
@endsection

@section('footer')
    @parent
@endsection