<?php

namespace App;

use App\Models\ShippingAddress;
use App\Models\Traits\UserAdmin;
use App\Models\Traits\UserRoles;
use App\Models\Traits\UserHelper;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Field;
use App\Review;
use App\Models\Service;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes, UserHelper, UserRoles, UserAdmin;

    protected $appends = ['fullname'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'email',
        'gender',
        'cellphone',
        'image',
        'born_at',
        'logged_in_as',
        'security_level',
        'password',
        'session_token',
        'logged_in_at',
        'disabled_at',
        'status'
    ];

    /**
     * Validation rules for this model
     */
    static public $rules = [
        'firstname' => ['required', 'string', 'max:190'],
        'lastname'  => ['required', 'string', 'max:190'],
        //'gender'    => 'required|in:male,female',
        'cellphone' => ['nullable', 'string', 'max:190'],
        'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password'  => ['required', 'string', 'min:4', 'confirmed'],
        //'token'     => 'required|exists:user_invites,token',
        //'photo'     => 'required|image|max:6000|mimes:jpg,jpeg,png,bmp',
    ];

    static public $messages = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'deleted_by',
        'deleted_at',
        'logged_in_at',
        'disabled_at'
    ];

    protected $dates = ['email_verified_at', 'deleted_at', 'logged_in_at', 'activated_at'];

    /**
     * Validation rules for this model
     */
    static public $rulesClient = [
        'firstname' => ['required', 'string', 'max:190'],
        'lastname'  => ['required', 'string', 'max:190'],
        //'gender'    => 'required|in:male,female',
        'cellphone' => ['nullable', 'string', 'max:190'],
        'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password'  => ['required', 'string', 'min:4', 'confirmed'],
        'roles'     => ['required', 'array'],
    ];

    /**
     * Validation rules for this model
     */
    static public $rulesProfile = [
        'firstname' => 'required',
        'lastname'  => 'required',
        'gender'    => 'required|in:male,female',
        'telephone' => 'nullable|min:9',
        'password'  => 'nullable|min:4|confirmed',
        'photo'     => 'required|image|max:6000|mimes:jpg,jpeg,png,bmp',
    ];

    /**
     * Get the shippingAddress
     */
    public function shippingAddress()
    {
        return $this->hasOne(ShippingAddress::class, 'user_id', 'id')->whereNull('transaction_id');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\ExpertsCategory');
    }

    public function chats(){
        return $this->belongsToMany('App\Chat');
    }

    public function chatsWithUsers(){
        return $this->chats()->where("type", "user")->get();
    }

    public function chatsWithUsersNoEmpty(){
        return $this->chats()->where("type", "user")->whereHas("messages")->get();
    }

    public function unreadChats(){
        $count = 0;
        foreach($this->chatsWithUsersNoEmpty() as $chat){
            if($chat->countUnreadMessages($this->id) > 0){
                $count++;
            }
        }
        return $count;
    }


    public function hasAnyRoles($roles){
        if($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }
        return false;
    }

    public function avatar(){
        if(empty($this->avatar)){
            return "/public/img/male.jpg";
        }else{
            return "/public/images/avatars/".$this->avatar;
        }

    }

    public function namef(){
        if(!empty($this->lastname)){
            return $this->firstname." ".$this->lastname;
        }else{
            return $this->firstname;
        }
    }

    protected function plural_form($number, $after) {
    	$cases = array (2, 0, 1, 1, 1, 2);
    	return "<span>".$number.'</span> '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
    }


    public function prettyBalance(){
        return $this->plural_form(
        	$this->balance,
        	/* варианты написания для количества 1, 2 и 5 */
        	array('клевер','клевера','клеверов')
        );
    }


    public function fields(){
        return Field::orderBy("list_order")->get();
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'expert_id', 'id')->where("status", 1)->orderBy("created_at", "desc");
    }

    public function ratingProcent(){
        $procent = 0;
        foreach($this->reviews as $review){
            $procent += (int)$review->ratingProcent();
        }
        $procent = $procent/count($this->reviews);
        return $procent."%";
    }

    public function reviewsCountText(){
        return $this->plural_form(
            count($this->reviews),
            /* варианты написания для количества 1, 2 и 5 */
            array('отзыв','отзыва','отзывов')
        );
    }
    public function rating(){
        $rating = 0;
        foreach($this->reviews as $review){
            $rating+=(float)$review->rating;
        }
        $rating = $rating/count($this->reviews);
        return round($rating, 2);
    }

    public function posts(){
        return $this->hasMany('App\Post', 'author_id','id');
    }

    public function services(){
        return $this->hasMany('App\Models\Service', 'expert_id','id')->where("visible", "1");
    }

    public function servicesCount(){
        return $this->services()->count();
    }
    
    public function status(){
        if($this->status == "offline"){
            return '<div class="user-status st-grey active">Нет в сети</div>';
        }else{
            return "";
        }
    }
}
