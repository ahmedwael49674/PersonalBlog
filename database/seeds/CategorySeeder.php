<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = ['Culture','Business','Politics','Opinion','Science','Health','Style','Travel'];

      foreach($categories as $category){
        Category::create([
          'title' => $category,
        ]);
      }
    }
}
