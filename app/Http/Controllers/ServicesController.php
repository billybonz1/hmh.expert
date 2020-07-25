<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\ServiceCategory;
use Illuminate\Support\Facades\Auth;


class ServicesController extends Controller
{
    public function index(){
        return view("services.index")->with([
            "pageTitle" => "Услуги экспертов",
            "posts" => Service::where("visible", "1")->where("expert_id","!=","0")->paginate(8),
            "categories" => ServiceCategory::with('children')->where("parent_id", 0)->get(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "title" => "Услуги экспертов"
                ]
            ]
        ]);
    }
    
    
    public function render($url){
        $urlArr = explode("/", $url);
        $post = Service::where("slug", end($urlArr))->get();
        
        if(count($post) > 0){
            return view("services.post")->with([
                "pageTitle" => $post[0]->name,
                "post" => $post[0],
                "categories" => ServiceCategory::with('children')->where("parent_id", 0)->get(),
                'breadcrumbs' => $post[0]->breadcrumbs(),
                'currentUser' => Auth::user()
            ]);
        }else{
            
            
            
            $cat = ServiceCategory::where("slug", end($urlArr))->first();
            
            
            return view("services.cat")->with([
                "pageTitle" => $cat->title,
                "posts" => $cat->services()->paginate(8),
                "categories" => ServiceCategory::with('children')->where("parent_id", 0)->get(),
                "cat" => $cat,
                'breadcrumbs' => $cat->breadcrumbs()
            ]);
        }
    }
    
    
    
}