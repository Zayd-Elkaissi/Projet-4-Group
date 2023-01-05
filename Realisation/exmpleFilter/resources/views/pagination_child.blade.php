
<table border="1">
    <thead>
    <tr>
        <th>id</th>
        <th>Nom_tache</th>
        <th>Duree</th>
    </tr>
</thead>
    <tbody>
        @foreach ($tache as $value)
    <tr>

        <td>{{$value->id}}</td>
        <td>{{$value->Nom_tache}}</td>
        <td>{{$value->Duree}}</td>
    </tr>
    @endforeach
</tbody>
</table>
{!! $tache->links()!!}
