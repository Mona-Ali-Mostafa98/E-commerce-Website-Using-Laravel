<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'description',
        'parent_id'
    ];
    // relation one to many -- category has many child category and category has one parent category
    public function children(){
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id', 'id')->withDefault([
            'name' => 'No Parent'
        ]);
    }

    //relation one to many -- category has many product and product belongs to one category
    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

}
