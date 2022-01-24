<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $name = $this->faker->firstName;
        return [
            'firstname' =>  $name,
            'middle_name' => $this->faker->word,
            'lastname' => $this->faker->lastName,
            'type' => $this->faker->word,
            'mobile' => $this->faker->phoneNumber,
            'slug' => Str::slug($name),
            'email' => $this->faker->safeEmail,
            'password' => bcrypt($this->faker->password),
        ];
    }
}
