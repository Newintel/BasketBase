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
    <tr class="pointer" onclick="javascript:window.open('{{ route('members.show', $member->id) }}', '_self')">
        <td><img class="pp" src="{{ asset('images/'.$member->image) }}"></td>
        <td class='align-middle'> {{ $member->firstname }} </td>
        <td class='align-middle'> {{ $member->lastname }} </td>
    </tr>
    @endforeach
</table>
@endsection