@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-zinc-900">Products</h1>
            <p class="mt-1 text-sm text-zinc-600">Create and manage catalog items and photos.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="inline-flex justify-center rounded-lg bg-zinc-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-zinc-800">
            Add product
        </a>
    </div>

    <form method="get" action="{{ route('admin.products.index') }}" class="mt-6 flex max-w-md gap-2">
        <input type="search" name="q" value="{{ request('q') }}" placeholder="Search name or brand…"
            class="min-w-0 flex-1 rounded-lg border border-zinc-300 px-3 py-2 text-sm text-zinc-900 focus:border-zinc-900 focus:outline-none focus:ring-1 focus:ring-zinc-900">
        <button type="submit" class="rounded-lg border border-zinc-300 bg-white px-4 py-2 text-sm font-medium text-zinc-800 hover:bg-zinc-50">Search</button>
    </form>

    <div class="mt-6 overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-zinc-200 text-sm">
            <thead class="bg-zinc-50 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500">
                <tr>
                    <th class="px-4 py-3">Image</th>
                    <th class="px-4 py-3">Product</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3">Flags</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-100">
                @forelse ($products as $product)
                    <tr class="hover:bg-zinc-50/80">
                        <td class="px-4 py-3">
                            <img src="{{ $product->primaryImageUrl() }}" alt="" class="h-12 w-12 rounded-lg object-cover ring-1 ring-zinc-200" width="48" height="48" loading="lazy">
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-medium text-zinc-900">{{ $product->name }}</p>
                            @if ($product->brand)
                                <p class="text-xs text-zinc-500">{{ $product->brand }}</p>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-zinc-600">
                            @if ($product->category)
                                {{ \App\Models\Product::categoryLabels()[$product->category] ?? $product->category }}
                            @else
                                <span class="text-zinc-400">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 tabular-nums text-zinc-800">{{ number_format((float) $product->price, 0) }} TZS</td>
                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-1">
                                @if ($product->is_hot_sale)
                                    <span class="rounded-full bg-amber-100 px-2 py-0.5 text-[10px] font-bold uppercase text-amber-900">Hot</span>
                                @endif
                                @if (! $product->is_published)
                                    <span class="rounded-full bg-zinc-200 px-2 py-0.5 text-[10px] font-bold uppercase text-zinc-700">Draft</span>
                                @endif
                                <span class="text-xs text-zinc-500">{{ $product->images_count }} photos</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('products.show', $product) }}" class="text-emerald-700 hover:underline" target="_blank" rel="noopener">View</a>
                            <span class="text-zinc-300">·</span>
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-zinc-900 hover:underline">Edit</a>
                            <span class="text-zinc-300">·</span>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="post" class="inline" onsubmit="return confirm('Delete this product and all its images?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-12 text-center text-sm text-zinc-500">No products yet. Add your first product to get started.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($products->hasPages())
        <div class="mt-6">{{ $products->links() }}</div>
    @endif
@endsection
