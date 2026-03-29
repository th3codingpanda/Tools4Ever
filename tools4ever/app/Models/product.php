<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;

#[Table('product', key: 'product_id')]
class product extends Model
{
    
    protected $fillable = ['name', 'type','manufacturer','buyprice','sellprice'];
}
