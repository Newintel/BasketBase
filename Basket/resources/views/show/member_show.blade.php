@extends('layouts.main')

@section('page_title')
    {{ "$member->firstname $member->lastname" }}
@endsection

@section('style')
    @php
        $style = ['show'];
        $num = $awards && count($wins) ? 4 : 6;
    @endphp
@endsection

@section('content')
    <div class="row">
        <div id="history" class="tab col-{{ $num }}">
            <h3>{{ ($title ?? '').'Teams' }}</h3>
            <ul class="list-group">
                @foreach ($teams as $team)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ ($team->is_in_league('NBA') ? $team->city." " : "").$team->name}}
                        <span class="badge bg-primary rounded-pill">
                            {{ $team->pivot->from_season." - ".($team->pivot->to_season ? $team->pivot->to_season + 1 : "now") }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-content tab col-{{ 12 - $num }}" id="nav-tabContent">
            @foreach ($leagues as $league)    
                <div id="nav-{{ $league }}" role="tabpanel" aria-labelledby="nav-{{ $league }}-tab">
                    <div class="row">
                        @if ($awards)
                            <div id="awards" class='col-{{ $num }}'>
                                <h3>Awards</h3>
                                <ul class='list-group list-group-flush'>
                                    @foreach ($awards as $award_list)
                                        @php
                                            $award = $award_list[0];
                                            $times = count($award_list);
                                            $seasons = "";
                                            foreach ($award_list as $award){
                                                $seasons .= ", ".$award->pivot->season;
                                            }
                                        @endphp
                                        <li class='list-group-item'>{{ ($times > 1 ? "$times x " : " ").$award->fullname.$seasons }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (count($wins))
                            <div id="championships" class='col-{{ $num }}'>
                                <h3>Championships</h3>
                                <div id="league">
                                    <ul class='list-group list-group-flush'>
                                        @foreach($wins as $win)
                                            <li>{{ $wins }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            <nav class="row" id="pagediv">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach ($leagues as $league)
                        <button class="nav-link" id="nav-{{ $league }}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{ $league }}" type="button" role="tab" aria-controls="nav-{{ $league }}" aria-selected="true">{{ $league }}</button>
                    @endforeach
                </div>
            </nav>
        </div>
    </div>
@endsection