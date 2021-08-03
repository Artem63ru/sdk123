<style>
    body { font-family: DejaVu Sans, sans-serif; }
</style>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Описание события</th>
        <th scope="col">Пользователь</th>
        <th scope="col">IP адрес</th>
        <th scope="col">Дата</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($logs as $log)
        <tr>
            <th scope="row-4">{{ $count-- }}</th>
            <td>{{ $log->description }}</td>
            <td>{{ $log->username }}</td>
            <td>{{ $log->ip }}</td>
            <td>{{ $log->created_at }}</td>
        </tr>
    @endforeach


    </tbody>

</table>
