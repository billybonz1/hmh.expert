<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\ImageThumb;

class Service extends Model
{
    use ImageThumb;

    protected $table = 'services';

    protected $guarded = ['id'];

    public static $LARGE_SIZE = [1920, 600];

    public static $THUMB_SIZE = [330, 190];

    public static $IMAGE_SIZE = ['o' => [1920, 600], 'tn' => [330, 190]];


    static public $rules = [
        'name'  => 'required|min:3:max:255',
        'slug' => 'required',
        'desc'  => 'required',
        'shortdesc'  => 'required|max:500',
        'saleinfo'  => 'required|max:500',
        'price'  => 'required|numeric',
        'expert_id'  => 'required|numeric',
        'visible'  => 'required|numeric',
        'image'       => 'required|image|max:6000|mimes:jpg,jpeg,png,bmp',
    ];

    protected $fillable = [
        'name',
        'slug',
        'shortdesc',
        'desc',
        'saleinfo',
        'price',
        'visible',
        'new',
        'image',
        'status',
        'expert_id',
        'procent'
    ];


    public function categories(){
        return $this->belongsToMany('App\ServiceCategory');
    }

    public function reasons(){
        return $this->hasMany("App\ServiceReason", 'service_id');
    }
    protected function plural_form($number, $after) {
        $cases = array (2, 0, 1, 1, 1, 2);
        return "<span>".$number.'</span> '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
    }

    public function getPrice(){
        return $this->plural_form(
            $this->price,
            /* варианты написания для количества 1, 2 и 5 */
            array('клевер','клевера','клеверов')
        );
    }

    public function author(){
        return User::where("id", $this->expert_id)->first();
    }

    public function url(){
        if(count($this->categories)>0){
            return $this->categories[count($this->categories) - 1]->url()."/".$this->slug;
        }
    }
    
    
    public function breadcrumbs(){
        if(count($this->categories)>0){
            $breadcrumbs =  $this->categories[count($this->categories) - 1]->breadcrumbs();
            $breadcrumbs[] = [
                "title" => $this->name
            ];
            return $breadcrumbs;
        }
        return [];
    }
    
}
