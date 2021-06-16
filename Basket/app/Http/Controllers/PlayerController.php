<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;
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
    public function create($coach = false)
    {
        return view('modify.editPlayer', compact('coach'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {
        $data = $request->all();
        if ($data['retired'] == 0){
            $data['retired'] = null;
        };
        Player::create($data);
        $coach = $data['coach'];
        return redirect('/');
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
        $is_player = true;
        return view('show.member_show', compact('member', 'teams', 'wins', 'awards', 'leagues', 'leagues_id', 'is_player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        return view('modify.editPlayer', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerRequest $request, Player $player)
    {
        $data = $request->all();
        $data['retired'] = array_key_exists('retired', $data);
        $player->update($data);
        return back()->with('info', 'Member data was modified');
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
