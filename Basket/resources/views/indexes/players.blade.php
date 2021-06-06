@extends('layouts.main')

@section('page_title')
    Players list
@endsection

@section('content')
<table class="table table-success table-striped table-hover">
    <caption class="caption-top"><h2>Players</h2></caption>
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Position</th>
        <th>Active</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Origin</th>
        <th>Hall of Fame</th>
    </thead>
    @foreach ($players as $player)
    <tr class="pointer" onclick="javascript:window.open('{{ route('players.show', $player->id) }}', '_self')">
        <td> {{ $player->member->firstname }} </td>
        <td> {{ $player->member->lastname }} </td>
        <td> {{ $player->position }} </td>
        <td> {{ $player->retired ? "No" : "Yes"}} </td>
        <td> {{ (int)($player->height/100) . "m" . $player->height%100 }} </td>
        <td> {{ $player->weight }} kg </td>
        <td> {{ $player->gender }} </td>
        <td> {{ !$player->member->dead ? date_diff(date_create($player->member->birthdate), date_create('now'))->y : "Dead"}} </td>
        <td> {{ $player->member->origin }} </td>
        <td>{{ $player->member->hof ? "Yes" : "No" }}</td>
    </tr>
    @endforeach
</table>
@endsection