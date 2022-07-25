<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Feature;
use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.contact-us',[
            'features'=> Feature::all(),
            'settings'=> Setting::first(),
            'social_links'=> SocialLink::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required','string', 'max:255'],
            'email' => ['required','string' , 'email'],
            'phone' => ['required','numeric'],
            'subject' => ['required', 'string' , 'max:100'],
            'message' => ['required' , 'string','max:1000'],
        ]);
        ContactUs::create($data);
        return redirect()->route('website.index') -> with('success','Your Message Sent Successfully , We Will Contact You Soon ');
    }
    }