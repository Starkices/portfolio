<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Mail\ContactMessageReceived;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('contact');
    }

    public function store(
        StoreContactMessageRequest $request
    ): RedirectResponse {
        $key = 'contact-form:' . Str::lower(
            $request->string('email')->toString()
        ) . '|' . $request->ip();

        $allowed = RateLimiter::attempt(
            $key,
            3,
            fn () => true,
            300
        );

        if (! $allowed) {
            return back()
                ->withInput()
                ->withErrors([
                    'form' =>
                        'Too many messages have been sent from this address. Please try again later.',
                ]);
        }

        $validated = $request->validated();

        $contactMessage = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'unread',
        ]);

        Mail::to(config('portfolio.contact_email'))
            ->send(new ContactMessageReceived($contactMessage));

        return redirect()
            ->route('contact.create')
            ->with(
                'status',
                'Message received. I’ll get back to you as soon as possible.'
            );
    }
}