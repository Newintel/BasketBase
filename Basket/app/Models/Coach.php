<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function teams(){
        return $this->belongsToMany(Team::class, 'coaches_in', 'coach', 'team')->withPivot('from_season', 'to_season');
    }
}
