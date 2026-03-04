<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10',
        ]);

        Mail::to('admin@cryptodashboard.test')->send(
            new ContactMail(
                senderName: $validated['name'],
                senderEmail: $validated['email'],
                mailSubject: $validated['subject'],
                mailMessage: $validated['message'],
            )
        );

        return redirect('/contact')->with('success', 'Bedankt voor je bericht! We nemen zo snel mogelijk contact op.');
    }
}