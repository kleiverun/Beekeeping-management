<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterApiaryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test that a user can create a new apiary with only latitude and longitude
     */
    public function test_new_apiary_with_only_latitude_and_longitude(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user); // Authenticate the user
        $data = [
            'name' => $this->faker->word,
            'latitude' => 123.456,
            'longitude' => 78.901,
        ];

        $response = $this->post(route('ApiaryController.store'), $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('apiaries', $data);
    }
    /**
     * Test that a user can create a new apiary with only an address
     */
    public function test_new_apiary_with_address()
    {
        $user = User::factory()->create();

        $this->actingAs($user); // Authenticate the user
        $data = [
            'name' => $this->faker->word,
            'address' => $this->faker->address,
        ];

        $response = $this->post(route('ApiaryController.store'), $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('apiaries', $data);
    }
    /**
     * Test that a user can create a new apiary with an address, latitude, and longitude
     */
    public function test_new_apiary_with_address_latitude_longitude()
    {
        $user = User::factory()->create();

        $this->actingAs($user); // Authenticate the user
        $data = [
            'name' => $this->faker->word,
            'address' => $this->faker->address,
            'latitude' => 123.456,
            'longitude' => 78.901,
        ];

        $response = $this->post(route('ApiaryController.store'), $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas('apiaries', $data);
    }
}
