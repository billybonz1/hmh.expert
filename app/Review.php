<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Review extends Model
{
    protected $fillable = [
        'text',
        'rating',
        'expert_id',
        'user_id',
        'status'
    ];

    public function getUser(){
        $user = User::where("id", $this->user_id)->first();
        return '<a href="/user/'.$user->id.'" target="_blank">'.$user->namef().'</a>';
    }

    public function getUserName(){
        return User::where("id", $this->user_id)->first()->namef();
    }

    public function getExpert(){
        $user = User::where("id", $this->expert_id)->first();
        return '<a href="/experts/'.$user->id.'" target="_blank">'.$user->namef().'</a>';
    }

    public function getStatus(){
        if($this->status == 0){
            return "Требует модерации";
        }else if($this->status == 2){
            return "Отклонён";
        }else{
            return "Подтверждён";
        }
    }

    public function ratingProcent(){
        $procent = $this->rating*100/5;
        return $procent."%";
    }


}
