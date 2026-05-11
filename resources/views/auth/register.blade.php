@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <h1 class="text-xl font-semibold text-zinc-900">Create account</h1>
    <p class="mt-1 text-sm text-zinc-600">Register to shop and track orders.</p>

    @if ($errors->any())
        <ul class="mt-4 list-inside list-disc rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-800">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="post" action="{{ route('register') }}" class="mt-6 space-y-4">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-zinc-700">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                class="mt-1 w-full rounded-lg border border-zinc-200 bg-zinc-50 px-3 py-2 text-sm outline-none ring-red-600/20 focus:border-red-500 focus:bg-white focus:ring-2">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-zinc-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                class="mt-1 w-full rounded-lg border border-zinc-200 bg-zinc-50 px-3 py-2 text-sm outline-none ring-red-600/20 focus:border-red-500 focus:bg-white focus:ring-2">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-zinc-700">Password</label>
            <input id="password" name="password" type="password" required autocomplete="new-password"
                class="mt-1 w-full rounded-lg border border-zinc-200 bg-zinc-50 px-3 py-2 text-sm outline-none ring-red-600/20 focus:border-red-500 focus:bg-white focus:ring-2">
        </div>
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-zinc-700">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                class="mt-1 w-full rounded-lg border border-zinc-200 bg-zinc-50 px-3 py-2 text-sm outline-none ring-red-600/20 focus:border-red-500 focus:bg-white focus:ring-2">
        </div>
        <button type="submit" class="w-full rounded-lg bg-red-600 py-2.5 text-sm font-semibold text-white hover:bg-red-700">
            Register
        </button>
    </form>

    <p class="mt-6 text-center text-sm text-zinc-600">
        Already have an account?
        <a href="{{ route('login') }}" class="font-medium text-red-600 hover:text-red-700">Sign in</a>
    </p>
    <p class="mt-2 text-center text-sm">
        <a href="{{ url('/') }}" class="text-zinc-500 hover:text-zinc-800">← Back to store</a>
    </p>
@endsection
