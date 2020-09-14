<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TimeElapsedString;

class WallVideo extends Model
{
    use TimeElapsedString;
    use \Conner\Likeable\Likeable;
    protected $fillable = [
        'name',
        'desc',
        'file_name',
        'img',
        'duration',
        'user_id'
    ];
}
