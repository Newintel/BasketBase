<div id="history" class="col">
    <h3>{{ ($title ?? '').'Teams' }}</h3>
    <ul class="list-group">
        @foreach ($teams as $team)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ ($team->league == 'NBA'  ? $team->city." " : "").$team->team}}
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
                $aw = $_awards->sortBy('id');
                $times = 0;
                $seasons = [];
                if (isset($name)){
                    unset($name);
                }
                foreach ($aw as $award){
                    $name ??= $award->fullname;
                    $times += 1;
                    array_push($seasons, $award->pivot->season + 1);
                }
            @endphp
            <li class='list-group-item'>
                <p>{{ ($times > 1 ? $times.' x ' : ' ').$name }} ({{ implode(", ", $seasons) }})</p>
            </li>
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
                        echo "<li class='list-group-item'>$team ($seasons)</li>";
                    }
                @endphp
            </ul>
        </div>
    </div>
@endif