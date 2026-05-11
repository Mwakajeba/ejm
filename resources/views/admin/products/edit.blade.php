@extends('layouts.admin')

@section('title', 'Edit product')

@section('content')
    <div class="mx-auto max-w-3xl">
        <h1 class="text-2xl font-semibold text-zinc-900">Edit product</h1>
        <p class="mt-1 text-sm text-zinc-600">{{ $product->name }}</p>

        <form method="post" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" class="mt-8 space-y-8 rounded-xl border border-zinc-200 bg-white p-6 shadow-sm">
            @csrf
            @method('PUT')
            @include('admin.products._form', ['product' => $product])

            @if ($product->images->isNotEmpty())
                <div class="border-t border-zinc-100 pt-6">
                    <p class="text-sm font-medium text-zinc-700">Current pictures</p>
                    <p class="mt-0.5 text-xs text-zinc-500">Check the box to remove a picture when you save.</p>
                    <ul class="mt-4 grid grid-cols-2 gap-4 sm:grid-cols-3">
                        @foreach ($product->images as $image)
                            <li class="relative overflow-hidden rounded-lg border border-zinc-200 bg-zinc-50">
                                <img src="{{ $image->url() }}" alt="" class="aspect-square w-full object-cover" width="320" height="320" loading="lazy">
                                <label class="flex items-center gap-2 border-t border-zinc-200 bg-white px-3 py-2 text-xs text-red-700">
                                    <input type="checkbox" name="remove_image_ids[]" value="{{ $image->id }}" class="rounded border-zinc-300 text-red-600 focus:ring-red-500">
                                    Remove
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex flex-wrap gap-3 border-t border-zinc-100 pt-6">
                <button type="submit" class="rounded-lg bg-zinc-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-zinc-800">Update product</button>
                <a href="{{ route('admin.products.index') }}" class="rounded-lg border border-zinc-300 bg-white px-5 py-2.5 text-sm font-medium text-zinc-800 hover:bg-zinc-50">Back to list</a>
            </div>
        </form>
    </div>
@endsection
