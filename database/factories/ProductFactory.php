<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = fake()->words(3, true);

        return [
            'name' => $name,
            'slug' => Product::uniqueSlugFromName($name),
            'category' => fake()->optional(0.85)->randomElement(Product::categoryKeys()),
            'brand' => fake()->optional()->company(),
            'description' => fake()->optional()->paragraph(),
            'price' => fake()->randomFloat(2, 10000, 3_000_000),
            'compare_at_price' => null,
            'is_hot_sale' => false,
            'is_published' => true,
        ];
    }
}
