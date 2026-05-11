<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_admin_products(): void
    {
        $this->get(route('admin.products.index'))->assertRedirect(route('login'));
    }

    public function test_non_admin_cannot_access_admin_products(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $this->actingAs($user)
            ->get(route('admin.products.index'))
            ->assertForbidden();
    }

    public function test_admin_can_create_product_with_images(): void
    {
        Storage::fake('public');

        $admin = User::factory()->admin()->create();

        $image = UploadedFile::fake()->image('item.jpg', 400, 400);

        $this->actingAs($admin)
            ->post(route('admin.products.store'), [
                'name' => 'Test Laptop',
                'category' => 'laptop',
                'brand' => 'HP',
                'description' => 'A test product.',
                'price' => '1250000.00',
                'is_hot_sale' => '1',
                'is_published' => '1',
                'images' => [$image],
            ])
            ->assertRedirect(route('admin.products.index'));

        $this->assertDatabaseHas('products', [
            'name' => 'Test Laptop',
            'category' => 'laptop',
            'brand' => 'HP',
            'is_hot_sale' => true,
            'is_published' => true,
        ]);

        $product = Product::query()->where('name', 'Test Laptop')->first();
        $this->assertNotNull($product);
        $this->assertSame(1, $product->images()->count());
        Storage::disk('public')->assertExists($product->images->first()->path);
    }
}
