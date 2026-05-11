@extends('layouts.store')

@section('title', 'Contact us')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="text-xs font-bold uppercase tracking-widest text-red-600">Get in touch</p>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight text-zinc-900 sm:text-4xl">Contact us</h1>
            <p class="mt-3 text-sm text-zinc-600 sm:text-base">
                Visit our showroom, call us, or send a message — we will respond as soon as we can.
            </p>
        </div>

        @if (session('status'))
            <div class="mt-8 max-w-2xl rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">
                {{ session('status') }}
            </div>
        @endif

        <div class="mt-10 grid gap-10 lg:grid-cols-2 lg:gap-14">
            <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm sm:p-8">
                <h2 class="text-lg font-semibold text-zinc-900">Send a message</h2>
                <p class="mt-1 text-sm text-zinc-500">Fields marked with an asterisk are required.</p>

                <form method="post" action="{{ route('contact.store') }}" class="mt-6 space-y-5">
                    @csrf
                    <div>
                        <label for="contact-name" class="block text-sm font-medium text-zinc-700">Name <span class="text-red-600">*</span></label>
                        <input type="text" name="name" id="contact-name" value="{{ old('name') }}" required maxlength="120" autocomplete="name"
                            class="mt-1 block w-full rounded-lg border border-zinc-300 px-3 py-2 text-zinc-900 shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="contact-email" class="block text-sm font-medium text-zinc-700">Email <span class="text-red-600">*</span></label>
                        <input type="email" name="email" id="contact-email" value="{{ old('email') }}" required maxlength="255" autocomplete="email"
                            class="mt-1 block w-full rounded-lg border border-zinc-300 px-3 py-2 text-zinc-900 shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="contact-message" class="block text-sm font-medium text-zinc-700">Message <span class="text-red-600">*</span></label>
                        <textarea name="message" id="contact-message" rows="6" required maxlength="5000"
                            class="mt-1 block w-full rounded-lg border border-zinc-300 px-3 py-2 text-zinc-900 shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-full rounded-full bg-red-600 px-6 py-3 text-sm font-bold uppercase tracking-wide text-white shadow-sm hover:bg-red-700 sm:w-auto">
                        Send message
                    </button>
                </form>
            </div>

            <div class="space-y-8">
                <div class="rounded-2xl border border-zinc-200 bg-zinc-50 p-6 sm:p-8">
                    <h2 class="text-lg font-semibold text-zinc-900">Showroom &amp; mail</h2>
                    <address class="mt-4 not-italic text-sm leading-relaxed text-zinc-700">
                        Mtendeni Street, Opp BIMA House<br>
                        P.O. Box 4141, Dodoma, Tanzania
                    </address>
                </div>

                <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm sm:p-8">
                    <h2 class="text-lg font-semibold text-zinc-900">Phone &amp; email</h2>
                    <dl class="mt-4 space-y-4 text-sm">
                        <div>
                            <dt class="font-medium text-zinc-500">Telephone</dt>
                            <dd class="mt-1 space-y-1 text-zinc-800">
                                <a href="tel:+255262323561" class="block hover:text-red-600">+255 26 2323561</a>
                                <a href="tel:+255714264274" class="block hover:text-red-600">+255 714 264274</a>
                                <a href="tel:+255764999993" class="block hover:text-red-600">+255 764 999993</a>
                            </dd>
                        </div>
                        <div>
                            <dt class="font-medium text-zinc-500">E-mail</dt>
                            <dd class="mt-1">
                                <a href="mailto:ejminternationalltd@gmail.com" class="text-red-600 hover:text-red-700">ejminternationalltd@gmail.com</a>
                            </dd>
                        </div>
                    </dl>
                </div>

                <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm sm:p-8">
                    <h2 class="text-lg font-semibold text-zinc-900">WhatsApp</h2>
                    <p class="mt-2 text-sm text-zinc-600">Quick questions about stock or pricing.</p>
                    <a href="https://wa.me/255764999993?text=Hi%2C%20I%27m%20contacting%20you%20from%20the%20website." target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex items-center gap-2 rounded-full bg-[#25D366] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[#20BD5A]">
                        Chat on WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
