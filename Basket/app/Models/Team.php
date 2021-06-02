<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function leagues(){
        return $this->belongsToMany(League::class, 'team_league', 'league', 'team');
    }

    public function players(){
        return $this->belongsToMany(Player::class);
    }

    public function coaches(){
        return $this->belongsToMany(Coach::class);
    }

    public function wins(){
        return $this->belongsToMany(League::class, 'wins', 'league', 'team');
    }
}
