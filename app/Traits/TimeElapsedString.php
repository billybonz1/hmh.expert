<?php
namespace App\Traits;
use Illuminate\Http\Request;
    
trait TimeElapsedString {
  
    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function timeElapsedString($full = false) {
        $now = new \DateTime();
        $ago = new \DateTime($this->created_at);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
                        'y' => 'г.',
                        'm' => 'мес.',
                        'w' => 'нед.',
                        'd' => 'д.',
                        'h' => 'ч.',
                        'i' => 'мин.',
                        's' => 'сек.');
        foreach ($string as $k => &$v) {
            if ($diff->$k) 
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            else
                unset($string[$k]);
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' назад' : 'сейчас';
    }
  
}