<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Categories::inRandomOrder()->first()?->id ?? Categories::factory(), // tạo hoặc chọn danh mục
            'name' => $this->faker->word(),
            'slug' => $this->faker->unique()->slug(),
            'description' => $this->faker->paragraphs(3, true),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'discount_price' => $this->faker->randomFloat(2, 5, 50),
            'discount_percent' => $this->faker->numberBetween(0, 100),
            'quantity' => $this->faker->numberBetween(10, 100),
            'img' => $this->faker->imageUrl(640, 480, 'products', true),
            'status' => $this->faker->boolean(90),
            'is_featured' => $this->faker->boolean(20),
            'views' => $this->faker->numberBetween(0, 1000),
            'sold' => $this->faker->numberBetween(0, 100),
        ];
    }
}
