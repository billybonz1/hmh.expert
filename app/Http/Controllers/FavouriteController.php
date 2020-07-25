<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class FavouriteController extends Controller
{
    public function index(){
        return view("favourite.index")->with([
            'pageTitle' => "Избранное",
            'currentUser' => Auth::user(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "title" => "Избранное"
                ]
            ],
            'experts' => User::whereHas('roles', function($q){
                            $q->where('name', '=', 'Expert');
                        })->get()
        ]);
    }
    
}