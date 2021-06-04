@extends('layouts.main')

@section('content')
<ul>
    <h2>{{ $player->as() }}</h2>
    @foreach ($awards as $award)
        <li>{{ $award->name }}</li>
    @endforeach
</ul>
@endsection