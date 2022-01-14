<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CleaningDisinfectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date'=> $this->faker->date,
            'product_id'=> Product::all()->random()->id,
            "Quantity"=> $this->faker->randomElement([1,2,3,4,6,8,9,7,8]),
            "codeProduct"=> $this->faker->randomElement([100,2,3,300,500,600,700]),
            "batchNumber"=> $this->faker->randomElement([600,200,300,800,600,600,700]),
            "dataProduction" => $this->faker->date('Y-m-d'),
            "dataFinished" => $this->faker->date('Y-m-d'),
            "PH" => $this->faker->randomElement([600,200,300,800,600,600,700]),
            "notes" => $this->faker->name,
        ];
    }
}
