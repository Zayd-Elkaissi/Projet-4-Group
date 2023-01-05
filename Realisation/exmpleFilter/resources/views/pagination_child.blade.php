@foreach($users as $row)
<tr>
    <td>{{ $row->id}}</td>
    <td>{{ $row->name }}</td>

</tr>
@endforeach
<tr>
    <td colspan="3" align="center">
        {!! $users->links('pagination.custom') !!}
    </td>
</tr>
