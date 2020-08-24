<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use App\User;

use App\WallPost;

use Illuminate\Http\Request;

class UsersCategoryController extends Controller
{
    
    public function index($nickname){
        $user = User::where("nickname", $nickname)->first();
        if($user){
            return view("users.index")->with([
                "pageTitle" => $user->namef() . " - Стена",
                "user" => $user,
                "wallposts" => WallPost::take(8)->get(),
                "currentUser" => Auth::user()
            ]);
        }else{
            abort(404);
        }
    }
    
    
    public function addPost(Request $request){
        $data = $request->all();
        unset($data['_token']);
        $wallpost = WallPost::create($data);
        return json_encode($data);
    }
    
    public function photos($nickname){
        $user = User::where("nickname", $nickname)->first();
        if($user){
            return view("users.photos")->with([
                "pageTitle" => $user->namef() . " - стена",
                "user" => $user,
                "wallposts" => WallPost::take(8)->get(),
                "currentUser" => Auth::user()
            ]);
        }else{
            abort(404);
        }
    }
    
    public function videos($nickname){
        $user = User::where("nickname", $nickname)->first();
        if($user){
            return view("users.videos")->with([
                "pageTitle" => $user->namef() . " - стена",
                "user" => $user,
                "wallposts" => WallPost::take(8)->get(),
                "currentUser" => Auth::user()
            ]);
        }else{
            abort(404);
        }
    }
    
    
    public function likePost($nickname, WallPost $wallpost){
        $wallpost->like();
    }
    
}
