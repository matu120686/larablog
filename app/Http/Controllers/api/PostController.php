<?php

namespace App\Http\Controllers\api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends ApiResponseController
{
    public function index()
    {
        $post = Post::        
        join('post_images','post_images.post_id','=','posts.id')->
        join('categories','categories.id','=','posts.category_id')->
        select('posts.*','categories.title as category','post_images.image')->
        //select('posts.title','posts.id','categories.title as category','post_images.image')->
        orderBy('posts.created_at','asc')->paginate(100);

        return $this->successResponse($post);


    }
    
    public function show(Post $post)
    {
        //$post->category();
        $post->image ;
        $post->category ;
        return $this->successResponse($post);
        
    }

    public function category(Category $category)
    {
        return $this->successResponse(["posts"=> $category->post()->paginate(10), "category" => $category]);
        
    }



   
    
}
