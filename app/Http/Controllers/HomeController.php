<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $dbHotSales = Product::query()
            ->where('is_published', true)
            ->where('is_hot_sale', true)
            ->with(['images' => fn ($q) => $q->orderBy('sort_order')])
            ->latest('updated_at')
            ->get();

        $dbLatest = Product::query()
            ->where('is_published', true)
            ->with(['images' => fn ($q) => $q->orderBy('sort_order')])
            ->latest()
            ->take(8)
            ->get();

        return view('home', [
            'dbHotSales' => $dbHotSales,
            'dbLatest' => $dbLatest,
            'bestSellerTabs' => self::buildBestSellerTabs(),
        ]);
    }

    /**
     * Tab payloads for the home “Best sellers” block (used by HomeController and the home view composer).
     *
     * @return list<array{key: string, label: string, dbProducts: Collection<int, Product>, fallbackRows: list<array<string, mixed>>}>
     */
    public static function buildBestSellerTabs(): array
    {
        $bestSellerTabs = [];
        foreach (Product::categoryLabels() as $key => $label) {
            $dbProducts = Product::query()
                ->where('is_published', true)
                ->where('category', $key)
                ->with(['images' => fn ($q) => $q->orderBy('sort_order')])
                ->latest('updated_at')
                ->take(8)
                ->get();

            $bestSellerTabs[] = [
                'key' => $key,
                'label' => $label,
                'dbProducts' => $dbProducts,
                'fallbackRows' => self::fallbackBestSellerRows($key),
            ];
        }

        return $bestSellerTabs;
    }

    /**
     * Demo rows when no published products exist for a nav category.
     *
     * @return list<array{name: string, price: float, img: string, sale: bool, old?: float}>
     */
    private static function fallbackBestSellerRows(string $category): array
    {
        return match ($category) {
            'laptop' => [
                ['name' => 'HP Victus 15L · i5-13th · RTX 4060 · 16GB', 'price' => 2650000.0, 'img' => 'https://images.unsplash.com/photo-1600861194942-f883de0dfe96?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => 'Lenovo ThinkPad L15 Gen2 · i3 · 8GB · 256GB', 'price' => 524000.0, 'img' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => 'Samsung Galaxy Tab A8 10.5″ 64GB Wi‑Fi', 'price' => 459000.0, 'img' => 'https://images.unsplash.com/photo-1561154464-82e9adf32764?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => 'Logitech H390 USB headset', 'price' => 115000.0, 'img' => 'https://images.unsplash.com/photo-1599669454699-248893623440?w=400&h=400&fit=crop', 'sale' => true, 'old' => 135000.0],
            ],
            'desktop' => [
                ['name' => 'Dell E2216HV 22″ Full HD monitor', 'price' => 368000.0, 'img' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => 'HP 280 G4 SFF · i3-9th · 8GB · 256GB', 'price' => 390000.0, 'img' => 'https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => '2.5″ HDD external enclosure USB 3.0', 'price' => 30000.0, 'img' => 'https://images.unsplash.com/photo-1597872200969-2b65d56bd16b?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => 'Tower gaming case · tempered glass', 'price' => 185000.0, 'img' => 'https://images.unsplash.com/photo-1593640408182-31c70c8268f9?w=400&h=400&fit=crop', 'sale' => false],
            ],
            'printer' => [
                ['name' => 'HP LaserJet monochrome', 'price' => 485000.0, 'img' => 'https://images.unsplash.com/photo-1612815154858-60aa4faf483f?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => 'Ink tank color MFP', 'price' => 720000.0, 'img' => 'https://images.unsplash.com/photo-1585386959984-a41552231638?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => 'Epson EcoTank L-3150 · print / scan / copy', 'price' => 579900.0, 'img' => 'https://images.unsplash.com/photo-1612815154858-60aa4faf483f?w=400&h=400&fit=crop', 'sale' => false],
            ],
            'photocopy' => [
                ['name' => 'Office A3 monochrome MFP', 'price' => 2450000.0, 'img' => 'https://images.unsplash.com/photo-1612815154858-60aa4faf483f?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => 'Compact A4 copier · 35 ppm', 'price' => 1890000.0, 'img' => 'https://images.unsplash.com/photo-1585386959984-a41552231638?w=400&h=400&fit=crop', 'sale' => false],
            ],
            'scanner' => [
                ['name' => 'Flatbed document scanner · A4', 'price' => 420000.0, 'img' => 'https://images.unsplash.com/photo-1612815154858-60aa4faf483f?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => 'Sheet-fed duplex scanner', 'price' => 890000.0, 'img' => 'https://images.unsplash.com/photo-1585386959984-a41552231638?w=400&h=400&fit=crop', 'sale' => false],
            ],
            'network' => [
                ['name' => 'TP-Link Archer AX50', 'price' => 289000.0, 'img' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => 'USB‑C Gigabit adapter', 'price' => 45000.0, 'img' => 'https://images.unsplash.com/photo-1587825140708-dfaf72ae4b04?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => 'Mesh Wi‑Fi twin pack', 'price' => 520000.0, 'img' => 'https://images.unsplash.com/photo-1633265486064-086b219458ec?w=400&h=400&fit=crop', 'sale' => false],
            ],
            'security' => [
                ['name' => '4K CCTV bullet camera kit', 'price' => 650000.0, 'img' => 'https://images.unsplash.com/photo-1557597774-9d27365dfa49?w=400&h=400&fit=crop', 'sale' => false],
                ['name' => 'Kaspersky Small Office Security', 'price' => 95000.0, 'img' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=400&h=400&fit=crop', 'sale' => false],
            ],
            default => [],
        };
    }
}
