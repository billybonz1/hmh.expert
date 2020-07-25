<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\PostsCategory;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use Commentable;
    protected $guarded = [];
    protected $dates = ['created_at'];
   
    
    public function categories(){
        return $this->belongsToMany('App\Models\PostsCategory');
    }
    
    public function reasons(){
        return $this->hasMany("App\Reason", 'post_id');
    }
    
    public function author(){
        return User::where("id", $this->author_id)->first();
    }
    
    public function short_desc(){
        return mb_substr(strip_tags($this->content), 0, 95)."...";
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
                "title" => $this->title
            ];
            return $breadcrumbs;
        }
        return [];
    }
    
    
    
    public function thumb(){
        return str_replace(".",".338x196.",$this->img);
    }
    
    
    
    
}
