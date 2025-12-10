<?php

namespace Tests\Feature;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_movies()
    {
        Movie::create(['title' => 'Test Movie', 'description' => 'Test Desc']);

        $response = $this->getJson('/api/movies');

        $response->assertStatus(200)
            ->assertJsonCount(1);
    }

    public function test_can_create_movie()
    {
        $response = $this->postJson('/api/movies', [
            'title' => 'New Movie',
            'description' => 'Desc',
        ]);

        $response->assertStatus(201)
            ->assertJson(['success' => true]);
            
        $this->assertDatabaseHas('movies', ['title' => 'New Movie']);
    }

    public function test_can_update_movie()
    {
        $movie = Movie::create(['title' => 'Old Title', 'description' => 'Desc']);

        $response = $this->putJson("/api/movies/{$movie->id}", [
            'title' => 'New Title',
            'description' => 'Desc',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('movies', ['title' => 'New Title']);
    }

    public function test_can_delete_movie()
    {
        $movie = Movie::create(['title' => 'To Delete', 'description' => 'Desc']);

        $response = $this->deleteJson("/api/movies/{$movie->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('movies', ['id' => $movie->id]);
    }
}
