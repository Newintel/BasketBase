@extends('layouts.main')

@section('page_title')
    Players list
@endsection

@section('content')
<table class="table table-success table-striped">
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
    </thead>
    @foreach ($players as $player)
    <tr>
        <td> {{ $player->firstname }} </td>
        <td> {{ $player->lastname }} </td>
        <td> {{ $player->position }} </td>
        <td> {{ $player->active == 0 ? 'no' : 'yes' }} </td>
        <td> {{ (int)($player->height/100) . "m" . $player->height%100 }} </td>
        <td> {{ $player->weight }} kg </td>
        <td> {{ $player->gender }} </td>
        <td> {{ date_diff(date_create($player->birthdate), date_create('now'))->y }} </td>
        <td> {{ $player->origin }} </td>
    </tr>
    @endforeach
</table>
@endsection