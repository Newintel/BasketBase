<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
