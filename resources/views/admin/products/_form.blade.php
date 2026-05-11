@php
    /** @var \App\Models\Product|null $product */
    $product = $product ?? null;
@endphp

<div class="space-y-6">
    <div class="grid gap-6 sm:grid-cols-2">
        <div class="sm:col-span-2">
            <label for="name" class="block text-sm font-medium text-zinc-700">Product name <span class="text-red-600">*</span></label>
            <input type="text" name="name" id="name" value="{{ old('name', $product?->name) }}" required maxlength="255"
                class="mt-1 block w-full rounded-lg border border-zinc-300 px-3 py-2 text-zinc-900 shadow-sm focus:border-zinc-900 focus:outline-none focus:ring-1 focus:ring-zinc-900">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="category" class="block text-sm font-medium text-zinc-700">Category (main menu)</label>
            <p class="mt-0.5 text-xs text-zinc-500">Used for Best sellers tabs on the home page (Laptop, Desktop, etc.).</p>
            <select name="category" id="category"
                class="mt-1 block w-full rounded-lg border border-zinc-300 px-3 py-2 text-zinc-900 shadow-sm focus:border-zinc-900 focus:outline-none focus:ring-1 focus:ring-zinc-900">
                <option value="">— None —</option>
                @foreach (\App\Models\Product::categoryLabels() as $key => $label)
                    <option value="{{ $key }}" @selected(old('category', $product?->category) === $key)>{{ $label }}</option>
                @endforeach
            </select>
            @error('category')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="brand" class="block text-sm font-medium text-zinc-700">Brand</label>
            <input type="text" name="brand" id="brand" value="{{ old('brand', $product?->brand) }}" maxlength="120"
                class="mt-1 block w-full rounded-lg border border-zinc-300 px-3 py-2 text-zinc-900 shadow-sm focus:border-zinc-900 focus:outline-none focus:ring-1 focus:ring-zinc-900">
            @error('brand')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="price" class="block text-sm font-medium text-zinc-700">Price (TZS) <span class="text-red-600">*</span></label>
            <input type="number" name="price" id="price" value="{{ old('price', $product?->price) }}" required min="0" step="0.01"
                class="mt-1 block w-full rounded-lg border border-zinc-300 px-3 py-2 text-zinc-900 shadow-sm focus:border-zinc-900 focus:outline-none focus:ring-1 focus:ring-zinc-900">
            @error('price')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="compare_at_price" class="block text-sm font-medium text-zinc-700">List / was price (optional)</label>
            <p class="mt-0.5 text-xs text-zinc-500">If set higher than the sale price, it appears crossed out next to the current price on the product page.</p>
            <input type="number" name="compare_at_price" id="compare_at_price" value="{{ old('compare_at_price', $product?->compare_at_price) }}" min="0" step="0.01"
                class="mt-1 block w-full rounded-lg border border-zinc-300 px-3 py-2 text-zinc-900 shadow-sm focus:border-zinc-900 focus:outline-none focus:ring-1 focus:ring-zinc-900">
            @error('compare_at_price')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="description" class="block text-sm font-medium text-zinc-700">Description</label>
            <textarea name="description" id="description" rows="5" maxlength="50000"
                class="mt-1 block w-full rounded-lg border border-zinc-300 px-3 py-2 text-zinc-900 shadow-sm focus:border-zinc-900 focus:outline-none focus:ring-1 focus:ring-zinc-900">{{ old('description', $product?->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap gap-6">
        <label class="flex items-center gap-2 text-sm text-zinc-800">
            <input type="hidden" name="is_hot_sale" value="0">
            <input type="checkbox" name="is_hot_sale" value="1" class="rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900"
                @checked(old('is_hot_sale', $product?->is_hot_sale ?? false))>
            Show in hot sale carousel on home
        </label>
        <label class="flex items-center gap-2 text-sm text-zinc-800">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" value="1" class="rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900"
                @checked(old('is_published', $product?->is_published ?? true))>
            Published (visible in shop)
        </label>
    </div>

    <div>
        <label for="images" class="block text-sm font-medium text-zinc-700">{{ $product ? 'Add more pictures' : 'Pictures' }}</label>
        <p class="mt-0.5 text-xs text-zinc-500">JPEG, PNG, WebP or GIF. Up to 5&nbsp;MB each. You can select multiple files.</p>
        <input type="file" name="images[]" id="images" accept="image/*" multiple
            class="mt-2 block w-full text-sm text-zinc-600 file:mr-4 file:rounded-lg file:border-0 file:bg-zinc-900 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-zinc-800">
        @error('images')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
        @error('images.*')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
