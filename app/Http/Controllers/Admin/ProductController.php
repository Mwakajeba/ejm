<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $q = Product::query()
            ->withCount('images')
            ->with(['images' => fn ($q) => $q->orderBy('sort_order')])
            ->latest();

        if ($search = $request->string('q')->trim()->toString()) {
            $q->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('brand', 'like', '%'.$search.'%');
            });
        }

        $products = $q->paginate(15)->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $slug = Product::uniqueSlugFromName($data['name']);

        $product = Product::query()->create([
            'name' => $data['name'],
            'slug' => $slug,
            'category' => $data['category'] ?? null,
            'brand' => $data['brand'] ?? null,
            'description' => $data['description'] ?? null,
            'price' => $data['price'],
            'compare_at_price' => $data['compare_at_price'] ?? null,
            'is_hot_sale' => $request->boolean('is_hot_sale'),
            'is_published' => $request->boolean('is_published', true),
        ]);

        $this->storeUploadedImages($product, $request->file('images', []));

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Product created.');
    }

    public function edit(Product $product): View
    {
        $product->load('images');

        return view('admin.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        $removeIds = collect($request->input('remove_image_ids', []))
            ->map(fn ($id) => (int) $id)
            ->filter()
            ->all();

        if ($removeIds !== []) {
            $toDelete = $product->images()->whereIn('id', $removeIds)->get();
            foreach ($toDelete as $image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }
        }

        $product->update([
            'name' => $data['name'],
            'slug' => Product::uniqueSlugFromName($data['name'], $product->id),
            'category' => $data['category'] ?? null,
            'brand' => $data['brand'] ?? null,
            'description' => $data['description'] ?? null,
            'price' => $data['price'],
            'compare_at_price' => $data['compare_at_price'] ?? null,
            'is_hot_sale' => $request->boolean('is_hot_sale'),
            'is_published' => $request->boolean('is_published', true),
        ]);

        $this->storeUploadedImages($product, $request->file('images', []));

        return redirect()
            ->route('admin.products.edit', $product)
            ->with('status', 'Product updated.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->path);
        }
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Product deleted.');
    }

    /**
     * @param  array<int, UploadedFile>  $files
     */
    private function storeUploadedImages(Product $product, array $files): void
    {
        if ($files === []) {
            return;
        }

        $maxSort = (int) ($product->images()->max('sort_order') ?? 0);

        foreach ($files as $idx => $file) {
            if (! $file->isValid()) {
                continue;
            }
            $path = $file->store('products', 'public');
            $product->images()->create([
                'path' => $path,
                'sort_order' => $maxSort + $idx + 1,
            ]);
        }
    }
}
