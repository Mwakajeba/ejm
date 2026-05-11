@extends('layouts.store')

@section('title', 'All products')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-zinc-900 sm:text-3xl">All products</h1>
                <p class="mt-1 text-sm text-zinc-600">Browse everything currently in the catalog.</p>
            </div>
            <a href="{{ route('home') }}" class="text-sm font-semibold text-red-600 hover:text-red-700">← Back to home</a>
        </div>

        @if ($products->isEmpty())
            <p class="mt-12 rounded-xl border border-zinc-200 bg-zinc-50 px-6 py-10 text-center text-sm text-zinc-600">No products published yet. Check back soon.</p>
        @else
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $product)
                    <article class="group flex flex-col overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm transition hover:shadow-md">
                        <a href="{{ route('products.show', $product) }}" class="relative aspect-square overflow-hidden bg-zinc-100">
                            <img src="{{ $product->primaryImageUrl() }}" alt="" class="h-full w-full object-cover transition duration-300 group-hover:scale-105" width="400" height="400" loading="lazy">
                        </a>
                        <div class="flex flex-1 flex-col p-4">
                            @if ($product->brand)
                                <p class="text-[10px] font-semibold uppercase tracking-wider text-zinc-500">{{ $product->brand }}</p>
                            @endif
                            <h2 class="mt-1 text-sm font-semibold leading-snug text-zinc-900 line-clamp-2">
                                <a href="{{ route('products.show', $product) }}" class="hover:text-red-600">{{ $product->name }}</a>
                            </h2>
                            <div class="mt-auto pt-3">
                                @if ($product->compare_at_price && (float) $product->compare_at_price > (float) $product->price)
                                    <p class="text-xs text-zinc-400 line-through">TZs {{ number_format((float) $product->compare_at_price, 0) }}</p>
                                @endif
                                <p class="text-base font-bold tabular-nums text-zinc-900">TZs {{ number_format((float) $product->price, 0) }}</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">{{ $products->links() }}</div>
        @endif
    </div>
@endsection
