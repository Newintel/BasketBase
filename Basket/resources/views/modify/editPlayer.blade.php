@extends('layouts.modifybase')

@section('style')
    @php
        $style = ['edit']
    @endphp
@endsection

@section('content')
    @php
        use App\Models\Member;
        $player ??= null;
        $coach = isset($coach) && $coach;
        $member ??= $player ? $player->member : null;
    @endphp
    @if(session()->has('info'))
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <p class="card-text">{{ session('info') }}</p>
            </div>
        </div>
    @endif
    <br>
    <form action="@if($player) {{ route('players.update', $player->id) }} @else {{ route('players.store') }} @endif" method="POST" id="player-form">
        @if($player)
            @method('put')
        @endif
        @csrf
        <input type="hidden" name="coach" value="{{ $coach }}">
        <div class="input-group">
            <span class="input-group-text">First and last name</span>
            <select class="form-select" aria-label="Default select example" name="member_id">>
                @if ($member)
                    <option value="{{ $member->id }}">{{ "$member->firstname $member->lastname" }}</option>
                @else
                    @foreach (Member::all() as $m)
                        <option value="{{ $m->id }}">{{ "$m->firstname $m->lastname" }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <br>
        @php
            $value = 0;
            $g = false;
            $f = false;
            $c = false;
            if ($player){
                if (str_contains($player->position, 'G')){
                    $value += 1;
                    $g = true;
                }
                if (str_contains($player->position, 'F')){
                    $value += 2;
                    $f = true;
                }
                if (str_contains($player->position, 'C')){
                    $value += 4;
                    $c = true;
                }
            }
        @endphp
        <input type="hidden" name="position" id="position" val="{{ $value }}" @if($player) value="{{ $player->position }}" @endif>
        <div class="form-check">
            <input type="checkbox" name="position_G" id="p_g" class="form-check-input" @if($g) checked @endif onchange="javascript:updatePosition(this, 1)">
            <span class="form-check-label" for="p_g">Guard</span>
        </div>
        <div class="form-check">
            <input type="checkbox" name="position_F" id="p_f" class="form-check-input" @if($f) checked @endif onchange="javascript:updatePosition(this, 2)">
            <span class="form-check-label" for="p_f">Forward</span>
        </div>
        <div class="form-check">
            <input type="checkbox" name="position_C" id="p_c" class="form-check-input" @if($c) checked @endif onchange="javascript:updatePosition(this, 4)">
            <span class="form-check-label" for="p_c">Center</span>
        </div>
        <br>
        <div class="input-group">
            <input name="height" type="number" class="form-control" placeholder="Height" aria-label="Height" min="150" max="275" @if($player) value="{{ $player->height }}" @endif>
            <span class="input-group-text">cm</span>
        </div>
        <br>
        <div class="input-group">
            <input name="weight" type="number" class="form-control" placeholder="Weight" aria-label="Weight" min="50" max="150" @if($player) value="{{ $player->weight }}" @endif>
            <span class="input-group-text">kg</span>
        </div>
        <br>
        <div class="form-check">
            <input type="radio" name="gender" id="male" class="form-check-input" @if($player && $player->gender == "M") checked @endif value="M">
            <span class="form-check-label" for="male">M</span>
        </div>
        <div class="form-check">
            <input type="radio" name="gender" id="female" class="form-check-input" @if($player && $player->gender == "F") checked @endif value="F">
            <span class="form-check-label" for="male">F</span>
        </div>
        <br>
        <div class="form-check">
            <input type="checkbox" name="retired" id="retired" class="form-check-input" @if($player && $player->retired) checked @endif onchange="javascript:retiredin(this)" value="{{ ($player && $player->retired) ? $player->retired : 0 }}">
            <span class="form-check-label" for="retired">Retired</span>
        </div>
        <br>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
    <script src="{{ asset('js/edit.js') }}"></script>
@endsection