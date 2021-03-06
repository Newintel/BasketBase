<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllStarTeam extends Model
{
    use HasFactory;
    

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function captain(){
        return $this->belongsTo(Player::class);
    }
}
