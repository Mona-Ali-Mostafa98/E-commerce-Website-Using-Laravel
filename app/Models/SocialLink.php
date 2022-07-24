<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'website_name',
        'website_icon',
        'website_url',
        'status',
    ];
}