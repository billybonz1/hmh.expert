<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TimeElapsedString;

class WallPhoto extends Model
{
    use TimeElapsedString;
    
    protected $fillable = [
        "name",
        "desc",
        "album_id",
        "user_id"
    ];
}
