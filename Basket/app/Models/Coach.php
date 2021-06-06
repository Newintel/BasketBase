<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Coach extends Model
{
    use HasFactory;

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function teams(){
        return $this->belongsToMany(Team::class, 'coaches_in', 'coach', 'team')->withPivot('from_season', 'to_season');
    }

    public function wins(){
        return $wins = DB::table('coaches')
            ->join('members', 'coaches.member_id', '=', 'members.id')
            ->join('coaches_in', 'coaches.id', '=', 'coaches_in.coach')
            ->join('teams', 'coaches_in.team', '=', 'teams.id')
            ->join('league_team', 'league_team.team', '=', 'teams.id')
            ->join('leagues', 'league_team.league', '=', 'leagues.id')
            ->join('wins', 'wins.team', '=', 'teams.id')
            ->select('leagues.id as league', 'wins.season as season', 'teams.name as team')
            ->whereRaw('league_team.league = wins.league')
            ->whereRaw("coaches.id = $this->id")
            ->whereRaw('coaches_in.from_season <= wins.season')
            ->whereRaw('(coaches_in.to_season > wins.season or coaches_in.to_season is null)')
            ->get()->sortBy('season');
        ;
    }

    public function teams_in_order(){
        return DB::table('coaches')
            ->join('coaches_in', 'coaches.id', 'coaches_in.coach')
            ->join('teams', 'coaches_in.team', 'teams.id')
            ->join('league_team', 'league_team.team', 'teams.id')
            ->join('leagues', 'leagues.id', 'league_team.league')
            ->select('leagues.id as league', 'teams.name as team', 'teams.city as city', 'coaches_in.from_season as from', 'coaches_in.to_season as to')
            ->whereRaw("coaches.id = $this->id")
            ->orderBy('from')
            ->get();
    }
}
