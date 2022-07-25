<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\Statistic;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.about-us',[
            'features'=> Feature::all(),
            'settings'=> Setting::first(),
            'social_links'=> SocialLink::all(),
            'statistics'=>Statistic::all(),
        ]);
    }

}