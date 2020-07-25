<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

class UsersCategoryController extends Controller
{

    public function index(){
        return view("users.index");
    }

}
