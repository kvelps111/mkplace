<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    protected $model = School::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company(), // skolas nosaukums
            'region' => $this->faker->randomElement(['Kurzeme', 'Vidzeme', 'Latgale', 'Zemgale']),
            'municipality' => $this->faker->city(), // pašvaldība
            'type' => $this->faker->randomElement(['vidusskola', 'pamatskola', 'augstskola']),
            'address' => $this->faker->address(),
        ];
    }
}
