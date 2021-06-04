@extends('layouts.layout')

@section('content')
<ul>
    @foreach ($teams as $team)
        <li>{{ $team->name }}</li>
    @endforeach
</ul>
@endsection