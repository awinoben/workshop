<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_email',
        'truck_model',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }
}
