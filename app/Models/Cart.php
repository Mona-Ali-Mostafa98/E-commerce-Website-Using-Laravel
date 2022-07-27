<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    //---------- Start Change default of model -------------
    public $incrementing = false; //Id

    public $timestamps = false;

    protected $keyType = 'string';

    protected $primaryKey = ['id', 'product_id'];
    //------------------------- End ------------------------

    protected $fillable = [
        'id' ,
        'product_id',
        'quantity' ,
        'user_id' ,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    // this function used to allow to make two primary key not only one
    // we can also separate it in trait and use it here

    protected function setKeysForSaveQuery($query)
    {
        $query->where([
            'id'=> $this->attributes['id'],
            'product_id'=> $this->attributes['product_id']
        ]);

        return $query;
    }

}