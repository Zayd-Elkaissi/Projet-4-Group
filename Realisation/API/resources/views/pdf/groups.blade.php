<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Group </title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>List des données</h1>
        
        <table id="customers">
          <tr>
            <th>Logo</th>
            <th>Nom</th>
          </tr>
          @foreach ($groupes as $group)
                    <tr>
                      <td class="col-2">{{ $group->Logo }}</td>
                        <td>{{ $group->Nom_groupe }}</td>
                    </tr>
          @endforeach
        </table>
</body>
</html>