<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use App\User;

class UsersCategoryController extends Controller
{

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

}
