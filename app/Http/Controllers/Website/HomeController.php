<?php

namespace App\Http\Controllers\Website;

use App\Models\News;
use App\Models\Page;
use App\Models\ProductCategory;
// use App\User;
use App\Models\Role;

class HomeController extends WebsiteController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->showPageBanner = true;

        // $news = News::whereHas('photos')->with('photos')->isActiveDates()->orderBy('active_from', 'DESC')->get();
        
        $role = Role::where("slug", "expert")->first();
        $experts = $role->users()->get();
        
        return $this->view('home')->with([
            "experts" => $experts  
        ]);
    }
}
