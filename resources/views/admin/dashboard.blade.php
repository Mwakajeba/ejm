@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-2xl font-semibold text-zinc-900">Dashboard</h1>
    <p class="mt-1 text-sm text-zinc-600">Overview of your store backend.</p>

    <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-medium text-zinc-500">Products</p>
            <p class="mt-2 text-3xl font-bold tabular-nums text-zinc-900">{{ $productCount }}</p>
            <a href="{{ route('admin.products.index') }}" class="mt-3 inline-block text-sm font-semibold text-emerald-700 hover:text-emerald-800">Manage products →</a>
        </div>
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-medium text-zinc-500">Registered users</p>
            <p class="mt-2 text-3xl font-bold tabular-nums text-zinc-900">{{ $userCount }}</p>
        </div>
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-medium text-zinc-500">Admin accounts</p>
            <p class="mt-2 text-3xl font-bold tabular-nums text-zinc-900">{{ $adminCount }}</p>
        </div>
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm sm:col-span-2 lg:col-span-1">
            <p class="text-sm font-medium text-zinc-500">Next steps</p>
            <ul class="mt-3 list-inside list-disc text-sm text-zinc-600">
                <li>Add categories and filters to the catalog</li>
                <li>Connect cart and checkout to real orders</li>
                <li>Configure payments and delivery</li>
            </ul>
        </div>
    </div>
@endsection
