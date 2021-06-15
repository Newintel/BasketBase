@extends('layouts.modifybase')

@section('style')
    @php
        $style = ['edit']
    @endphp
@endsection

@section('content')
    @if(session()->has('info'))
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <p class="card-text">{{ session('info') }}</p>
            </div>
        </div>
    @endif
    <br>
    <form action="{{ route('members.update', $member->id)}}" method="POST" id="member-form">
        @method('put')
        @csrf
        <div class="input-group">
            <span class="input-group-text">First and last name</span>
            <input type="text" aria-label="First name" class="form-control" name="firstname" value="{{ $member->firstname }}">
            <input type="text" aria-label="Last name" class="form-control" name="lastname" value="{{ $member->lastname }}">
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-text">Birthdate</span>
            <input class="form-control" type="date" name="birthdate" id="birthdate" value="{{ $member->birthdate }}">
        </div>
        <br>
        <div class="input-group @error('origin') is-invalid @enderror">
            <span class="input-group-text">Origin</span>
            <input class="form-control" type="text" name="origin" id="origin" value="{{ $member->origin }}">
            @error('origin')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-check">
            <input type="checkbox" name="dead" id="dead" class="form-check-input" onchange="javascript:deactivate()" @if($member->dead) checked @endif>
            <span class="form-check-label" for="dead">Dead</span>
        </div>
        <br>
        <div class="form-check" id="active-div">
            <input type="checkbox" name="active" id="active" class="form-check-input" @if($member->active) checked @endif>
            <span class="form-check-label" for="active">Active</span>
        </div>
        <br>
        <div class="form-check">
            <input type="checkbox" name="hof" id="hof" class="form-check-input" onchange="javascript:deactivate()" @if($member->hof) checked @endif>
            <span class="form-check-label" for="hof">Hall Of Famer</span>
        </div>
        <br>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
    <script src="{{ asset('js/edit.js') }}"></script>
@endsection