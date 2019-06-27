<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\{Post, Category};
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PostTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;

    /** @test */
    public function AdminCanRetriveAllThePosts()
    {
        $this->actingAs(factory('App\User')->create()); 
        $category   =   factory(\App\Category::class)->create(); 
        $post       =   factory(\App\Post::class)->create(['category_id' => $category->id]); 
        $response   =   $this->get('/dashboard/post');
        
        $response->assertSee($post->title);
    }
    
    /** @test */
    public function AdminCanCreateSinglePost()
    {
        $this->actingAs(factory('App\User')->create()); 
        $category = factory(\App\Category::class)->create();
        $this->call('GET','/dashboard/category/create');

        $this->assertEquals(1,Category::all()->count());
    }
    
    /** @test */
    public function AdminCanCreateNewPost()
    {
        $this->actingAs(factory('App\User')->create());
        $category   =       factory(\App\Category::class)->create();
        $post       =       factory(\App\Post::class)->make(['category_id' => $category->id]);
        $response   =       $this->post('dashboard/post',$post->toArray());

        $this->assertEquals(1,Post::all()->count());
    }

    /** @test */
    public function AdminCanUpdateSinglePost()
    {
        $this->actingAs(factory('App\User')->create()); 
        $category       =       factory(\App\Category::class)->create();
        $post            =      factory(\App\Post::class)->create(['category_id' => $category->id]);
        $post->title     =      'Updated';
        $this->put('/dashboard/post/'.$post->id, $post->toArray());

        $this->assertDatabaseHas('posts',['id'=> $post->id , 'title' => 'Updated']);
    }

    /** @test */
    public function AdminCanDeleteSinglePost(){
        $this->actingAs(factory('App\User')->create());
        $category =     factory(\App\Category::class)->create();
        $post     =     factory(\App\Post::class)->create(['category_id' => $category->id]);
        $this->delete('/dashboard/post/'.$post->id);
        
        $this->assertDatabaseMissing('posts',['id'=> $post->id]);

    }
}
