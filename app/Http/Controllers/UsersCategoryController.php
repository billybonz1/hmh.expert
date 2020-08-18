<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use App\User;

use Illuminate\Http\Request;

class UsersCategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index($nickname){
        $user = User::where("nickname", $nickname)->first();
        if($user){
            return view("users.index")->with([
                "user" => $user
            ]);
        }else{
            abort(404);
        }
    }
    
    
    public function addPost(Request $request){
        return json_encode($request->all());
    }
    
}
