@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <h1 class="text-xl font-semibold text-zinc-900">Sign in</h1>
    <p class="mt-1 text-sm text-zinc-600">Use your account to continue.</p>

    @if ($errors->any())
        <div class="mt-4 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-800">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="post" action="{{ route('login') }}" class="mt-6 space-y-4">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-zinc-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                class="mt-1 w-full rounded-lg border border-zinc-200 bg-zinc-50 px-3 py-2 text-sm outline-none ring-red-600/20 focus:border-red-500 focus:bg-white focus:ring-2">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-zinc-700">Password</label>
            <input id="password" name="password" type="password" required autocomplete="current-password"
                class="mt-1 w-full rounded-lg border border-zinc-200 bg-zinc-50 px-3 py-2 text-sm outline-none ring-red-600/20 focus:border-red-500 focus:bg-white focus:ring-2">
        </div>
        <div class="flex items-center gap-2">
            <input id="remember" name="remember" type="checkbox" value="1" class="rounded border-zinc-300 text-red-600 focus:ring-red-500">
            <label for="remember" class="text-sm text-zinc-600">Remember me</label>
        </div>
        <button type="submit" class="w-full rounded-lg bg-red-600 py-2.5 text-sm font-semibold text-white hover:bg-red-700">
            Sign in
        </button>
    </form>

    <p class="mt-6 text-center text-sm text-zinc-600">
        No account?
        <a href="{{ route('register') }}" class="font-medium text-red-600 hover:text-red-700">Register</a>
    </p>
    <p class="mt-2 text-center text-sm">
        <a href="{{ url('/') }}" class="text-zinc-500 hover:text-zinc-800">← Back to store</a>
    </p>
@endsection
