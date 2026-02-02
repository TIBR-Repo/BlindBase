<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function show()
    {
        return view('pages.contact');
    }

    /**
     * Process the contact form submission.
     */
    public function send(ContactFormRequest $request)
    {
        $validated = $request->validated();

        // Send email
        Mail::to(config('mail.from.address', 'sales@blindbase.co.uk'))
            ->send(new ContactFormMail($validated));

        return redirect()
            ->route('contact')
            ->with('success', 'Thank you for your message! We\'ll get back to you within 24 hours.');
    }
}
