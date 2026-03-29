<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;

#[Table('location', key: 'location_id')]
class location extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
