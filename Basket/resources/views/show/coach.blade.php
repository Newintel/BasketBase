@extends('layouts.main')

@section('page_title')
    {{ $coach->member->firstname." ".$coach->member->lastname }}
@endsection

@section('content')
    <ul>
        @foreach ($teams as $team)
            <li>{{ $team->city." ".$team->name.", ".$team->pivot->from_season." - ".($team->pivot->to_season + 1) }}</li>
        @endforeach
    </ul>
@endsection