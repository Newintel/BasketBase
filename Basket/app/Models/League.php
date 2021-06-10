<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    public function teams(){
        return $this->belongsToMany(Team::class, 'league_team', 'league', 'team');
    }

    public function winners(){
        return $this->belongsToMany(Team::class, 'wins', 'league', 'team')->withPivot('season');
    }
}
