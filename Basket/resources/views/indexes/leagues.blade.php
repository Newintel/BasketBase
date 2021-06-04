@extends('layouts.main')

@section('content')
    @foreach ($leagues as $league)
        <p>
            {{ $league->name }}
            <ul>
                @foreach ($league->winners as $winner)
                    <li>{{$winner->shortname}}, {{ $winner->pivot->season }}</li>
                @endforeach
            </ul>
        </p>
    @endforeach
@endsection