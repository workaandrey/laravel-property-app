<?php

namespace Tests\Feature;

use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertySearchTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Property::create([
            'name' => 'The Victoria',
            'price' => 374662,
            'bedrooms' => 4,
            'bathrooms' => 2,
            'storeys' => 2,
            'garages' => 2,
        ]);

        Property::create([
            'name' => 'The Xavier',
            'price' => 513268,
            'bedrooms' => 4,
            'bathrooms' => 2,
            'storeys' => 1,
            'garages' => 2,
        ]);
    }

    public function test_can_search_properties_by_name(): void
    {
        $response = $this->getJson('/api/properties/search?name=victoria');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['name' => 'The Victoria']);
    }

    public function test_can_search_properties_by_price_range(): void
    {
        $response = $this->getJson('/api/properties/search?price_from=400000&price_to=600000');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['name' => 'The Xavier']);
    }

    public function test_validates_price_range(): void
    {
        $response = $this->getJson('/api/properties/search?price_from=600000&price_to=400000');

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['price_to']);
    }

    public function test_can_search_by_multiple_criteria(): void
    {
        $response = $this->getJson('/api/properties/search?bedrooms=4&storeys=2');

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['name' => 'The Victoria']);
    }

    public function test_returns_empty_array_when_no_matches(): void
    {
        $response = $this->getJson('/api/properties/search?bedrooms=5');

        $response->assertStatus(200)
            ->assertJsonCount(0);
    }
} 
