<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Post;
use App\Models\User;

class ResponseTest extends TestCase
{
    public function test_guest_routes_response()
    {
        $this->get('/post/response/1')->assertRedirect('login');
        $this->post('/post/response/1', [])->assertRedirect('login');
    }

    public function test_create_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $this->actingAs($user);

        $data = [
            'response_text' => 'Response post example',
        ];
        
        $response = $this->post("/post/response/{$post->id}", $data);
        $response->assertStatus(201);
    }

    public function test_response_text_required() 
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response =  $response = $this->post('/post/response/1',[]);
        
        $response->assertSessionHasErrors(['response_text']);
    }
}
