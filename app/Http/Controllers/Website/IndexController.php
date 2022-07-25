<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.index',[
            'products'=> Product::all(),
            'features'=> Feature::all(),
            'settings'=> Setting::first(),
            'social_links'=> SocialLink::all(),

        ]);
    }
}