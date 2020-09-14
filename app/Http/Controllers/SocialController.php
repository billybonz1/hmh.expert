<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function likePost(Request $request){
        
        $data = $request->all();
        $tableName = $data['model'];
        $className = 'App\\' . $tableName;
       
        if(class_exists($className)) {
            $model = new $className;
            $post = $model::where("id", $data['id'])->first();
            if($post->liked()){
                $post->unlike();
            } else {
                $post->like();
            }
            return 1;
        }else{
            return 0;
        }
    }
}
