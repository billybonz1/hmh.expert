<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use App\User;

use App\WallPost;

use App\WallPhoto;

use App\WallVideo;

use App\WallAlbum;

use Illuminate\Http\Request;

use Image;

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
        $albumsCount = 8;
        if(Auth::check()){
            $albumsCount = 7;
        }
        if($user){
            return view("users.photos")->with([
                "pageTitle" => $user->namef() . " - Фотографии",
                "user" => $user,
                "wallposts" => WallPost::take(8)->get(),
                "wallalbums" => WallAlbum::orderBy('created_at', 'desc')->paginate($albumsCount),
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
    
    public function addAlbum(Request $request){
        $data = $request->all();
        $files = $request->file('files');
        $arr = [];
        
        
        
        
        $this->validate($request, [
            'files' => 'required',
            'files.*' => 'mimes:jpg,jpeg,png'
        ]);
        
        
        
        $destinationPath = public_path('uploads/wall/'.Auth::user()->nickname);
        $time = time();
        
        
        $album = WallAlbum::create([
            'user_id' => Auth::user()->id,
            "name" => $data['album-name']
        ]);
        
        
        foreach($data['index'] as $key=>$index){
            
            
            $imageName = $time.".".$key.'.'.$files[$key]->getClientOriginalExtension();
            $imageNameWithoutExt = $time.".".$key;
            
            $files[$key]->move($destinationPath, $imageName);
            
            $resize_image = Image::make($destinationPath."/".$imageName);
            
            $resize_image->resize(100, null, function($constraint){
                $constraint->aspectRatio(); 
            })->save($destinationPath."/".$imageNameWithoutExt.".100.".$files[$key]->getClientOriginalExtension());
            
            $resize_image->resize(800, null, function($constraint){
                $constraint->aspectRatio(); 
            })->save($destinationPath."/".$imageNameWithoutExt.".800.".$files[$key]->getClientOriginalExtension());
            
            
            WallPhoto::create([
                "name" => $imageName,
                "desc" => $data['desc'][$key],
                "user_id" => Auth::user()->id,
                "album_id" => $album->id
            ]);
 
        }
        
    }
    
    public function videos($nickname){
        $user = User::where("nickname", $nickname)->first();
        if($user){
            return view("users.videos")->with([
                "pageTitle" => $user->namef() . " - Видео",
                "user" => $user,
                "wallvideos" => WallVideo::orderBy('created_at', 'DESC')->paginate(8),
                "currentUser" => Auth::user()
            ]);
        }else{
            abort(404);
        }
    }
    
    
    public function addVideo(Request $request){
        
        
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
            'video' => ['mimes:mp4,avi', 'max:250000']
        ]);
        
        $time = time();
        
        $video = $request->file('video');
        
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        unset($data['video']);
        $destinationPath = public_path('uploads/videos/'.Auth::user()->nickname);
        $videoName = $time.".".$video->getClientOriginalExtension();
        $videoNameWithoutExt = $time;
        $video->move($destinationPath, $videoName);
        
        $data['file_name'] = $videoName;
        
        
        $getID3 = new \getID3;
        $file = $getID3->analyze($destinationPath."/".$videoName);
        $duration = date('H:i:s', $file['playtime_seconds']);
        
        $data['duration'] = $duration;
        
        
        $imageName = $time.".png";
        Image::make($data['img'])->save($destinationPath."/".$imageName);
        
        $data['img'] = $imageName;
        
        $wallvideo = WallVideo::create($data);
        return $wallvideo;
    }
    
    
    public function likePost($nickname, WallPost $wallpost){
        if($wallpost->liked()){
            $wallpost->unlike();
        } else {
            $wallpost->like();
        }
    }
    
}
