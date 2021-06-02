<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function players(){
        return $this->belongsToMany(Player::class);
    }

    public function coaches(){
        return $this->belongsToMany(Coach::class);
    }
}
