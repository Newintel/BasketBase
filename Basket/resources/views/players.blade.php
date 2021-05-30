<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Players</title>
</head>
<body>
    <table>
        <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Position</th>
            <th>Active</th>
            <th>Height</th>
            <th>Weight</th>
            <th>Gender</th>
            <th>Draft</th>
            <th>Birthyear</th>
            <th>Origin</th>
        </thead>
        @foreach ($players as $player)
        <tr>
            <td> {{ $player->firstname }} </td>
            <td> {{ $player->lastname }} </td>
            <td> {{ $player->position }} </td>
            <td> {{ $player->active == 0 ? 'no' : 'yes' }} </td>
            <td> {{ $player->height }} </td>
            <td> {{ $player->weight }} </td>
            <td> {{ $player->gender }} </td>
            <td> {{ $player->draft }} </td>
            <td> {{ $player->birthyear }} </td>
            <td> {{ $player->origin }} </td>
        </tr>
        @endforeach
    </table>
</body>
</html>