<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('indexes.players', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        $teams = $player->teams_in_order()->groupBy('league')->toArray();
        $awards = $player->member->awards->groupBy(fn($win) => $win->pivot->league);
        $wins = $player->wins()->groupBy('league');

        $leagues_id = array_unique(array_merge(array_keys($wins->toArray()), array_keys($awards->toArray())));
        sort($leagues_id);
        $leagues = array_map(fn($l)=>DB::table('leagues')->find($l)->shortname, $leagues_id);

        $member = $player->member;
        return view('show.member_show', compact('member', 'teams', 'wins', 'awards', 'leagues', 'leagues_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }
}
