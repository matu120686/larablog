<?php

use App\Category;
use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        $categories = Category::all();

        foreach ($categories as $key => $category) {
            
            for ($i=1; $i <=2 ; $i++) { 
                Post::create([
                    'title' => "Post numero nº $i $key",
                    'url_clean' => "post-$i - $key",
                    'content' => "Contenido del Post $i $key",
                    'posted' => "yes",
                    'category_id' => $category->id
                    
                ]);
            }
        }

       
    }
}
