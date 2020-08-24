<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WallPost extends Model
{
    use \Conner\Likeable\Likeable;
    
    protected $fillable = [
        "type",
        "text",
        "author_id"
    ];
    
    
    public function author(){
        return $this->belongsTo('App\User', 'author_id');
    }
    
    
    protected function plural_form($number, $after) {
        $cases = array (2, 0, 1, 1, 1, 2);
        return "<span>".$number.'</span> '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
    }
    
    protected function plural_form_no_number($number, $after) {
        $cases = array (2, 0, 1, 1, 1, 2);
        return $after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
    }
    
    public function likeHTML(){
        $likesObjs = $this->likes()->take(5)->get();
        $users_ids = [];
        foreach($likesObjs as $obj){
            $users_ids[] = $obj->user_id;
        }
        $users = User::whereIn("id",$users_ids);
        $html = '<ul class="friends-harmonic">';
        
        $counter = 0;
        $usersArr = [];
        foreach($users->get() as $user){
            $html .= '<li>
                <a href="'.route('users_wall', $user->nickname).'">
                    <img src="'.$user->avatar().'" alt="'.$user->nickname.'">
    			</a>
			</li>';
			$counter++;
			if($counter < 3){
			    if(!empty($user->firstname)){
			        $name = $user->firstname;
			    }else{
			        $name = $user->nickname;
			    }
			    $usersArr[] = '<a href="'.route('users_wall', $name).'">'.$name.'</a>';
			}
        }
        $html .= '</ul>';
        
        $countLikes = $this->likeCount - $counter;
        $html .= '<div class="names-people-likes">';
		$html .= implode(", ", $usersArr);
		if($countLikes > 0){
		    $html .= ', а также еще<br>'.$this->plural_form($countLikes, ['пользователь лайкнул эту запись', 'пользователя лайкнули эту запись', 'пользователей лайкнули эту запись']);
		}else{
		    $html .= ' '.$this->plural_form_no_number($this->likeCount, ['лайкнул эту запись', 'лайкнули эту запись', 'лайкнули эту запись']);
		}
		
		$html .= '</div>';

        
        return $html;
    }
}
