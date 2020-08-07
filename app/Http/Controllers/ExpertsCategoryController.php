<?php

namespace App\Http\Controllers;

use App\Models\ExpertsCategory;
use App\Models\Role;
use App\User;
use App\Chat;
use App\Review;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class ExpertsCategoryController extends Controller
{

    public function category($slug, $slug2 = "")
    {
        $user_id = (int)$slug;
        $user = User::where("id", $user_id)->first();
        if($user){
            $chats = Chat::where("name", "expert".$user_id)->get();
            if(count($chats) > 0){
                // if(!$chats->first()->hasUser(Auth::user()->id)){
                //     $chats->first()->users()->sync([
                //         Auth::user()->id
                //     ]);
                // }
                $chat = $chats[0];
            }else{
                $chat = Chat::create([
                    "name" => "expert".$user_id,
                    "type" => "expert"
                ]);
                // $chat->users()->sync([
                //     Auth::user()->id
                // ]);
            }
            return view('expertsCategory.show', [
                'currentUser' => Auth::user(),
                'user' => $user,
                'pageTitle' => $user->namef(),
                "chat" => $chat,
                "messages" => $chat->messages()->orderBy("created_at", "desc")->take(15)->get()->sortBy("created_at")->values(),
                "reviews" => $user->reviews()->take(4)->get(),
                "services" => $user->services()->take(3)->get()
            ]);
        } else {
            if(!empty($slug2)){
                $slug = $slug2;
            }
            $currentCat = ExpertsCategory::where("slug", $slug)->first();
            if($currentCat === null){
                abort(404);
            }

            $experts = $currentCat->users()->get();


            return view('expertsCategory.index', [
                'experts' => $experts,
                'pageTitle' => $currentCat->title,
                'cat' => $currentCat
            ]);
        }
    }

    public function getServices(Request $request){
        // skip(10)
        $data = $request->all();
        $user = User::where("id", $data['expert_id'])->first();
        $services = $user->services()->skip($data["servicesCount"])->take(3)->get();
        foreach($services as $key=>$service){
            $services[$key]->url = $service->url();
            $services[$key]->thumb = $service->getThumbUrlAttribute();
            $services[$key]->prettyprice = $service->getPrice();
        }
        return json_encode($services);
    }
    
    
    public function getReviews(Request $request){
        $data = $request->all();
        $user = User::where("id", $data['expert_id'])->first();
        $reviews = $user->reviews()->skip($data["reviewsCount"])->take(4)->get();
        foreach($reviews as $key=>$review){
            $reviews[$key]->ratingProcent = $review->ratingProcent();
            $reviews[$key]->username = $review->getUserName();
        }
        return json_encode($reviews);
    }
    
    

    public function index(){

        $role = Role::where("slug", "expert")->first();
        $experts = $role->users()->get();
        return view('expertsCategory.index',[
            'experts' => $experts,
            'pageTitle' => 'Все эксперты'
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\ExpertsCategory  $expertsCategory
     * @return \Illuminate\Http\Response
     */
    //ajax прокрутка
    public function getMessages(Request $request)
    {

    }

    public function addReview(Request $request){
        $data = $request->all();
        $data['status'] = 0;
        $data['user_id'] = Auth::user()->id;
        $validator = Validator::make($data, [
            'text' => ['required'],
            'rating' => ['required'],
            'expert_id' => ['required']
        ]);
        if ($validator->fails()) {
            return 0;
        }else{
            Review::create($data);
            return 1;
        }
    }

    
    public function getServicePrice(Request $request){
        
        if($request->service == "videoCall"){
            $service_id = 5;
        }else if($request->service == "audioCall"){
            $service_id = 6;
        }
        
        
        $expert_price = DB::table('experts_services_prices')->where("service_id", $service_id)->where("expert_id", $request->id)->first();
        
        
        return $this->plural_form(
        	$expert_price->price,
        	/* варианты написания для количества 1, 2 и 5 */
        	array('клевер','клевера','клеверов')
        );
    }
    
    protected function plural_form($number, $after) {
    	$cases = array (2, 0, 1, 1, 1, 2);
    	return "<span>".$number.'</span> '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
    }
    
    
    
    
}
