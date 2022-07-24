<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('admin.contact-us.index', [
            'contacts' => ContactUs:: all() ,
        ]);
    }
    public function show($id)
    {
        return view('admin.contact-us.show',[
            'contact'=> ContactUs::findOrFail($id),
        ]);
    }

    public function destroy($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact -> delete();
        return redirect()->route('admin.contact-us.index')
            ->with('success' , "Massage from '$contact->full_name' Deleted Successfully");
    }
}