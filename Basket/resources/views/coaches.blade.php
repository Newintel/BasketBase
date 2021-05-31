<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Coaches</title>
</head>
<body>
    <table>
        <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
        </thead>
        @foreach ($coaches as $coach)
        <tr>
            <td> {{ $coach->firstname }} </td>
            <td> {{ $coach->lastname }} </td>
            <td> {{ date_diff(date_create($coach->birthdate), date_create('now'))->y }} </td>
        </tr>
        @endforeach
    </table>
</body>
</html>