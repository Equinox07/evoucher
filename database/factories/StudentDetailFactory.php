<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StudentDetail;

class StudentDetailFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = StudentDetail::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'student_id' => $this->faker->randomNumber(),
            'school_id' => $this->faker->randomNumber(),
            'location' => $this->faker->word,
            'name_of_guardian' => $this->faker->word,
            'course' => $this->faker->word,
            'image' => $this->faker->word,
            'grades' => $this->faker->text,
        ];
    }
}
