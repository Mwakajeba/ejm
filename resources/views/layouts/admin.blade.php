<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-zinc-100 text-zinc-900 antialiased">
    <div class="flex min-h-screen">
        <aside class="hidden w-56 shrink-0 flex-col border-r border-zinc-200 bg-zinc-900 text-zinc-300 md:flex">
            <div class="border-b border-zinc-800 px-4 py-4">
                <span class="text-sm font-semibold text-white">{{ config('app.name') }}</span>
                <p class="text-xs text-zinc-500">Admin</p>
            </div>
            <nav class="flex flex-1 flex-col gap-1 p-3 text-sm">
                <a href="{{ route('admin.dashboard') }}" class="rounded-lg px-3 py-2 font-medium text-white hover:bg-zinc-800 {{ request()->routeIs('admin.dashboard') ? 'bg-zinc-800' : '' }}">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="rounded-lg px-3 py-2 font-medium hover:bg-zinc-800 {{ request()->routeIs('admin.products.*') ? 'bg-zinc-800 text-white' : '' }}">Products</a>
                <a href="{{ route('home') }}" class="rounded-lg px-3 py-2 hover:bg-zinc-800">View storefront</a>
            </nav>
            <div class="border-t border-zinc-800 p-3">
                <p class="truncate px-3 text-xs text-zinc-500">{{ auth()->user()->email }}</p>
                <form method="post" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full rounded-lg px-3 py-2 text-left text-sm text-amber-300 hover:bg-zinc-800">Log out</button>
                </form>
            </div>
        </aside>

        <div class="flex min-w-0 flex-1 flex-col">
            <header class="flex items-center justify-between border-b border-zinc-200 bg-white px-4 py-3 md:hidden">
                <span class="font-semibold text-zinc-900">Admin</span>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-600">Log out</button>
                </form>
            </header>
            <main class="flex-1 p-4 md:p-8">
                @if (session('status'))
                    <p class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">{{ session('status') }}</p>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
