<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('website.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        // Optionally send email or store in DB
        // Mail::to('admin@example.com')->send(new ContactMail($validated));

        return back()->with('success', 'Thank you! Your message has been sent.');
    }
}
