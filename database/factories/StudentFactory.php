<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

class StudentFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Student::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'middle_name' => $this->faker->word,
            'lastname' => $this->faker->lastName,
            'type' => $this->faker->word,
            'mobile' => $this->faker->word,
            'slug' => $this->faker->slug,
            'email' => $this->faker->safeEmail,
            'password' => bcrypt($this->faker->password),
        ];
    }
}
