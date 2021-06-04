@extends('layouts.main')

@section('page_title')
    {{ $member->firstname." ".$member->lastname }}
@endsection

@section('content')
    @if ($player)
        <div id="player">
            <h2>As a player:</h2>
            <iframe src="{{ route('players.show', $player->id) }}" frameborder="0"></iframe>
        </div>
    @endif

    @if ($coach)
        <div id="coach">
            <h2>As a coach:</h2>
            <iframe src="{{ route('coaches.show', $coach->id) }}" frameborder="0"></iframe>
        </div>
    @endif
@endsection
