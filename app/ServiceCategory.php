<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
   
    protected $fillable = [
        'title',
        'slug',
        'description',
        'parent_id'
    ];
    static public $rules = [
        'slug' => ['required', 'unique:service_categories'],
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

    public function checkParent($cat){
        if($cat->parent == null){
            return [];
        }else{
            return array_merge([$cat->parent->id], $this->checkParent($cat->parent));
        }
    }

    public function services(){
        return $this->belongsToMany('App\Models\Service');
    }

    public function parents(){
        return $this->checkParent($this);
    }
}
