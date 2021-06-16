<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Player extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['member_id', 'position', 'height', 'weight', 'gender', 'retired'];

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
            ->whereRaw('(plays_in.to_season is null or plays_in.to_season > wins.season or (plays_in.to_season = wins.season and not (plays_in.transfer = "end" or plays_in.transfer = "start,end")))')
            ->get()->sortBy('season');
    }

    public function teams_in_order(){
        return DB::table('players')
            ->join('plays_in', 'players.id', 'plays_in.player')
            ->join('teams', 'plays_in.team', 'teams.id')
            ->join('league_team', 'league_team.team', 'teams.id')
            ->join('leagues', 'leagues.id', 'league_team.league')
            ->select('leagues.id as league', 'teams.name as team', 'teams.city as city', 'plays_in.from_season as from', 'plays_in.to_season as to')
            ->whereRaw("players.id = $this->id")
            ->orderBy('from')
            ->get();
    }

    public function stats(){
        return DB::table('stats')
            ->join('players', 'players.id', '=', 'stats.player')
            ->select('stats.ppg as ppg', 'stats.rpg as rpg', 'stats.apg as apg', 'stats.season as season')
            ->orderBy('stats.season')
            ->get();
    }
}
