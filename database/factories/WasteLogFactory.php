<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class WasteLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "date" => $this->faker->date('Y-m-d'),
            "Quantity" => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 8, 9]),
            "name_company" => $this->faker->name,
            "notes" => $this->faker->name,
            "product_id" => Product::all()->random()->id,
            "type" => $this->faker->randomElement(['organic', 'non_organic']),
        ];
    }
}
