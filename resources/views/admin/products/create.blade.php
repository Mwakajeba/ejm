@extends('layouts.admin')

@section('title', 'New product')

@section('content')
    <div class="mx-auto max-w-3xl">
        <h1 class="text-2xl font-semibold text-zinc-900">New product</h1>
        <p class="mt-1 text-sm text-zinc-600">Add details and upload one or more pictures.</p>

        <form method="post" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="mt-8 space-y-8 rounded-xl border border-zinc-200 bg-white p-6 shadow-sm">
            @csrf
            @include('admin.products._form', ['product' => null])

            <div class="flex flex-wrap gap-3 border-t border-zinc-100 pt-6">
                <button type="submit" class="rounded-lg bg-zinc-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-zinc-800">Save product</button>
                <a href="{{ route('admin.products.index') }}" class="rounded-lg border border-zinc-300 bg-white px-5 py-2.5 text-sm font-medium text-zinc-800 hover:bg-zinc-50">Cancel</a>
            </div>
        </form>
    </div>
@endsection
