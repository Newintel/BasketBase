<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function home_teams(){
        return $this->belongsToMany(Team::class, 'games', 'id', 'home');
    }

    public function away_teams(){
        return $this->belongsToMany(Team::class, 'games', 'id', 'away');
    }
}
