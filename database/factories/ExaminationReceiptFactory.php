<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExaminationReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "date" => $this->faker->date,
            "slaughter_date" => $this->faker->date,
            "Virtual_scan" => $this->faker->name,
            "type" => $this->faker->randomElement(['acceptable','Unacceptable']),
            "number_ear" => $this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            "notes" => $this->faker->name,
            "slaughterhouse" => $this->faker->name,
            "product_id" => Product::all()->random()->id,
            "quantity" => $this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
        ];
    }
}
