<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'name'=> $this->faker->name,
           'address'=> $this->faker->name,
           'user_id'=> User::all()->random()->id,
           'branch_id'=> Branch::all()->random()->id,
        ];
    }
}
