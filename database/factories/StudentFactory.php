<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'          => $this->faker->name(),
            'nim'           => $this->faker->unique()->numerify('###########'),
            'department_id' => Department::inRandomOrder()->first()->id ?? 1,
        ];
    }
}