<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'truck_model',
        'part_no',
        'description',
        'price',
    ];
}
