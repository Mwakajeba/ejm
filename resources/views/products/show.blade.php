@extends('layouts.store')

@section('title', $product->name)

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <nav class="text-sm text-zinc-500">
            <a href="{{ route('home') }}" class="hover:text-red-600">Home</a>
            <span class="mx-2 text-zinc-300">/</span>
            <a href="{{ route('products.index') }}" class="hover:text-red-600">Products</a>
            <span class="mx-2 text-zinc-300">/</span>
            <span class="text-zinc-800">{{ $product->name }}</span>
        </nav>

        <div class="mt-8 grid gap-10 lg:grid-cols-2 lg:gap-14">
            <div class="space-y-4">
                @if ($product->images->isEmpty())
                    <div class="aspect-square overflow-hidden rounded-2xl bg-zinc-100 ring-1 ring-zinc-200">
                        <img src="{{ $product->primaryImageUrl() }}" alt="" class="h-full w-full object-cover" width="800" height="800">
                    </div>
                @else
                    <div class="aspect-square overflow-hidden rounded-2xl bg-zinc-100 ring-1 ring-zinc-200">
                        <img src="{{ $product->images->first()->url() }}" alt="" class="h-full w-full object-cover" width="800" height="800" id="product-main-image">
                    </div>
                    @if ($product->images->count() > 1)
                        <div class="grid grid-cols-4 gap-2 sm:grid-cols-5">
                            @foreach ($product->images as $image)
                                <button type="button" class="product-thumb overflow-hidden rounded-lg ring-2 ring-transparent hover:ring-red-500 focus:outline-none focus:ring-red-500" data-full-src="{{ $image->url() }}">
                                    <img src="{{ $image->url() }}" alt="" class="aspect-square w-full object-cover" width="120" height="120" loading="lazy">
                                </button>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>

            <div>
                @if ($product->brand)
                    <p class="text-xs font-bold uppercase tracking-widest text-red-600">{{ $product->brand }}</p>
                @endif
                <h1 class="mt-2 text-3xl font-semibold tracking-tight text-zinc-900 sm:text-4xl">{{ $product->name }}</h1>

                <div class="mt-6 flex flex-wrap items-baseline gap-2">
                    @if ($product->compare_at_price && (float) $product->compare_at_price > (float) $product->price)
                        <span class="text-lg text-zinc-400 line-through">TZs {{ number_format((float) $product->compare_at_price, 0) }}</span>
                    @endif
                    <span class="text-3xl font-bold tabular-nums text-zinc-900">TZs {{ number_format((float) $product->price, 0) }}</span>
                </div>

                @if ($product->description)
                    <div class="prose prose-sm prose-zinc mt-8 max-w-none">
                        <p class="whitespace-pre-line text-zinc-600">{{ $product->description }}</p>
                    </div>
                @endif

                <div class="mt-10 flex flex-wrap gap-3">
                    <button type="button" class="add-to-cart-btn inline-flex rounded-full bg-zinc-900 px-8 py-3 text-sm font-bold uppercase tracking-wide text-white hover:bg-zinc-800">Add to cart</button>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center rounded-full border-2 border-zinc-300 px-6 py-3 text-sm font-semibold text-zinc-800 hover:bg-zinc-50">More products</a>
                </div>
            </div>
        </div>
    </div>

    @if ($product->images->count() > 1)
        <script>
            document.querySelectorAll('.product-thumb').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var src = this.getAttribute('data-full-src');
                    var main = document.getElementById('product-main-image');
                    if (main && src) main.src = src;
                });
            });
        </script>
    @endif
@endsection
