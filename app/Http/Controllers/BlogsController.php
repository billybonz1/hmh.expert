<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Models\PostsCategory;

class BlogsController extends Controller
{
    public function index(){
        
       
        
        return view("blogs.index")->with([
            "pageTitle" => "Популярные блоги",
            "posts" => Post::where("active", 1)->paginate(8),
            "categories" => PostsCategory::with('children')->where("parent_id", 0)->get(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "title" => "Популярные блоги"
                ]
            ]
        ]);
    }
    
    
    
    public function render($url){
        $urlArr = explode("/", $url);
        $post = Post::where("slug", end($urlArr))->get();
        
        if(count($post) > 0){
            return view("blogs.post")->with([
                "pageTitle" => $post[0]->title,
                "post" => $post[0],
                "categories" => PostsCategory::with('children')->where("parent_id", 0)->get(),
                'breadcrumbs' => $post[0]->breadcrumbs()
            ]);
        }else{
            
            
            
            $cat = PostsCategory::where("slug", end($urlArr))->first();
            
            
            return view("blogs.cat")->with([
                "pageTitle" => $cat->title,
                "posts" => $cat->activePosts()->paginate(8),
                "categories" => PostsCategory::with('children')->where("parent_id", 0)->get(),
                "cat" => $cat,
                'breadcrumbs' => $cat->breadcrumbs()
            ]);
        }
    }
    
    
}
