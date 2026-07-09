<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;

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

        Mail::to('contact@vkblog.in')->send(new ContactMail($validated));

        return back()->with('success', 'Thank you! Your message has been sent.');
    }
}
