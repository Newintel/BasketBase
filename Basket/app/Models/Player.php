<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function teams(){
        return $this->belongsToMany(Team::class);
    }

    public function awards(){
        return $this->belongsToMany(Awards::class);
    }

    public function is_captain(){
        return $this->hasMany(AllStarTeam::class);
    }
}
