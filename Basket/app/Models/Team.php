<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function players(){
        return $this->belongsToMany(Player::class);
    }

    public function coaches(){
        return $this->belongsToMany(Coach::class);
    }

    public function league_team(){
        return $this->hasOne(LeagueTeam::class);
    }

    public function all_star_team(){
        return $this->hasOne(AllStarTeam::class);
    }
}