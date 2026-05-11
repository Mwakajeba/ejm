<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('contact');
    }

    public function store(ContactMessageRequest $request): RedirectResponse
    {
        $to = config('mail.contact_address') ?: config('mail.from.address');

        Mail::raw(
            "Name: {$request->string('name')}\nEmail: {$request->string('email')}\n\n".$request->string('message'),
            function ($message) use ($request, $to): void {
                $message->to($to)
                    ->subject('Website contact: '.$request->string('name'))
                    ->replyTo($request->string('email'), $request->string('name'));
            }
        );

        return redirect()
            ->route('contact')
            ->with('status', 'Thank you — your message has been sent. We will get back to you soon.');
    }
}
