@extends('layouts.main')

@section('content')
<ul>
    @foreach ($awards as $award)
        <li>{{ $award->name }}</li>
    @endforeach
</ul>
@endsection