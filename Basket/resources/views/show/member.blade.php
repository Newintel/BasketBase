@extends('layouts.main')

@section('page_title')
    {{ $member->firstname." ".$member->lastname }}
@endsection

@section('style')
    @php
        $style = ['member'];
    @endphp
@endsection

@section('content')
    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-member-tab" data-bs-toggle="tab" data-bs-target="#nav-member" type="button" role="tab" aria-controls="nav-member" aria-selected="true">Member</button>
            @if ($player)
                <button class="nav-link" id="nav-player-tab" data-bs-toggle="tab" data-bs-target="#nav-player" type="button" role="tab" aria-controls="nav-player" aria-selected="true">Player</button>
            @endif
            @if ($coach)
                <button class="nav-link" id="nav-coach-tab" data-bs-toggle="tab" data-bs-target="#nav-coach" type="button" role="tab" aria-controls="nav-coach" aria-selected="false">Coach</button>
            @endif
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade ratio ratio-21x9 active show" id="nav-member" role="tabpanel" aria-labelledby="nav-member-tab">
            <div id="member">
                <table>
                    {{ var_dump($player->stats()) }}
                </table>
            </div>
        </div>
        @if ($player)
            <div class="tab-pane fade ratio ratio-21x9" id="nav-player" role="tabpanel" aria-labelledby="nav-player-tab">
                <iframe class="border" src="{{ route('players.show', $player->id) }}"></iframe>
            </div>
        @endif
        @if ($coach)
            <div class="tab-pane fade ratio ratio-21x9" id="nav-coach" role="tabpanel" aria-labelledby="nav-coach-tab">
                <iframe src="{{ route('coaches.show', $coach->id) }}"></iframe>
            </div>
        @endif
    </div>
@endsection
