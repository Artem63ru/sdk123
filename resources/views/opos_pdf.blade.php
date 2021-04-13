<table class="table table-bordered" id="laravel_crud">
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Created at</th>

    </tr>
    </thead>
    <tbody>
    @foreach($opos as $opo)
        <tr>
            <td>{{ $opo->idOPO }}</td>
            <td>{{ $opo->descOPO }}</td>
            <td>{{ $opo->fullDescOPO }}</td>
            <td>{{ date('d m Y', strtotime($opo->datemode)) }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
