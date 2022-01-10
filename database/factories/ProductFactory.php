<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "date" => $this->faker->date,
            "quantity" => $this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            "order_number" => $this->faker->randomElement([10,20,30,40,50,60,70,80,90]),
            "number_product" => $this->faker->randomElement([10,20,30,40,50,60,70,80,90]),
            "date_supply" => $this->faker->date('Y-m-d'),
            "type" => $this->faker->randomElement(['identical','Not_matching']),
            "code" => $this->faker->name,
            "notes" => $this->faker->name,
        ];
    }
}
