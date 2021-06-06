@extends('layouts.main')

@section('page_title')
    Coaches list
@endsection

@section('content')
<table class="table table-success table-striped table-hover">
    <caption class="caption-top"><h2>Coaches</h2></caption>
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Active</th>
    </thead>
    @foreach ($coaches as $coach)
    <tr class="pointer"  onclick="javascript:window.open('{{ route('coaches.show', $coach->id) }}', '_self')">
        <td> {{ $coach->member->firstname }} </td>
        <td> {{ $coach->member->lastname }} </td>
        <td> {{ !$coach->member->dead ? date_diff(date_create($coach->member->birthdate), date_create('now'))->y : "Dead" }} </td>
        <td> {{ $coach->retired ? "No" : "Yes"}} </td>
    </tr>
    @endforeach
</table>
@endsection