<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeagueTeam extends Model
{
    use HasFactory;

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function leagues(){
        return $this->belongsTo(League::class);
    }

    public function wins(){
        return $this->belongsToMany(League::class, 'wins', 'league', 'team');
    }
}
