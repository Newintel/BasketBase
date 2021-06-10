@extends('layouts.main')

@section('page_title')
    {{ "$member->firstname $member->lastname" }}
@endsection

@section('style')
    @php
        $style = ['show'];
    @endphp
@endsection

@section('content')
    @php
        $i = 0;
    @endphp
    <div class="container tab-content" id="nav-tabContent">
        @foreach ($leagues as $league)
            @php
                $num = 12;
                $div = 1;
                $awards_set = isset($awards[$leagues_id[$i]]);
                $wins_set = isset($wins[$leagues_id[$i]]);
                $div += $awards_set ? 1 : 0;
                $div += $wins_set ? 1 : 0;
                $num /= $div;
            @endphp
            <div class="infos border-bottom border-2 rounded-3 border-primary tab-pane fade {{$i == 0 ? 'active show' : ''}}" id="nav-{{ $league }}" role="tabpanel" aria-labelledby="nav-{{ $league }}-tab">
                <div class="row">
                    <div id="history" class="col">
                        <h3>{{ ($title ?? '').'Teams' }}</h3>
                        <ul class="list-group">
                            @foreach ($teams[$leagues_id[$i]] as $team)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ ($team->league == 1  ? $team->city." " : "").$team->team}}
                                    <span class="badge bg-primary rounded-pill">
                                        {{ $team->from." - ".($team->to ? $team->to + 1 : "now") }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @if ($awards_set)
                        <div id="awards" class='col'>
                            <h3>Awards</h3>
                            <ul class='list-group list-group-flush'>
                                @php
                                    $_awards = $awards[$leagues_id[$i]];
                                    $aw = $_awards->groupBy('id');
                                @endphp
                                @foreach ($aw as $award_list)
                                    @php
                                        $times = 0;
                                        $seasons = [];
                                        if (isset($name)){
                                            unset($name);
                                        }
                                        foreach ($award_list as $award){
                                            $name ??= $award->fullname;
                                            $times += 1;
                                            array_push($seasons, $award->pivot->season + 1);
                                        }
                                        sort($seasons);
                                    @endphp
                                    <li class='list-group-item'>
                                        <p>{{ ($times > 1 ? $times.' x ' : ' ').$name }} ({{ implode(", ", $seasons) }})</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($wins_set)
                        <div id="championships" class='col'>
                            <h3>Championships</h3>
                            <div id="league">
                                <ul class='list-group list-group-flush'>
                                    @php
                                        $_wins = $wins[$leagues_id[$i]]->groupBy('team')->toArray();
                                        foreach ($_wins as $team=>$win){
                                            $_seasons = array_map(fn($w) => $w->season + 1, $win);
                                            $seasons = implode(', ', $_seasons);
                                            echo "<li class='list-group-item text-center'>$team ($seasons)</li>";
                                        }
                                    @endphp
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @php
                $i++;
            @endphp
        @endforeach
        <nav class="row" id="pagediv">
            <div class="nav nav-pills justify-content-center" id="nav-tab" role="tablist">
                @php
                    $i = 0;    
                @endphp
                @foreach ($leagues as $league)
                    <button class="nav-link {{ $i == 0 ? 'active' : '' }}" id="nav-{{ $league }}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{ $league }}" type="button" role="tab" aria-controls="nav-{{ $league }}" aria-selected={{ $i++ == 0 ? 'true' : 'false' }}>{{ $league }}</button>
                @endforeach
            </div>
        </nav>
    </div>
@endsection