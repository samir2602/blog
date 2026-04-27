<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;


class PostApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function test_can_get_all_posts()
    {
        $response = $this->getJson('/api/posts');
        $response->assertStatus(200);
    }

    public function test_can_create_post_with_auth()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
        ->postJson('/api/posts', [
            'title' => 'Test Post From php unit',
            'body' => 'This is a test body'
        ]);

        $response->assertStatus(201);
    }

    public function test_cannot_create_post_without_auth()
    {
        $response = $this->postJson('/api/posts', [
            'title' => 'test post',
            'body' => 'test post body',
        ]);

        $response->assertStatus(401);
    }

    public function test_cannnot_creat_post_without_title()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
            ->postJson('/api/posts', [
                'body' => 'This is a test post body'
        ]);

        $response->assertStatus(422);
    }

    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
