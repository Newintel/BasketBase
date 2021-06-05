<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Player extends Model
{
    use HasFactory;

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function teams(){
        return $this->belongsToMany(Team::class, 'plays_in', 'player', 'team')->withPivot('from_season', 'to_season', 'transfer');
    }

    public function is_captain(){
        return $this->hasMany(AllStarTeam::class);
    }

    public function games_at_home(){
        return $this->belongsToMany(Game::class, 'games', 'home', 'id');
    }

    public function games_away(){
        return $this->belongsToMany(Game::class, 'games', 'away', 'id');
    }

    public function wins(){
        return DB::table('players')
            ->join('members', 'players.member_id', '=', 'members.id')
            ->join('plays_in', 'players.id', '=', 'plays_in.player')
            ->join('teams', 'plays_in.team', '=', 'teams.id')
            ->join('league_team', 'league_team.team', '=', 'teams.id')
            ->join('leagues', 'league_team.league', '=', 'leagues.id')
            ->join('wins', 'wins.team', '=', 'teams.id')
            ->select('leagues.id as league', 'wins.season as season', 'teams.name as team')
            ->whereRaw('league_team.league = wins.league')
            ->whereRaw("players.id = $this->id")
            ->whereRaw('plays_in.from_season <= wins.season')
            ->whereRaw('plays_in.to_season >= wins.season')
            ->get()->sortBy('season');
    }
}
