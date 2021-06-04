<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function teams(){
        return $this->belongsToMany(Team::class, 'plays_in', 'player', 'team');
    }

    public function awards(){
        return $this->belongsToMany(Awards::class);
    }

    public function is_captain(){
        return $this->hasMany(AllStarTeam::class);
    }

    public function games_at_home(){
        return $this->belongsToMany(Game::class, 'games', 'home', 'id');
    }

    public function games_away(){
        return $this->belongsToMany(Game::class, 'games', 'away', 'id');
    }
}
