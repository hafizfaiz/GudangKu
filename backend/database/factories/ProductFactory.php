<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $purchasePrice = $this->faker->randomFloat(2, 50000, 15000000);
        $margin = $this->faker->randomFloat(2, 1.05, 1.5);
        $sellingPrice = round($purchasePrice * $margin, -3); // bulatkan ke ribuan

        $stock = $this->faker->numberBetween(0, 500);
        $minimumStock = $this->faker->numberBetween(5, 50);

        return [
            'category_id'    => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'sku'            => strtoupper($this->faker->unique()->bothify('??-####-??')),
            'name'           => $this->faker->words(3, true),
            'description'    => $this->faker->paragraph(2),
            'purchase_price' => $purchasePrice,
            'selling_price'  => $sellingPrice,
            'stock'          => $stock,
            'minimum_stock'  => $minimumStock,
        ];
    }
}
