<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravelista\Comments\Comment;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class ModerateCommentsController extends AdminController
{
    
    public function index(){
        
        $comments = Comment::all();
        
        return $this->view("moderateComments.index")->with([
            "comments" => $comments
        ]);
    }
    
    
    public function approve(Comment $comment){
        $comment->approved = 1;
        $comment->save();
        
        return Redirect::to(URL::previous());
    }
    
  
}
