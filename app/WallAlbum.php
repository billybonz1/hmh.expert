<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TimeElapsedString;

class WallAlbum extends Model
{
    use TimeElapsedString;
    
    protected $fillable = [
        'name',
        'user_id'
    ];
    public function photos(){
        return $this->hasMany("App\WallPhoto", 'album_id');
    }
}
