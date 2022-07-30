<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'total', 'status',
    ];

    // order with product many to many so order_product represent table of relation 
    // each table will one to many with  order_product
    public function items()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    // this relation to get data of products stored in order_product table
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')
            ->using(OrderProduct::class)
            ->withPivot([
                'price', 'quantity'
            ]);
    }
}