<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductCatalogController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->where('is_published', true)
            ->with(['images' => fn ($q) => $q->orderBy('sort_order')])
            ->latest()
            ->paginate(24);

        return view('products.index', compact('products'));
    }

    public function show(Product $product): View
    {
        if (! $product->is_published) {
            abort(404);
        }

        $product->load(['images' => fn ($q) => $q->orderBy('sort_order')]);

        return view('products.show', compact('product'));
    }
}
