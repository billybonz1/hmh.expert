<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Message extends Model
{
    protected $fillable = [
        'message', 'from_id', 'to_id', 'chat_id'
    ];
    
    protected $dates = ['created_at'];
    
    public function getSenderAvatar(){
        return User::where("id", $this->from_id)->first()->avatar();
    }
    
    public function getSenderName(){
        return User::where("id", $this->from_id)->first()->namef();
    }
}
