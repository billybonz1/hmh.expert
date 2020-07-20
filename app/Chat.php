<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    
    protected $fillable = [
        'name', 'type'
    ];
    public function users(){
        return $this->belongsToMany('App\User');
    }
    
    public function messages(){
        return $this->hasMany('App\Message', 'chat_id');
    }
    
    public function countUnreadMessages($id = ""){
        if(empty($id)){
            $id = Auth::user()->id;
        }
        return $this->messages()->whereIn("readed", [0, null])->where("to_id", $id)->count();
    }
    
    public function countMessages(){
        return $this->messages()->count();
    }
    
    public function hasUser($user_id){
        if($this->users()->where('user_id', $user_id)->first()){
            return true;
        }
        return false;
    }
    
    
    public function otherUser(){
        $users = $this->users()->get();
        foreach($users as $user){
            if($user->id !== Auth::user()->id){
                return $user;
            }
        }
    }
    
    
}
