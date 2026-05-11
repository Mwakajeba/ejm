<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

#[Fillable([
    'name',
    'slug',
    'category',
    'brand',
    'description',
    'price',
    'compare_at_price',
    'is_hot_sale',
    'is_published',
])]
class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    /**
     * Main nav categories (same order as store header: Laptop … Security).
     *
     * @return array<string, string>
     */
    public static function categoryLabels(): array
    {
        return [
            'laptop' => 'Laptop',
            'desktop' => 'Desktop',
            'printer' => 'Printer',
            'photocopy' => 'Photocopy',
            'scanner' => 'Scanner',
            'network' => 'Network',
            'security' => 'Security',
        ];
    }

    /**
     * @return list<string>
     */
    public static function categoryKeys(): array
    {
        return array_keys(self::categoryLabels());
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'compare_at_price' => 'decimal:2',
            'is_hot_sale' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function primaryImageUrl(): string
    {
        $path = $this->relationLoaded('images')
            ? $this->images->first()?->path
            : $this->images()->value('path');
        if ($path) {
            return Storage::disk('public')->url($path);
        }

        return 'https://images.unsplash.com/photo-1560472354-b33fc0ae44bf?w=400&h=400&fit=crop';
    }

    public static function uniqueSlugFromName(string $name, ?int $exceptProductId = null): string
    {
        $base = Str::slug($name);
        if ($base === '') {
            $base = 'product';
        }
        $slug = $base;
        $i = 1;
        while (static::query()
            ->when($exceptProductId !== null, fn ($q) => $q->where('id', '!=', $exceptProductId))
            ->where('slug', $slug)
            ->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }
}
