@extends('layouts.main')

@section('page_title')
    Members list
@endsection

@section('style')
    <?php $style = ['members'] ?>
@endsection

@section('content')
<table class="table table-success table-striped table-hover">
    <caption class="caption-top"><h2>Every Listed Member</h2></caption>
    <thead>
        <th></th>
        <th>First Name</th>
        <th>Last Name</th>
    </thead>
    @foreach ($members as $member)
    <tr>
        <td><img class="pp" src="{{ asset('images/'.$member->image) }}"></td>
        <td> {{ $member->firstname }} </td>
        <td> {{ $member->lastname }} </td>
    </tr>
    @endforeach
</table>
@endsection