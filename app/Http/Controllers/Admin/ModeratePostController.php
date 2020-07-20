<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\User;
use App\Reason;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;

class ModeratePostController extends AdminController
{
    public function index(){
        save_resource_url();
        $posts = Post::orderByDesc('new')->paginate(8);
        return $this->view("moderatePost.index")->with([
            "posts" => $posts
        ]);
    }
    
    
    public function show($id){
        
        $post = Post::where("id", $id)->first();
    
        return $this->view("moderatePost.show")->with([
            "post" => $post
        ]);
    }
    
    public function post(Request $request){
        $post = Post::where("id", $request->post_id)->first();
        $post->new = 1;
        $post->active = 0;
        $data = $request->all();
        $post->save();
        $reason = Reason::where("post_id", $data['post_id'])->first();
        if(is_object($reason)){
            $reason->text = $request->text;
            $reason->save();
        }else{
            Reason::create($data);
        }
        
        
        return redirect()->route("moderatepost");
    }
    
    public function postaccept(Request $request){
        $post = Post::where("id", $request->post_id)->first();
        $post->new = 0;
        $post->active = 1;
        foreach($post->reasons as $reason){
            $reason->delete();
        }
        $post->save();
        return redirect()->route("moderatepost");
    }
}
