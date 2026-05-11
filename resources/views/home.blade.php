@extends('layouts.store')

@section('title', 'Home')

@section('content')
    {{-- Hot Sale Products — horizontal carousel (database when marked “hot”, else demo items) --}}
    @php
        $fallbackHotSales = [
            ['brand' => 'HP', 'name' => 'Victus 15L · i5-13th · RTX 4060 · 16GB', 'price' => 2650000, 'img' => 'https://images.unsplash.com/photo-1600861194942-f883de0dfe96?w=320&h=320&fit=crop', 'url' => '#'],
            ['brand' => 'Dell', 'name' => 'E2216HV 22″ Full HD monitor', 'price' => 368000, 'img' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=320&h=320&fit=crop', 'url' => '#'],
            ['brand' => 'Logitech', 'name' => 'Mouse · Wireless · M170', 'price' => 31000, 'img' => 'https://images.unsplash.com/photo-1527814050087-3793815479db?w=320&h=320&fit=crop', 'url' => '#'],
            ['brand' => 'Samsung', 'name' => 'Galaxy Tab A8 10.5″ 64GB Wi‑Fi', 'price' => 459000, 'img' => 'https://images.unsplash.com/photo-1561154464-82e9adf32764?w=320&h=320&fit=crop', 'url' => '#'],
            ['brand' => 'APC', 'name' => 'UPS · 650VA · BV line-interactive', 'price' => 189000, 'img' => 'https://images.unsplash.com/photo-1625948515291-69613ad4d285?w=320&h=320&fit=crop', 'url' => '#'],
            ['brand' => 'Lenovo', 'name' => 'ThinkPad L15 Gen2 · i3 · 8GB · 256GB', 'price' => 524000, 'img' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=320&h=320&fit=crop', 'url' => '#'],
            ['brand' => 'Epson', 'name' => 'EcoTank L-3150 · print / scan / copy', 'price' => 579900, 'img' => 'https://images.unsplash.com/photo-1612815154858-60aa4faf483f?w=320&h=320&fit=crop', 'url' => '#'],
            ['brand' => 'Case', 'name' => '2.5″ HDD external enclosure USB 3.0', 'price' => 30000, 'img' => 'https://images.unsplash.com/photo-1597872200969-2b65d56bd16b?w=320&h=320&fit=crop', 'url' => '#'],
        ];
        $hotSales = (isset($dbHotSales) && $dbHotSales->isNotEmpty())
            ? $dbHotSales->map(fn ($p) => [
                'brand' => $p->brand ?: '—',
                'name' => $p->name,
                'price' => (float) $p->price,
                'img' => $p->primaryImageUrl(),
                'url' => route('products.show', $p),
            ])->all()
            : $fallbackHotSales;
    @endphp
    <section class="border-b border-zinc-200 bg-gradient-to-b from-zinc-100/90 via-white to-white" aria-labelledby="hotsale-heading">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-10">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:gap-8">
                <div class="flex shrink-0 flex-col justify-center border-l-[3px] border-emerald-600 pl-4 sm:pl-5 lg:max-w-[14rem]">
                    <h2 id="hotsale-heading" class="text-xl font-bold uppercase leading-tight tracking-wide text-zinc-900 sm:text-2xl">
                        Hot Sale Products
                    </h2>
                    <p class="mt-3 inline-flex w-fit items-center rounded-sm bg-amber-400 px-2.5 py-1 text-[11px] font-bold uppercase tracking-widest text-amber-950 shadow-sm">
                        This Month
                    </p>
                    <a href="#" class="mt-4 hidden text-sm font-semibold text-emerald-700 hover:text-emerald-800 lg:inline">View all hot deals →</a>
                </div>

                <div class="relative min-w-0 flex-1">
                    <div class="pointer-events-none absolute -left-1 top-0 z-10 hidden h-full w-8 bg-gradient-to-r from-white to-transparent sm:block"></div>
                    <div class="pointer-events-none absolute -right-1 top-0 z-10 hidden h-full w-8 bg-gradient-to-l from-white to-transparent sm:block"></div>
                    <div class="flex items-center gap-2">
                        <button type="button" data-hotsale-prev class="hidden h-10 w-10 shrink-0 items-center justify-center rounded-full border border-zinc-200 bg-white text-zinc-700 shadow-sm hover:border-emerald-500 hover:text-emerald-700 sm:flex" aria-label="Scroll hot sale products left">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <div data-hotsale-track class="flex min-w-0 flex-1 gap-4 overflow-x-auto scroll-smooth pb-2 pt-1 [-ms-overflow-style:none] [scrollbar-width:thin] [scrollbar-color:rgb(16_185_129)_transparent] [&::-webkit-scrollbar]:h-1.5 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-emerald-500/70">
                            @foreach ($hotSales as $item)
                                <article class="group w-[10.5rem] shrink-0 snap-start sm:w-[11.75rem]">
                                    <div class="flex h-full flex-col overflow-hidden rounded border border-zinc-200 bg-white shadow-sm transition hover:border-emerald-500/40 hover:shadow-md">
                                        <a href="{{ $item['url'] }}" class="relative block aspect-square overflow-hidden bg-zinc-50">
                                            <img src="{{ $item['img'] }}" alt="" class="h-full w-full object-cover transition duration-300 group-hover:scale-105" width="320" height="320" loading="lazy">
                                        </a>
                                        <div class="flex flex-1 flex-col p-3">
                                            <p class="text-[10px] font-semibold uppercase tracking-wider text-zinc-500">{{ $item['brand'] }}</p>
                                            <h3 class="mt-1 min-h-[2.5rem] text-xs font-bold leading-snug text-zinc-900 line-clamp-2">{{ $item['name'] }}</h3>
                                            <div class="mt-auto border-t border-zinc-100 pt-2">
                                                <p class="text-[10px] font-medium text-zinc-500">Regular price</p>
                                                <p class="text-sm font-bold tabular-nums text-zinc-900">{{ number_format($item['price'], 2) }} TZS</p>
                                            </div>
                                            <button type="button" class="add-to-cart-btn mt-2 w-full rounded border border-zinc-200 py-1.5 text-[10px] font-bold uppercase tracking-wide text-zinc-800 hover:bg-zinc-900 hover:text-white">
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <button type="button" data-hotsale-next class="hidden h-10 w-10 shrink-0 items-center justify-center rounded-full border border-zinc-200 bg-white text-zinc-700 shadow-sm hover:border-emerald-500 hover:text-emerald-700 sm:flex" aria-label="Scroll hot sale products right">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                    <a href="#" class="mt-4 inline-block text-sm font-semibold text-emerald-700 hover:text-emerald-800 lg:hidden">View all hot deals →</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-zinc-100 via-white to-red-50">
        <div class="mx-auto flex max-w-7xl flex-col gap-10 px-4 py-12 lg:flex-row lg:items-center lg:gap-16 lg:px-8 lg:py-16">
            <div class="max-w-xl">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-red-600">Featured</p>
                <h1 class="mt-3 text-3xl font-semibold tracking-tight text-zinc-900 sm:text-4xl lg:text-5xl">
                    HP Envy 14 x360 — Intel Core i7 13th Gen · 16GB · 1TB SSD
                </h1>
                <p class="mt-4 text-sm text-zinc-600 sm:text-base">
                    Convertible performance for work and creativity. Thin, fast, and ready for Windows 11.
                </p>
                <div class="mt-6 flex flex-wrap items-baseline gap-3">
                    <span class="text-sm font-medium text-zinc-500">From</span>
                    <span class="text-3xl font-bold tabular-nums text-zinc-900">2,599,000</span>
                    <span class="text-sm font-semibold text-zinc-600">TZs</span>
                </div>
                <a href="#" class="mt-8 inline-flex items-center gap-2 rounded-full bg-red-600 px-8 py-3 text-sm font-bold uppercase tracking-wide text-white shadow-lg shadow-red-600/25 transition hover:bg-red-700">
                    Shop now
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="relative flex-1">
                <div class="aspect-[4/3] overflow-hidden rounded-2xl bg-zinc-200 shadow-2xl ring-1 ring-zinc-900/5">
                    <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=900&h=675&fit=crop" alt="Laptop" class="h-full w-full object-cover" width="900" height="675" loading="eager">
                </div>
                <div class="absolute -bottom-4 -left-4 hidden rounded-xl border border-zinc-200 bg-white px-4 py-3 text-xs font-medium text-zinc-600 shadow-lg sm:block">
                    HP · 2-in-1 · In stock at showroom
                </div>
            </div>
        </div>
    </section>

    {{-- Category tiles --}}
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $tiles = [
                    ['Desktops', 'Tower & SFF PCs', 'https://images.unsplash.com/photo-1593640408182-31c70c8268f9?w=600&h=400&fit=crop'],
                    ['Gaming PCs', 'RTX-ready builds', 'https://images.unsplash.com/photo-1600861194942-f883de0dfe96?w=600&h=400&fit=crop'],
                    ['Tablets', 'Windows & Android', 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=600&h=400&fit=crop'],
                    ['Monitors', 'FHD to 4K', 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=600&h=400&fit=crop'],
                ];
            @endphp
            @foreach ($tiles as [$title, $sub, $img])
                <a href="#" class="group relative overflow-hidden rounded-2xl bg-zinc-900 shadow-md ring-1 ring-zinc-900/10">
                    <img src="{{ $img }}" alt="" class="h-44 w-full object-cover opacity-80 transition duration-300 group-hover:scale-105 group-hover:opacity-100 sm:h-52" width="600" height="400" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-5">
                        <h2 class="text-lg font-semibold text-white">{{ $title }}</h2>
                        <p class="text-sm text-zinc-300">{{ $sub }}</p>
                        <span class="mt-2 inline-block text-xs font-bold uppercase tracking-wider text-amber-300">Shop now →</span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- Secondary promo --}}
    <section class="border-y border-zinc-200 bg-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-8 px-4 py-12 lg:flex-row lg:items-center lg:gap-12 lg:px-8">
            <div class="flex-1 overflow-hidden rounded-2xl bg-zinc-100 shadow-inner">
                <img src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=800&h=560&fit=crop" alt="Tablet" class="h-64 w-full object-cover sm:h-80" width="800" height="560" loading="lazy">
            </div>
            <div class="max-w-lg">
                <p class="text-xs font-bold uppercase tracking-widest text-red-600">New</p>
                <h2 class="mt-2 text-2xl font-semibold text-zinc-900 sm:text-3xl">ASUS Slate OLED 13″ tablet</h2>
                <p class="mt-3 text-sm text-zinc-600">
                    Windows 11, detachable keyboard, Asus Pen 2.0, 8GB RAM, 256GB storage.
                </p>
                <div class="mt-4 flex items-baseline gap-2">
                    <span class="text-sm text-zinc-500">From</span>
                    <span class="text-2xl font-bold tabular-nums">1,499,000</span>
                    <span class="text-sm font-medium text-zinc-600">TZs</span>
                </div>
                <a href="#" class="mt-6 inline-flex rounded-full border-2 border-zinc-900 px-6 py-2.5 text-sm font-semibold text-zinc-900 hover:bg-zinc-900 hover:text-white">Shop now</a>
            </div>
        </div>
    </section>

    {{-- Best sellers + tabs (matches main nav: Laptop, Desktop, Printer, …) --}}
    <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
            <h2 class="text-2xl font-semibold text-zinc-900">Best sellers</h2>
            <div class="flex flex-wrap gap-2" role="tablist" aria-label="Best seller categories">
                @foreach ($bestSellerTabs as $i => $tab)
                    <button type="button" data-bestseller-tab="{{ $i }}" class="bestseller-tab rounded-full border px-4 py-2 text-sm font-medium transition {{ $i === 0 ? 'border-red-600 bg-red-50 text-red-700' : 'border-zinc-200 bg-white text-zinc-700 hover:border-zinc-300' }}">
                        {{ $tab['label'] }}
                    </button>
                @endforeach
            </div>
        </div>

        @foreach ($bestSellerTabs as $pi => $tab)
            <div data-bestseller-panel="{{ $pi }}" class="bestseller-panel mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4 {{ $pi === 0 ? '' : 'hidden' }}">
                @if ($tab['dbProducts']->isNotEmpty())
                    @foreach ($tab['dbProducts'] as $product)
                        @php
                            $onSale = $product->compare_at_price && (float) $product->compare_at_price > (float) $product->price;
                        @endphp
                        <article class="group flex flex-col overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm transition hover:shadow-md">
                            <a href="{{ route('products.show', $product) }}" class="relative block aspect-square overflow-hidden bg-zinc-100">
                                <img src="{{ $product->primaryImageUrl() }}" alt="" class="h-full w-full object-cover transition duration-300 group-hover:scale-105" width="400" height="400" loading="lazy">
                                @if ($onSale)
                                    <span class="absolute left-3 top-3 rounded-full bg-red-600 px-2 py-0.5 text-[10px] font-bold uppercase text-white">Sale</span>
                                @endif
                            </a>
                            <div class="flex flex-1 flex-col p-4">
                                <h3 class="text-sm font-semibold leading-snug text-zinc-900 line-clamp-2">
                                    <a href="{{ route('products.show', $product) }}" class="hover:text-red-600">{{ $product->name }}</a>
                                </h3>
                                <div class="mt-auto pt-3">
                                    @if ($onSale)
                                        <p class="text-xs text-zinc-400 line-through">TZs {{ number_format((float) $product->compare_at_price, 0) }}</p>
                                    @endif
                                    <p class="text-base font-bold tabular-nums text-zinc-900">TZs {{ number_format((float) $product->price, 0) }}</p>
                                    <button type="button" class="add-to-cart-btn mt-3 w-full rounded-full bg-zinc-900 py-2.5 text-xs font-bold uppercase tracking-wide text-white hover:bg-zinc-800">Add to cart</button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @else
                    @foreach ($tab['fallbackRows'] as $row)
                        @php
                            $onSale = $row['sale'] && isset($row['old']);
                        @endphp
                        <article class="group flex flex-col overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm transition hover:shadow-md">
                            <div class="relative aspect-square overflow-hidden bg-zinc-100">
                                <img src="{{ $row['img'] }}" alt="" class="h-full w-full object-cover transition duration-300 group-hover:scale-105" width="400" height="400" loading="lazy">
                                @if ($onSale)
                                    <span class="absolute left-3 top-3 rounded-full bg-red-600 px-2 py-0.5 text-[10px] font-bold uppercase text-white">Sale</span>
                                @endif
                            </div>
                            <div class="flex flex-1 flex-col p-4">
                                <h3 class="text-sm font-semibold leading-snug text-zinc-900 line-clamp-2">{{ $row['name'] }}</h3>
                                <div class="mt-auto pt-3">
                                    @if ($onSale)
                                        <p class="text-xs text-zinc-400 line-through">TZs {{ number_format($row['old']) }}</p>
                                    @endif
                                    <p class="text-base font-bold tabular-nums text-zinc-900">TZs {{ number_format($row['price']) }}</p>
                                    <button type="button" class="add-to-cart-btn mt-3 w-full rounded-full bg-zinc-900 py-2.5 text-xs font-bold uppercase tracking-wide text-white hover:bg-zinc-800">Add to cart</button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @endif
            </div>
        @endforeach
    </section>

    {{-- Latest products --}}
    <section class="bg-zinc-50 py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-zinc-900">Latest products</h2>
                    <p class="mt-2 max-w-xl text-sm text-zinc-600">New arrivals handpicked by our team.</p>
                </div>
                <a href="#" class="text-sm font-semibold text-red-600 hover:text-red-700">Shop new products →</a>
            </div>
            @php
                $fallbackLatestRows = [
                    ['HP Victus 15L · i5-14th · 16GB · RTX 4060', 2850000, 'https://images.unsplash.com/photo-1600861194942-f883de0dfe96?w=400&h=400&fit=crop'],
                    ['HP Victus 15L · i5-13th · 16GB · RTX 4060', 2650000, 'https://images.unsplash.com/photo-1593640408182-31c70c8268f9?w=400&h=400&fit=crop'],
                    ['HP 280 G4 SFF · i3-9th · 8GB · 256GB', 390000, 'https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=400&h=400&fit=crop'],
                    ['HP Omnibook 5 · Ultra 7 · 16GB · 1TB · 2K', 1849000, 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=400&h=400&fit=crop'],
                ];
                $latestGrid = (isset($dbLatest) && $dbLatest->isNotEmpty())
                    ? $dbLatest->take(4)->map(fn ($p) => [
                        'name' => $p->name,
                        'price' => (float) $p->price,
                        'img' => $p->primaryImageUrl(),
                        'url' => route('products.show', $p),
                    ])->all()
                    : collect($fallbackLatestRows)->map(fn ($row) => [
                        'name' => $row[0],
                        'price' => (float) $row[1],
                        'img' => $row[2],
                        'url' => '#',
                    ])->all();
            @endphp
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($latestGrid as $row)
                    <article class="overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm">
                        <a href="{{ $row['url'] }}" class="block">
                            <img src="{{ $row['img'] }}" alt="" class="aspect-square w-full object-cover" width="400" height="400" loading="lazy">
                        </a>
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-zinc-900 line-clamp-2">
                                <a href="{{ $row['url'] }}" class="hover:text-red-600">{{ $row['name'] }}</a>
                            </h3>
                            <p class="mt-2 font-bold tabular-nums text-zinc-900">TZs {{ number_format($row['price']) }}</p>
                            <button type="button" class="add-to-cart-btn mt-3 w-full rounded-full border border-zinc-200 py-2 text-xs font-bold uppercase text-zinc-800 hover:bg-zinc-50">Add to cart</button>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.partners-strip')

    {{-- Promo banners --}}
    <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="grid gap-6 lg:grid-cols-2">
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-zinc-800 to-zinc-950 p-8 text-white lg:p-10">
                <p class="text-xs font-bold uppercase tracking-widest text-amber-300">PC cases</p>
                <h3 class="mt-2 text-2xl font-semibold">New arrivals — up to 20% off</h3>
                <a href="#" class="mt-6 inline-flex text-sm font-semibold text-amber-300 hover:underline">Browse cases →</a>
            </div>
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-red-700 to-red-900 p-8 text-white lg:p-10">
                <p class="text-xs font-bold uppercase tracking-widest text-red-200">Printers</p>
                <h3 class="mt-2 text-2xl font-semibold">Find the right printer for you</h3>
                <p class="mt-2 text-sm text-red-100">Starting at 135,000 TZS</p>
                <a href="#" class="mt-6 inline-flex rounded-full bg-white px-5 py-2 text-sm font-bold text-red-800 hover:bg-red-50">Shop printers</a>
            </div>
        </div>
    </section>

    {{-- Trust row --}}
    <section class="border-t border-zinc-200 bg-white py-12">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:grid-cols-2 lg:grid-cols-4 lg:px-8">
            <div class="flex gap-4">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12 0v7.635m-12 0v-7.635m12 0H9.75m0 0H8.25m0 0H9"/></svg>
                </span>
                <div>
                    <h3 class="font-semibold text-zinc-900">Free delivery</h3>
                    <p class="mt-1 text-sm text-zinc-600">Near city center on qualifying orders</p>
                </div>
            </div>
            <div class="flex gap-4">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                </span>
                <div>
                    <h3 class="font-semibold text-zinc-900">Satisfied or refunded</h3>
                    <p class="mt-1 text-sm text-zinc-600">Contact us if the product differs</p>
                </div>
            </div>
            <div class="flex gap-4">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                </span>
                <div>
                    <h3 class="font-semibold text-zinc-900">10am – 8pm</h3>
                    <p class="mt-1 text-sm text-zinc-600">Chat, email, or phone support</p>
                </div>
            </div>
            <div class="flex gap-4">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-red-50 text-red-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"/></svg>
                </span>
                <div>
                    <h3 class="font-semibold text-zinc-900">Secure payments</h3>
                    <p class="mt-1 text-sm text-zinc-600">Cards &amp; mobile money</p>
                </div>
            </div>
        </div>
    </section>
@endsection
