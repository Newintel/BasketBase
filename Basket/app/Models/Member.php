<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Member extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['firstname', 'lastname', 'origin', 'active', 'dead', 'hof'];

    public function player(){
        return $this->hasOne(Player::class);
    }

    public function coach(){
        return $this->hasOne(Coach::class);
    }

    public function awards(){
        return $this->belongsToMany(Award::class, 'wins_award', 'member', 'award')->withPivot('season', 'league');
    }

    public function wins(){
        $wins = 0;
        if ($this->player){
            $wins += count($this->player->wins());
        }
        if ($this->coach){
            $wins += count($this->coach->wins());
        }
        return $wins;
    }

    public static function getMemberByName($firstname, $lastname){
        return DB::table('members')
            ->where('firstname', '=', $firstname)
            ->where('lastname', '=', $lastname)
            ->get()->toArray()[0];
    }
}
