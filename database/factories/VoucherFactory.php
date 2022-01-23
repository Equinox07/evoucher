<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Voucher;

class VoucherFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Voucher::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'serial_no' => $this->faker->word,
            'voucher_code' => $this->faker->word,
            'sold_out' => $this->faker->randomNumber(),
            'deleted_at' => $this->faker->dateTime(),
        ];
    }
}
