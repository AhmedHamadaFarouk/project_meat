<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Store;
use App\Models\Supplier;
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
            "number_ear" => $this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            "meat_temp" => $this->faker->name,
            "meat_color" => $this->faker->randomElement(['acceptable','Unacceptable']),
            "meat_smell" => $this->faker->randomElement(['acceptable','Unacceptable']),
            "meat_texture" => $this->faker->randomElement(['acceptable','Unacceptable']),
            "store_id" => Store::all()->random()->id,
            "supplier_id" =>Supplier::all()->random()->id,
            "product_id" => Product::all()->random()->id,
            "quantity" => $this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            "notes" => $this->faker->name,

        ];
    }
}
