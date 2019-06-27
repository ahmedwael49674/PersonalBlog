<?php

use Illuminate\Database\Seeder;
use App\{Post,Category};

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories   = Category::all();
      foreach($categories as $category){
        factory(App\Post::class,13)->create(['category_id' => $category->id]);
      }
    }
}
