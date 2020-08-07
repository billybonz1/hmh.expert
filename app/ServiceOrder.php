<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\User;

class ServiceOrder extends Model
{
	protected $fillable = [
        'user_id',
        'expert_id',
        'service_id',
        'quantity_type',
        'quantity',
        'created_at'
    ];
    public function service(){
    	return Service::where("id", $this->service_id)->first();
    }

    public function user(){
    	return User::where("id", $this->user_id)->first();
    }

    public function expert(){
    	return User::where("id", $this->expert_id)->first();
    }


    public function quantity(){
    	if($this->quantity_type == "1"){
    		return $this->quantity;
    	}else{
    		return $this->quantity;
    	}
    }

    public function totalPrice(){
    	return $this->quantity()*(int)$this->service()->price;
    }

    public function expertPrice(){
    	return $this->totalPrice()*$this->service()->procent/100;
    }
    public function platformPrice(){
    	return $this->totalPrice() - $this->expertPrice();
    }
}
