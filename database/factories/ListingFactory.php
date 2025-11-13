<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\User;
use App\Models\School;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    protected $model = Listing::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 500), // cena ar 2 decimālām
            'user_id' => User::factory(),
            'school_id' => School::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
