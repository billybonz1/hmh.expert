<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class FavouriteController extends Controller
{
    public function index(){
        $experts = [];
        $data = Auth::user()->allFavorites()->paginate(8);
        foreach($data as $expert){
            $experts[] = $expert->favoriteable()->first();
        }
        
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
            'experts' => $experts,
            'pagination' => $data->links()
        ]);
    }
    
}