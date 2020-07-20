<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class ExpertsCategory extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'parent_id'
    ];
    static public $rules = [
        'slug' => ['required', 'unique:experts_categories'],
        'title' => ['required'],
        'parent_id' => ['required', 'numeric'],
        'description' => ['max:500']
    ]; 
    
    static public $messages = [
        'slug' => [
            'required' => "Это поле обязательно для заполнения.",
            'unique' => "Категория с таким слагом уже существует."
        ],
        'title' => [
            'required' => 'Это поле обязательно для заполнения.'
        ]
    ];
    
    protected $guarded = ['id'];
    
    public function children(){
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    
    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function catUrl($cat){
        if($cat->parent_id == 0){
            return "/".$cat->slug;
        }else{
            $cat1 = self::where("id", $cat->parent_id)->first();
            return self::catUrl($cat1)."/".$cat->slug;
        }
    }

    public function url(){
        return "/experts".$this->catUrl($this);
    }
    
 
}
