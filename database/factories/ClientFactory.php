<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
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
            "phone" => $this->faker->randomElement([100, 200, 300, 400, 500, 600, 700, 800]),
            "address" => $this->faker->name,
            "max_price" => $this->faker->randomElement([100,200,300,400,500,600,700,800]),
            "notes" => $this->faker->name,
        ];
    }
}
