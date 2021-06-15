@extends('layouts.modifybase')

@section('content')
    @if(session()->has('info'))
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <p class="card-text">{{ session('info') }}</p>
            </div>
        </div>
    @endif
    <br>
    <form action="{{ route('members.update', $member->id)}}" method="POST">
        
    </form>
@endsection