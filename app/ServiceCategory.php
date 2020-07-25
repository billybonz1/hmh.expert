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
    
    
    public function catUrl($cat){
        if($cat->parent_id == 0){
            return "/".$cat->slug;
        }else{
            $cat1 = self::where("id", $cat->parent_id)->first();
            return self::catUrl($cat1)."/".$cat->slug;
        }
    }
    
    public function url(){
        return "/services".$this->catUrl($this);
    }
    
    
    public function getBreadcrumbs($breadcrumbs, $cat){
        if($cat->parent_id == 0){
            $breadcrumbs[] = [
                "title" => $cat->title,
                "url" => $cat->url()
            ];
            return $breadcrumbs;
        }else{
            $cat1 = self::where("id", $cat->parent_id)->first();
            $breadcrumbs = $this->getBreadcrumbs($breadcrumbs, $cat1);
            $breadcrumbs[] = [
                "title" => $cat->title,
                "url" => $cat->url()
            ];
            return $breadcrumbs;
        }
    }
    
    public function breadcrumbs(){
        $breadcrumbs = [
            [
                "url" => "/",
                "title" => "HMH.EXPERT"
            ],
            [
                "title" => "Услуги экспертов",
                "url" => "/services",
            ]
        ];
        
        return $this->getBreadcrumbs($breadcrumbs, $this);
    }
    
    

    public function services(){
        return $this->belongsToMany('App\Models\Service')->where("visible", "1")->where("expert_id","!=","0");
    }

    public function parents(){
        return $this->checkParent($this);
    }
    
    public function isCurrent(){
        if(strpos(url()->current(), $this->slug) !== FALSE){
            return true;
        }else{
            return false;
        }
    }
}
