<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;
use App\Post;
use App\Models\ExpertsCategory;
use App\Models\PostsCategory;
use App\ServiceCategory;
use App\Chat;
use App\Message;
use App\Field;
use App\Models\Service;
use App\ServiceOrder;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Image;
use App\Http\Controllers\Traits\UploadImageHelper;
use App\Http\Controllers\Admin\AdminController;
use File;
use Intervention\Image\ImageManager;

class ProfileController extends AdminController
{
    use UploadImageHelper;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('profile.index')->with([
            'pageTitle' => "Общие настройки",
            'currentUser' => Auth::user(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "title" => "Общие настройки"
                ]
            ]
        ]);
    }
    
    public function personal(){
        return view('profile.personal')->with([
            'pageTitle' => "Личные данные",
            'currentUser' => Auth::user(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "title" => "Личные данные"
                ]
            ]
        ]);    
    }
    
    
    
    
    public function update(Request $request){

        $data = $request->all();
        $currentUser = Auth::user();

        $rules = [
            'firstname' => ['required'],
            'lastname' => ['required']
        ];
        
        if(isset($data['email']) && !empty($data['email']) && $currentUser->email != $data['email']){
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
        }
        
        if(isset($data['nickname']) && !empty($data['nickname']) && $currentUser->nickname != $data['nickname']){
            $rules['nickname'] = ['required', 'string', 'max:255', 'unique:users'];
        }


        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect('profile')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            if(isset($data['firstname']) && !empty($data['firstname'])){
                $currentUser->firstname = $data['firstname'];
            }
            if(isset($data['lastname']) && !empty($data['lastname'])){
                $currentUser->lastname = $data['lastname'];
            }
            if(isset($data['email']) && !empty($data['email'])){
                $currentUser->email = $data['email'];
            }
            if(isset($data['nickname']) && !empty($data['nickname'])){
                $currentUser->nickname = $data['nickname'];
            }
 
            $currentUser->save();

            return redirect("profile")->with([
                'success' => 'Данные успешно обновлены'
            ]);
        }

    }
    
    
    public function personalUpdate(Request $request){
        $data = $request->all();
        $currentUser = Auth::user();
        
        
        $rules = [
            'born_at' => ['required', 'date'],
            'country' => ['required']
        ];
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->fails()) {
            return redirect('profile')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            if(isset($data['born_at'])){
                $currentUser->born_at = $data['born_at'];
            }
            if(isset($data['country'])){
                $currentUser->country = $data['country'];
            }
            if(isset($data['city'])){
                $currentUser->city = $data['city'];
            }
            if(isset($data['cellphone'])){
                $currentUser->cellphone = $data['cellphone'];
            }
            if(isset($data['skype'])){
                $currentUser->skype = $data['skype'];
            }
            if(isset($data['vk'])){
                $currentUser->vk = $data['vk'];
            }
            if(isset($data['od'])){
                $currentUser->od = $data['od'];
            }
            if(isset($data['fb'])){
                $currentUser->fb = $data['fb'];
            }
            $currentUser->save();


            $fields = [];
            foreach($data as $key=>$item){
                if(strpos($key, "field") !== FALSE){
                    $fields[str_replace("field-", "", $key)] = $item;
                }
            }

            foreach($fields as $key=>$field){
                $fieldObj = Field::where("slug", $key)->first();
                $fieldObj->setValue($field, $currentUser->id);
            }
            return redirect("profile/personal")->with([
                'success' => 'Данные успешно обновлены'
            ]);
        }
        
    }
    
    public function password(){
        return view('profile.password')->with([
            'pageTitle' => "Сменить пароль",
            'currentUser' => Auth::user(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "title" => "Сменить пароль"
                ]
            ]
        ]);
    }
    public function passwordUpdate(Request $request){
        $data = $request->all();
        $currentUser = Auth::user();

        $validator = Validator::make($data, [
            'current-password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if (Hash::check($data['current-password'], $currentUser->password)) {
            if($validator->fails()){
                return redirect()->route('profile.password')
                        ->withErrors($validator);
            }else{
                $currentUser->fill([
                    'password' => Hash::make($data['password'])
                ])->save();
                $request->session()->flash('success', 'Пароли успешно изменены');
                return redirect()->route('profile.password');
            }




        } else {
            $request->session()->flash('error', 'Старый пароль неправильный');
            return redirect()->route('profile.password');
        }
    }
    public function avatarUpdate(Request $request){
        // $currentUser = Auth::user();
        // $data = $request->all();
        // $image = request()->avatar;
        // // $destinationPath = storage_path('app/public/avatars');
        // $time = time();
        // $imageName = $time.'.'.$image->getClientOriginalExtension();
        // // $path = public_path('storage/avatars/' . $imageName);
        // Storage::disk("public")->putFileAs(
        //     'avatars', $image, $imageName
        // );
        // $crop_image = Image::make($destinationPath."/".$imageName);


        // $path = $request->file('avatar')->store("public/avatars");

        // $imageName = last(explode("/", $path));
        
        // $manager = new ImageManager(array('driver' => 'imagick'));
        // $image = $manager->make(str_replace("public", "storage", $path))->resize(100, 100);
        
        // $crop_image = Image::make();

        // echo $destinationPath."/".$imageName;


        $currentUser = Auth::user();
        $data = $request->all();
        $image = request()->avatar;
        $time = time();
        $imageName = $time.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images/avatars');
        $image->move($destinationPath, $imageName);
        $crop_image = Image::make($destinationPath."/".$imageName);
        $resize_image226x196 = $crop_image;
        $resize_image = $crop_image;
        $crop_image->crop($data['width'], $data['height'], $data['x'], $data['y'])->encode('png', 100)->trim()->save($destinationPath."/".$imageName);

        // $resize_image = Image::make($destinationPath."/".$imageName);

        $resize_image->resize(225, 225, function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath."/".$imageName);


        
        // $imageName226x196 = $time.'.226x196.'.$image->getClientOriginalExtension();
        // $resize_image226x196->resize(226, 196)->save($destinationPath."/".$imageName226x196);
        
        // $avatar = $currentUser->avatar;
        // if(!empty($avatar)){
        //     unlink($destinationPath."/".$avatar);
        // }
        $currentUser->avatar = $imageName;
        $currentUser->save();

        // // echo "/".str_replace("public", "storage", $path);
        // // return 1;
        echo "/images/avatars/".$imageName;
    }


    public function blog(){
        return view("profile.blog")->with([
            'pageTitle' => "Мой блог",
            'currentUser' => Auth::user(),
            'posts' => Auth::user()->posts,
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "title" => "Мой блог"
                ]
            ]
        ]);
    }
    public function blogshow($id){
        $post = Post::where('id', $id)->first();
        if($post->author_id != Auth::user()->id){
            return response('Unauthorized.', 401);
        }
        return view("profile.blogshow")->with([
            'post' => $post,
            'categories' => PostsCategory::where("parent_id", 0)->get(),
            'currentUser' => Auth::user(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "title" => "Мой блог",
                    "url" => "/profile/blog"
                ],
                [
                    "title" => $post->title
                ]
            ]
        ]);
    }
    public function postCreate(){
        return view("profile.postCreate")->with([
            'pageTitle' => "Создать пост в блоге",
            'currentUser' => Auth::user(),
            'categories' => PostsCategory::where("parent_id", 0)->get(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "url" => "/profile/blog",
                    "title" => "Мой блог"
                ],
                [
                    "title" => "Добавить пост"
                ]
            ]
        ]);
    }
    public function postStore(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => ['required'],
            'category' => ['required'],
            'slug' => ['required'],
            'content' => ['required'],
            'img' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
        if ($validator->fails()) {
            return redirect()->route('profile.postCreate')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $image = request()->img;
            $time = time();
            $imageName = $time.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $imageName);
            $data['img'] = "/public/images/".$imageName;
            $resize_image = Image::make($destinationPath."/".$imageName);

            $resize_image->resize(338, 196, function($constraint){
              $constraint->aspectRatio();
             })->save($destinationPath . '/' . $time.'.338x196.'.$image->getClientOriginalExtension());


            unset($data['category']);
            $post = Post::create($data);

            $cat = PostsCategory::where("id", $request->category)->first();

            $post->categories()->sync(array_merge([$cat->id], $cat->parents()));

            $request->session()->flash('success', 'Добавлен новый пост');

            return redirect()->route('profile.blog');
        }
    }
    public function postUpdate(Request $request){
        $post = Post::where('id', $request->post_id)->first();
        if($post->author_id != Auth::user()->id){
            return response('Unauthorized.', 401);
        }

        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => ['required'],
            'category' => ['required'],
            'slug' => ['required'],
            'content' => ['required'],
            'img' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return redirect("/profile/blog/".$data['post_id'])
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $oldImage = $post->img;
            $oldImageArr = explode("/", $oldImage);
            $oldImageName = $oldImageArr[count($oldImageArr) - 1];
            $post->title = $data['title'];
            $post->slug = $data['slug'];
            $post->content = $data['content'];
            if(request()->img){
                $image = request()->img;
               
                $time = time();
                $imageName = $time.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('images');
                $image->move($destinationPath, $imageName);
                $post->img = "/public/images/".$imageName;
                $resize_image = Image::make($destinationPath."/".$imageName);
                $resize_image->resize(338, 196, function($constraint){
                  $constraint->aspectRatio();
                })->save($destinationPath . '/' . $time.'.338x196.'.$image->getClientOriginalExtension());
            }
            $post->new = $data['new'];
            $post->active = 0;
            $cat = PostsCategory::where("id", $request->category)->first();
            $post->categories()->sync(array_merge([$cat->id], $cat->parents()));
            $post->save();
            if(request()->img){
                File::delete(public_path('images')."/".$oldImageName);
                File::delete(public_path('images')."/".str_replace(".", ".338x196.", $oldImageName));
            }
            foreach($post->reasons as $reason){
                $reason->delete();
            }

            $request->session()->flash('success', 'Пост успешно изменен');

            return redirect()->route('profile.blog');
        }

        return redirect()->route('profile.blog');
    }


    public function expert(){
        $categories = ExpertsCategory::with('children')->where("parent_id", 0)->get();
        return view('profile.expert')->with([
            'pageTitle' => "Настройки эксперта",
            'currentUser' => Auth::user(),
            'categories' => $categories,
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "title" => "Настройки эксперта"
                ]
            ]
        ]);
    }
    public function expertUpdate(Request $request){

        $currentUser = Auth::user();

        $currentUser->categories()->sync($request->categories);

        if($request->about){
            $currentUser->about = $request->about;
        }
        if($request->consulting_themes){
            $currentUser->consulting_themes = $request->consulting_themes;
        }
        if($request->post){
            $currentUser->post = $request->post;
        }
        if($request->exp){
            $currentUser->exp = $request->exp;
        }

        if($currentUser->save()){
            $request->session()->flash('success', 'Настройки обновлены');
        } else {
            $request->session()->flash('error', 'Произошла ошибка обновления');
        }





        return redirect()->route('profile.expert');
    }


    public function messages($url = ""){
        $data = [
            'pageTitle' => "Сообщения",
            'currentUser' => Auth::user(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "title" => "Сообщения"
                ]
            ]
        ];

        $chats = Auth::user()->chatsWithUsersNoEmpty();

        if(!empty($url)){
            preg_match_all('!\d+!', $url, $matches);
            if(isset($matches[0][0])){
                $user = User::where("id", $matches[0][0])->first();
                if($user !== null && $user->id !== Auth::user()->id){

                    $hasChat = 0;


                    foreach(Auth::user()->chatsWithUsers() as $chat){
                        if($chat->hasUser($user->id)){
                            $hasChat = 1;
                            if(count($chat->messages) == 0){
                                $chats[] = $chat;
                            }
                        }
                    }

                    if($hasChat == 0){
                        $chat = Chat::create([
                            "name" => "users".Auth::user()->id."-".$user->id,
                            "type" => "user"
                        ]);

                        $chat->users()->sync([
                            Auth::user()->id,
                            $user->id
                        ]);

                        $chats[] = $chat;
                    }



                }

            }
        }

        $data['chats'] = $chats;


        return view('profile.messages')->with($data);
    }
    public function getMessages(Request $request){
        $chat = Chat::where("id", $request->chatid)->first();

        if($chat->hasUser(Auth::user()->id)){
            if(isset($request->offset)){
                return json_encode($chat->messages()->orderBy("created_at", "desc")->skip($request->offset)->take(15)->get());
            }else{
                return json_encode($chat->messages()->orderBy("created_at", "desc")->take(15)->get()->sortBy("created_at")->values());
            }
        }else{
            return [];
        }
    }
    public function sendMessage(Request $request){
        $message = Message::create($request->all());
        $currentUser = Auth::user();
        return json_encode([
            "id" => $message->id,
            "message" => $message->message,
            "from_id" => $message->from_id,
            "to_id" => $message->to_id,
            "chat_id" => $message->chat_id,
            "readed" => 0,
            "created_at" => $message->created_at,
            "chat_count" => Chat::where("id", $message->chat_id)->first()->countMessages(),
            "sender" => [
                "namef" => $currentUser->namef(),
                "avatar" => $currentUser->avatar(),
                "url" => "/profile/messages/user".$currentUser->id,
                "id" => $currentUser->id
            ],
            "unread_chats" => User::where("id", $message->to_id)->first()->unreadChats()
        ]);
    }
    public function readMessages(Request $request){
        $messagesReadedIDs = explode(",", $request->messagesReadedIDs);
        foreach($messagesReadedIDs as $id){
            $message = Message::where("id", $id)->first();
            $message->readed = 1;
            $message->save();
        }
        return 1;
    }

    public function sendGroupMessage(Request $request){
        $currentUser = Auth::user();
        if($currentUser->groups_messages > 0 || $currentUser->hasRole("expert")){
            $message = Message::create($request->all());
            $chat = Chat::where("id", $message->chat_id)->first();
            if(!$chat->hasUser($currentUser->id)){
                $chat->users()->sync([
                    $currentUser->id
                ]);
            }
            if(!$currentUser->hasRole("expert")){
                $currentUser->groups_messages--;
            }
            $currentUser->save();

            return json_encode([
                "id" => $message->id,
                "message" => $message->message,
                "from_id" => $message->from_id,
                "to_id" => 0,
                "chat_id" => $message->chat_id,
                "readed" => 1,
                "created_at" => $message->created_at,
                "chat_count" => Chat::where("id", $message->chat_id)->first()->countMessages(),
                "sender" => [
                    "namef" => $currentUser->namef(),
                    "avatar" => $currentUser->avatar(),
                    "url" => "/profile/messages/user".$currentUser->id,
                    "id" => Auth::user()->id
                ]
            ]);
        } else {
            return 0;
        }

    }
    
    public function sendServiceMessage(Request $request){
        
    }
    
    
    

    public function balance(){
        $data = [
            'pageTitle' => "Баланс",
            'currentUser' => Auth::user(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "title" => "Баланс"
                ]
            ]
        ];
        return view('profile.balance')->with($data);
    }
    public function updateBalance(Request $request){


        $data = $request->all();
        $currentUser = Auth::user();
        $rules = [
            'balance' => ['required']
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect('profile/balance')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $currentUser->balance += (float)$data['balance'];
            $currentUser->save();
            return redirect("profile/balance")->with([
                'success' => 'Ваш баланс успешно пополнен'
            ]);
        }
    }
    public function pay(Request $request){
        $currentUser = Auth::user();

        if($request->expert_id){
            $currentUser->balance = $currentUser->balance - (int)$request->price;
            $currentUser->save();

            return redirect('profile/messages/user'.$request->expert_id);
        }else if($request->action && $request->action == "buy3messages"){
            $currentUser->balance = $currentUser->balance - 299;
            $currentUser->groups_messages += 3;
            $currentUser->save();
            return Redirect::back();
        }else if($request->action == "buyService"){
            $data = $request->all();
            $service = Service::where("id", $data['service_id'])->first();
            $expert = User::where("id", $service->expert_id)->first();
            $serviceOrder = ServiceOrder::create([
                'user_id' => $currentUser->id,
                'expert_id' => $service->expert_id,
                'service_id' => $service->id,
                'quantity_type' => "0",
                'quantity' => "1"
            ]);
            if($serviceOrder){
                $currentUser->balance = (int)$currentUser->balance - (int)$service->price;
                $currentUser->save();
                $expert->balance = (int)$expert->balance + $serviceOrder->expertPrice();
                $expert->save();
                return json_encode(["Вы успешно оплатили услугу. Ожидайте, с Вами скоро свяжется эксперт и уточнит все детали.", $currentUser->prettyBalance()]);
            }else{
                return json_encode(["Ошибка оплаты, попробуйте пожалуйста позже"]);
            }
        } else if($request->service){
            $data = $request->all();
            
            if($request->service == "videoCall"){
                $service_id = 5;
            }else if($request->service == "audioCall"){
                $service_id = 6;
            }
            $expert_price = DB::table('experts_services_prices')->where("service_id", $service_id)->where("expert_id", $request->id)->first();
            
            
            $data['price'] = (int)$expert_price->price*(int)$request->minutes_q;
            if($currentUser->balance>=$data['price']){
                $serviceOrder = ServiceOrder::create([
                    'user_id' => $currentUser->id,
                    'expert_id' => $request->id,
                    'service_id' => $service_id,
                    'quantity_type' => "1",
                    'quantity' => (int)$request->minutes_q
                ]);
                $currentUser->balance -= $data['price'];
                $currentUser->save();
                $data['balance'] = $currentUser->prettyBalance();
                
                $chat = Chat::where("name", $request->service.$currentUser->id."-".$request->id)->first();
                
                if($chat){
                    $data['messages'] = $chat->messages()->orderBy("created_at", "desc")->take(15)->get();
                } else {
                    $chat = Chat::create([
                        "name" => $request->service.$currentUser->id."-".$request->id,
                        "type" => "service"
                    ]);
                }
                
                $data["chat_id"] = $chat->id;
                
                
                return json_encode($data);
            }else{
                return "На Вашем балансе недостаточно средств для оплаты услуги. Перейдите на <a href='/profile/balance'>страницу баланса</a>";
            }
            
            
        }
    }
    
    

    public function services(){
        $services = Service::where("expert_id",Auth::user()->id)->get();
        $data = [
            'pageTitle' => "Мои услуги",
            'currentUser' => Auth::user(),
            'posts' => $services,
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "title" => "Мои услуги"
                ]
            ]
        ];
        return view('profile.services')->with($data);
    }
    public function serviceshow($id){
        $post = Service::where('id', $id)->first();
        if($post->expert_id != Auth::user()->id){
            return response('Unauthorized.', 401);
        }
        return view("profile.serviceshow")->with([
            'post' => $post,
            'categories' => ServiceCategory::where("parent_id", 0)->get(),
            'currentUser' => Auth::user(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "title" => "Мои услуги",
                    "url" => "/profile/blog"
                ],
                [
                    "title" => $post->title
                ]
            ]
        ]);
    }
    public function serviceCreate(){
        return view("profile.serviceCreate")->with([
            'pageTitle' => "Создать услугу",
            'currentUser' => Auth::user(),
            'categories' => ServiceCategory::where("parent_id", 0)->get(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "url" => "/profile/blog",
                    "title" => "Мой блог"
                ],
                [
                    "title" => "Добавить пост"
                ]
            ]
        ]);
    }
    public function serviceStore(Request $request){
        $attributes = request()->validate(Service::$rules);
        $photo = $this->uploadImage($attributes['image'], Service::$IMAGE_SIZE);
        $category = $request->category;
        if ($photo) {
            $attributes['image'] = $photo;
        }
        $attributes['new'] = 1;
        $service = Service::create($attributes);

        $cat = ServiceCategory::where("id", $category)->first();


        $service->categories()->sync(array_merge([$cat->id], $cat->parents()));

        $request->session()->flash('success', 'Добавлен новый пост');

        return redirect()->route('profile.services');
    }
    public function serviceUpdate(Request $request){
        $post = Service::where('id', $request->service_id)->first();
        if($post->expert_id != Auth::user()->id){
            return response('Unauthorized.', 401);
        }
        $rules = Service::$rules;
        $rules['image'] = 'image|max:6000|mimes:jpg,jpeg,png,bmp';
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
        $attributes['new'] = "1";
        

        $post->update($attributes);

        $category = $request->category;
        $cat = ServiceCategory::where("id", $category)->first();
        $post->categories()->sync(array_merge([$cat->id], $cat->parents()));


        foreach($post->reasons as $reason){
            $reason->delete();
        }

        $request->session()->flash('success', 'Пост успешно изменен');

        return redirect()->route('profile.services');
    }
    
    
    public function orders(){
        return view("profile.orders")->with([
            'pageTitle' => "Мои заказы",
            'currentUser' => Auth::user(),
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "url" => "/profile",
                    "title" => "Аккаунт"
                ],
                [
                    "title" => "Мои покупки"
                ]
            ],
            'orders' => ServiceOrder::where("user_id", Auth::user()->id)->orderBy("created_at", "desc")->paginate(10) 
        ]);
    }
    
    public function likePost(Request $request){
        $post = Post::where("id", $request->postid)->first();
        $post->like();
        return $post->likeCount;
    }
    
    public function addToFavourite(Request $request){
        $user = User::where("id", $request->userid)->first();
        if($user->isFavorited()){
            $user->removeFavorite();
        }else{
            $user->addFavorite();
        }
        
    }
    
    
    public function removeFavourite(Request $request){
        $user = User::where("id", $request->id)->first();
        $user->removeFavorite();
    }
}
