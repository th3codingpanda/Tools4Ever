
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
    <p>Body content</p>
    <?php
    foreach (product::all() as $product) {
    echo $product->name;
}
    
    ?>
    
@endsection

@section('footer')
    @parent
@endsection