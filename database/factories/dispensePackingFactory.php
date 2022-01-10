<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class dispensePackingFactory extends Factory
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
            "supplydate" => $this->faker->date('Y-m-d'),
            "workordernumber" => $this->faker->name,
            "type" => $this->faker->randomElement(['acceptable','unacceptable']),
            "product_id" => Product::all()->random()->id,
            "Quantity"=> $this->faker->randomElement([1,2,3,4,6,8,9,7,8]),
            "codeProduct"=> $this->faker->randomElement([100,2,3,300,500,600,700]),
            "batchNumber"=> $this->faker->randomElement([600,200,300,800,600,600,700]),
            "notes"=> $this->faker->name,
        ];
    }
}
