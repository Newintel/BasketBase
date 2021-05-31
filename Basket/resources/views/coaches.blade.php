@extends('layouts.main')

@section('page_title')
    Coaches list
@endsection

@section('content')
<table class="table table-success table-striped">
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
    </thead>
    @foreach ($coaches as $coach)
    <tr>
        <td> {{ $coach->firstname }} </td>
        <td> {{ $coach->lastname }} </td>
        <td> {{ date_diff(date_create($coach->birthdate), date_create('now'))->y }} </td>
    </tr>
    @endforeach
</table>
@endsection