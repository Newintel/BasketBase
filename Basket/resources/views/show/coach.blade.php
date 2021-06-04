@extends('layouts.main')

@section('page_title')
    {{ $coach->member->firstname." ".$coach->member->lastname }}
@endsection

@section('style')
    @php
        $style = ['show'];
    @endphp
@endsection

@section('content')
<div class="row">
    <div id="history" class="tab col">
        <h3>Coached teams</h3>
        <ul class="list-group">
            @foreach ($teams as $team)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $team->city." ".$team->name}}
                    <span class="badge bg-primary rounded-pill">
                        {{ $team->pivot->from_season." - ".($team->pivot->to_season + 1) }}
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="tab col" id="achievements">
        @if ($awards)
            <h3>Awards</h3>
            <ul>
                @foreach ($awards as $award_list)
                    @php
                        $award = $award_list[0];
                        $times = count($award_list);
                        $seasons = "";
                        foreach ($award_list as $award){
                            $seasons .= ", ".$award->pivot->season;
                        }
                    @endphp
                    <li>{{ ($times > 1 && "$times x ").$award->name.$seasons }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection