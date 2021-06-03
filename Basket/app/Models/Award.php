<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    public function players(){
        return $this->belongsToMany(Player::class);
    }

    public function leagues(){
        return $this->belongsToMany(League::class);
    }
}
