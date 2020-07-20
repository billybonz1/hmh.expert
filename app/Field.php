<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Field extends Model
{
    protected $fillable = [
        'type', 'slug', 'name'
    ];

    static public $rules = [
        'name' => ['required', 'string', 'max:190'],
        'slug'  => ['required', 'string', 'max:190', 'unique:fields'],
        'type' => ['required', 'string', 'max:190']
    ];

    static public $messages = [
        'slug' => [
            'required' => "Это поле обязательно для заполнения.",
            'unique' => "Поле с таким слагом уже существует."
        ],
        'name' => [
            'required' => 'Это поле обязательно для заполнения.'
        ],
        'type' => [
            'required' => 'Это поле обязательно для заполнения.'
        ]

    ];

    public function getValue($user_id){
        $value = DB::table("fields_values")->where("user_id", $user_id)->where("field_id", $this->id)->first();
        if($value){
            return $value->value;
        }else{
            return "";
        }
    }

    public function setValue($value, $user_id){
        if($this->getValue($user_id) == "" && !empty($value)){
            DB::table("fields_values")->insert([
                "field_id" => $this->id,
                "user_id" => $user_id,
                "value" => $value,
            ]);
        } else {
            DB::table("fields_values")
                ->where('user_id', $user_id)
                ->where('field_id', $this->id)
                ->update(['value' => $value]);
        }
    }
}
