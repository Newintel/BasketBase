@extends('layouts.modifybase')

@section('style')
    @php
        $style = ['edit']
    @endphp
@endsection

@section('content')
    @php
        $member ??= null;
    @endphp
    @if(session()->has('info'))
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <p class="card-text">{{ session('info') }}</p>
            </div>
        </div>
    @endif
    <br>
    <form action="@if($member) {{ route('members.update', $member->id) }} @else {{ route('members.store') }} @endif" method="POST" id="member-form">
        @if($member)
            @method('put')
        @endif
        @csrf
        <div class="input-group">
            <span class="input-group-text">First and last name</span>
            <input type="text" aria-label="First name" class="form-control @error('firstname') is-invalid @enderror" name="firstname" @if($member) value="{{ $member->firstname }}" @endif>
            <input type="text" aria-label="Last name" class="form-control @error('lastname') is-invalid @enderror" name="lastname" @if($member) value="{{ $member->lastname }}" @endif>
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-text">Birthdate</span>
            <input class="form-control" type="date" name="birthdate" id="birthdate" @if($member) value="{{ $member->birthdate }}" @endif>
        </div>
        <br>
        <div class="input-group @error('origin') is-invalid @enderror">
            <span class="input-group-text">Origin</span>
            <input class="form-control" type="text" name="origin" id="origin" @if($member) value="{{ $member->origin }}" @endif>
            @error('origin')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-check">
            <input type="checkbox" name="dead" id="dead" class="form-check-input" onchange="javascript:deactivate(this, '#active-div', true)" @if($member && $member->dead) checked @endif>
            <span class="form-check-label" for="dead">Dead</span>
        </div>
        <br>
        <div class="form-check" id="active-div" @if($member && $member->dead) style="display: none" @endif>
            <input type="checkbox" name="active" id="active" class="form-check-input" @if($member && $member->active) checked @endif>
            <span class="form-check-label" for="active">Active</span>
        </div>
        <br @if($member && $member->dead) style="display: none" @endif>
        <div class="form-check">
            <input type="checkbox" name="hof" id="hof" class="form-check-input" @if($member && $member->hof) checked @endif>
            <span class="form-check-label" for="hof">Hall Of Famer</span>
        </div>
        <br>
        <div class="fw-bold">
            <div class="form-check">
                <input type="checkbox" name="coach" id="coach" class="form-check-input">
                <span class="form-check-label" for="coach">Create coach</span>
            </div>
            <div class="form-check">
                <input type="checkbox" name="player" id="player" class="form-check-input">
                <span class="form-check-label" for="player">Create player</span>
            </div>
        </div>
        <br>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
    <script src="{{ asset('js/edit.js') }}"></script>
@endsection