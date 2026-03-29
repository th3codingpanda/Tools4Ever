<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;

#[Table('storage', key: 'storage_id')]
class storage extends Model
{
    protected $fillable = ['product_id', 'location_id','amount','minimum_amount'];
}
