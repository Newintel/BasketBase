<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    public function members(){
        return $this->belongsToMany(Member::class, 'wins_award', 'award', 'member')->withPivot('season');
    }

    public function leagues(){
        return $this->belongsToMany(League::class, 'wins_award', 'award', 'league')->withPivot('season');
    }
}
