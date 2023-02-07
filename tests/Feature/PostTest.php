<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
 
class PostTest extends TestCase
{
    public function test_guest_routes_post()
    {
        $this->get('post/create')->assertRedirect('login');
        $this->post('post/store', [])->assertRedirect('login');
    }

    public function test_create_post()
    {
        $data = [
            'title' => 'Post Title **',
            'description' => 'This is the post description'
        ];
        
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/post/store',$data);

        $response->assertStatus(302)
                 ->assertSessionHas('success', 'Post created successfully');
    }

    public function test_post_title_required() 
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response =  $response = $this->post('/post/store',['description' => 'AA']);
        
        $response->assertSessionHasErrors(['title']);
    }

    public function test_post_description_required() 
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response =  $response = $this->post('/post/store',['title' => 'AA']);
        
        $response->assertSessionHasErrors(['description']);
    }
}
