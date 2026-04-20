<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
#[Table('order', key: 'order_id')]
class order extends Model
{
    protected $fillable = ['product_id', 'location_id','amount','minimum_amount' ,'buy_price','sell_price' ,'delivery_date'];
}
