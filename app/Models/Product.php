<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description',
        'price',
        'sale_price',
        'quantity',
        'image',
        'category_id',
        'featured',
        'views',
        'sales',
    ];
    //product belong to one category
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault();
    }

    // add accessor to model product to check if sale_price is exist and return final price
    public function getFinalPriceAttribute()
    {
        if ($this->sale_price > 0) {
            return $this->sale_price;
        }
        return $this->price;
    }

    // this relation to get data of orders stored in order_product table
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products')
            ->using(OrderProduct::class)
            ->withPivot([
                'price', 'quantity'
            ]);
    }
    
}