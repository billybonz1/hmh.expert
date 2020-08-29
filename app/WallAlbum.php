<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WallAlbum extends Model
{
    
    protected $fillable = [
        'name',
        'user_id'
    ];
    public function photos(){
        return $this->hasMany("App\Models\WallPhoto", 'album_id');
    }
}
