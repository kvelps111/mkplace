<?php

namespace Database\Factories;

use App\Models\ListingPhoto;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingPhotoFactory extends Factory
{
    protected $model = ListingPhoto::class;

    public function definition()
    {
        return [
            'listing_id' => Listing::factory(), // saistīts ar sludinājumu
            'photo' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'), // testa bildes URL
        ];
    }
}
