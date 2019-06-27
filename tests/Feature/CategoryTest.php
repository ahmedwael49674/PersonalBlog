<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CategoryTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;

    /** @test */
    public function AdminCanRetriveAllTheCompanies()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create()); 

        //Given we have category in the database
        $category = factory(\App\Category::class)->create();
        //When user visit the categories page
        $response = $this->get('/dashboard/category');
        
        //He should be able to read the category
        $response->assertSee($category->title);
    }

    /** @test */
    public function AdminCanCreateNewCategory()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create());

        //Given we have category in the database
        $category = factory(\App\Category::class)->make();
        
        //It gets stored in the database//When user visit the categories page
        $response   =   $this->post('/dashboard/category',$category->toArray());

        //It gets stored in the database
        $this->assertEquals(1,Category::all()->count());
    }

    /** @test */
    public function AdminCanEditSingleCategory()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create()); 

        //Given we have category in the database
        $category = factory(\App\Category::class)->create();

        //When user visit the categories page
        $response = $this->get('/dashboard/category/'.$category->id.'/edit');
        // file_put_contents('test.html',$response->getContent());
        //He should be able to read the category
        $response->assertSee($category->email);
    }

    /** @test */
    public function AdminCanUpdateSingleCategory()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create()); 

        //Given we have category in the database
        $category            =   factory(\App\Category::class)->create();
        $category->title      =   'Updated';

        //When the user hit's the endpoint to update the category
        $this->put('/dashboard/category/'.$category->id, $category->toArray());

        //He should be able to read the category
        $this->assertDatabaseHas('categories',['id'=> $category->id , 'title' => 'Updated']);
    }

    /** @test */
    public function AdminCanDeleteSingleCategory(){

        //Given we have a signed in user
        $this->actingAs(factory('App\User')->create());

        //And a category which is created by the user
        $category = factory('App\Category')->create();

        //When the user hit's the endpoint to delete the category
        $this->delete('/dashboard/category/'.$category->id);

        //The category should be deleted from the database.
        $this->assertDatabaseMissing('categories',['id'=> $category->id]);

    }
}
