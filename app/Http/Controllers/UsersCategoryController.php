<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use App\User;

use App\WallPost;

use App\WallPhoto;

use Illuminate\Http\Request;

class UsersCategoryController extends Controller
{
    
    public function index($nickname){
        $user = User::where("nickname", $nickname)->first();
        if($user){
            return view("users.index")->with([
                "pageTitle" => $user->namef() . " - Стена",
                "user" => $user,
                "wallposts" => WallPost::take(8)->orderBy('created_at', 'DESC')->get(),
                "currentUser" => Auth::user()
            ]);
        }else{
            abort(404);
        }
    }
    
    
    public function addPost(Request $request){
        $data = $request->all();
        unset($data['_token']);
        $data['author_id'] = Auth::user()->id;
        $wallpost = WallPost::create($data);
        return json_encode($data);
    }
    
    
   
    
    public function photos($nickname){
        $user = User::where("nickname", $nickname)->first();
        if($user){
            return view("users.photos")->with([
                "pageTitle" => $user->namef() . " - Фотографии",
                "user" => $user,
                "wallposts" => WallPost::take(8)->get(),
                "currentUser" => Auth::user()
            ]);
        }else{
            abort(404);
        }
    }
    
    public function addPhoto(Request $request){
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        
    }
    
    public function videos($nickname){
        $user = User::where("nickname", $nickname)->first();
        if($user){
            return view("users.videos")->with([
                "pageTitle" => $user->namef() . " - Видео",
                "user" => $user,
                "wallposts" => WallPost::take(8)->orderBy('created_at', 'ASC')->get(),
                "currentUser" => Auth::user()
            ]);
        }else{
            abort(404);
        }
    }
    
    
    public function likePost($nickname, WallPost $wallpost){
        if($wallpost->liked()){
            $wallpost->unlike();
        } else {
            $wallpost->like();
        }
    }
    
}
