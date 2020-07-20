<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class ModerateReviewsController extends AdminController
{

    public function index(){

        save_resource_url();

        return $this->view('moderateReviews.index1')->with('items', Review::all());

    }


    public function approve(Request $request){
        $review = Review::where("id", $request->review_id)->first();
        $review->status = 1;
        $review->save();

        return 1;
    }

    public function reject(Request $request){
        $review = Review::where("id", $request->review_id)->first();
        $review->status = 2;
        $review->save();

        return 1;
    }


}
