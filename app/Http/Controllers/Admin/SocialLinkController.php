<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        return view('admin.socialLinks.index', [
            'links' => SocialLink:: all()
        ]);
    }

    public function show($id)
    {
        return view('admin.socialLinks.show',[
            'link'=> SocialLink::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
        return view('admin.socialLinks.edit',[
            'link'=> SocialLink::findOrFail($id)
        ]);
    }

    public function update ( Request $request, $id)
    {
        $link=SocialLink::findOrFail($id);

        $request->validate([
            'website_name' => ['required','string', 'max:255'],
            'website_url' => ['required','string'],
        ]);

        $data = $request->all();
        $link->update($data);

        return redirect()->route('admin.social-links.index')
            ->with('success',"Link '$link->website_name' updated successfully");

    }

    public function destroy($id)
    {
        $link = SocialLink::findOrFail($id);
        $link -> delete();
        return redirect()->route('admin.social-links.index')
            ->with('success' , "link '$link->title' Deleted Successfully");

    }
}