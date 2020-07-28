<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\ServiceCategory;
use App\User;
use App\ServiceReason;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\UploadImageHelper;
use File;
use Illuminate\Support\Facades\DB;

class ModerateServiceController extends AdminController
{
    use UploadImageHelper;

    public function index(){
        save_resource_url();
        $posts = Service::orderByDesc('new')->where("expert_id", '!=', 0)->paginate(8);
        return $this->view("moderateService.index")->with([
            "posts" => $posts,
            "services" => Service::where("expert_id", '=', 0)->get()
        ]);
    }


    public function show($id){

        $post = Service::where("id", $id)->first();

        return $this->view("moderateService.show")->with([
            "post" => $post
        ]);
    }

    public function post(Request $request){
        $post = Service::where("id", $request->service_id)->first();
        $post->new = 1;
        $post->visible = 0;
        $data = $request->all();
        $post->save();
        $reason = ServiceReason::where("service_id", $data['service_id'])->first();
        if(is_object($reason)){
            $reason->text = $request->text;
            $reason->save();
        }else{
            ServiceReason::create($data);
        }


        return redirect()->route("moderateservices");
    }

    public function postaccept(Request $request){
        $post = Service::where("id", $request->service_id)->first();
        $post->new = 0;
        $post->visible = 1;
        foreach($post->reasons as $reason){
            $reason->delete();
        }
        $post->save();
        return redirect()->route("moderateservices");
    }

    public function edit($id, Request $request){
        $post = Service::where("id", $id)->first();
        return $this->view("moderateService.edit")->with([
            "post" => $post,
            "experts" => User::whereHas('roles', function($q){
                $q->where('name', '=', 'Expert');
            })->get(),
            'categories' => ServiceCategory::where("parent_id", 0)->get(),
        ]);
    }
    
    
    public function editall($id, Request $request){
        $post = Service::where("id", $id)->first();
        $experts = User::whereHas('roles', function($q){
            $q->where('name', '=', 'Expert');
        })->get();
        
        
        foreach($experts as $index=>$expert){
            $expert_price = DB::table('experts_services_prices')->where("service_id", $post->id)->where("expert_id", $expert->id)->first();
            if($expert_price){
                $experts[$index]->price = $expert_price->price;
                $experts[$index]->procent = $expert_price->procent;
            }
        }
        
        return $this->view("moderateService.editall")->with([
            "post" => $post,
            "experts" => $experts,
            'categories' => ServiceCategory::where("parent_id", 0)->get(),
        ]);
    }
    
    

    public function create(){
        return $this->view("moderateService.create")->with([
            "experts" => User::whereHas('roles', function($q){
                $q->where('name', '=', 'Expert');
            })->get(),
            'categories' => ServiceCategory::where("parent_id", 0)->get(),
        ]);

    } 

    public function update($id, Request $request){
        $post = Service::where("id", $id)->first();
        $rules = Service::$rules;
        $rules['image'] = 'image|max:6000|mimes:jpg,jpeg,png,bmp';
        
        
        if(isset($request->editall)){
            unset($rules['price']);
            unset($rules['procent']);
            
            
            foreach($request->experts as $index=>$expert_id){
                $expert_price = DB::table('experts_services_prices')->where("service_id", $id)->where("expert_id", $expert_id)->first();
                if($expert_price){
                    if($request->price[$index] !== null && $request->procent[$index] !== null){
                        DB::table('experts_services_prices')->where("service_id", $id)->where("expert_id", $expert_id)->update([
                            "price" => $request->price[$index],
                            "procent" => $request->procent[$index]
                        ]);
                    }
                }else{
                    if($request->price[$index] !== null && $request->procent[$index] !== null){
                        DB::table('experts_services_prices')->insert([
                            "expert_id" => $expert_id,
                            "service_id" => $id,
                            "price" => $request->price[$index],
                            "procent" => $request->procent[$index]
                        ]);
                    }
                    
                }
            }
            
            
            
        }else{
            $rules['procent'] = "required|max:100|numeric";
        }
        
        $attributes = request()->validate($rules);
        if(isset($attributes['image'])){
            File::delete(public_path("uploads/images")."/".$post->getThumbAttribute());
            File::delete(public_path("uploads/images")."/".$post->image_original);
            File::delete(public_path("uploads/images")."/".$post->image);
            $photo = $this->uploadImage($attributes['image'], Service::$IMAGE_SIZE);
            if ($photo) {
                $attributes['image'] = $photo;
            }
        }

        $attributes['new'] = 0;

        $post->update($attributes);

        $category = $request->category;
        if(!empty($category)){
            $cat = ServiceCategory::where("id", $category)->first();
            $post->categories()->sync(array_merge([$cat->id], $cat->parents()));
        }
        
        
        
        

        $request->session()->flash('success', 'Услуга успешно изменена');

        return redirect()->route('moderateservices');
    }

    public function store(Request $request){
        $rules = Service::$rules;
        $rules['procent'] = "required|max:100|numeric";
        unset($rules['expert_id']);
        $attributes = request()->validate($rules);
        $photo = $this->uploadImage($attributes['image'], Service::$IMAGE_SIZE);
        
        if ($photo) {
            $attributes['image'] = $photo;
        }
        $attributes['new'] = 0;
        $data = $request->all();
        if($data['expert_id'] == null){
            $attributes['expert_id'] = 0;
        }

    
        $service = Service::create($attributes);

        if(isset($request->category)){
            $category = $request->category;
            $cat = ServiceCategory::where("id", $category)->first();
            $service->categories()->sync(array_merge([$cat->id], $cat->parents()));
        }
        
        $request->session()->flash('success', 'Добавлена новая услуга');

        return redirect()->route('moderateservices');
    }
}
