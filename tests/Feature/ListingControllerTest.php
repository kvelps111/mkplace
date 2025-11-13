<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ListingPolicyTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function authenticated_user_can_access_create_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/listings/create');

        $response->assertStatus(200);
        $response->assertViewIs('listings.create');
    }

    #[Test]
    public function owner_can_delete_listing()
    {
        $user = User::factory()->create();
        $listing = Listing::factory()->for($user)->create();

        $this->actingAs($user);
        $response = $this->delete("/listings/{$listing->id}");

        $response->assertRedirect();
        $this->assertSoftDeleted('listings', ['id' => $listing->id]);
    }

    #[Test]
    public function non_owner_cannot_delete_listing()
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();
        $listing = Listing::factory()->for($owner)->create();

        $this->actingAs($other);
        $response = $this->delete("/listings/{$listing->id}");

        $response->assertForbidden();
        $this->assertDatabaseHas('listings', ['id' => $listing->id]);
    }
}
