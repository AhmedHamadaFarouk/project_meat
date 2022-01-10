<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BankFactory extends Factory
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
            "price" => $this->faker->randomElement([100, 200, 300, 400, 500, 600]),
            "number_bank" => $this->faker->randomElement([122121, 3000, 400, 500, 600, 700]),
            "notes" => $this->faker->name,
        ];
    }
}
