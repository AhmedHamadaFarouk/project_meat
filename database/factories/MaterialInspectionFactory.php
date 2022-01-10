<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialInspectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date('Y-m-d'),
            'product_id' => Product::all()->random()->id,
            "dataProduction" => $this->faker->date('Y-m-d'),
            "dataFinished" => $this->faker->date('Y-m-d'),
            "Quantity" => $this->faker->randomElement([1, 2, 3, 4, 6, 8, 9, 7, 8]),
            "codeProduct" => $this->faker->randomElement([1, 2, 3, 4, 6, 8, 9, 7, 8]),
            "batchNumber" => $this->faker->randomElement([1, 2, 3, 4, 6, 8, 9, 7, 8]),
            'type' => $this->faker->randomElement(['acceptable','unacceptable']),
        ];
    }
}
