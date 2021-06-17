<style>
    body { font-family: DejaVu Sans, sans-serif;
    font-size: 8px}
    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        border: 1px solid black; /* Параметры рамки */
    }
    .table-hover tbody tr:hover {
        color: #212529;
        background-color: rgba(0, 0, 0, 0.075);
    }
</style>
<h2 class="text-muted" style="text-align: center" >Сведения о результатах проверок, проводимых при осуществлении <br> производственного контроля, устранении нарушений по состоянию на</h2>
        <table style="border-collapse: collapse;" class="table table-hover">
            <thead>
            <tr>
                <th style="width: 10vh">№</th>
                <th style="width: 10vh">Номер и дата акта проверки</th>
                <th style="width: 10vh">Пункт и НПА, положения которого нарушены</th>
                <th style="width: 10vh">Нарушение</th>
                <th style="width: 10vh">Мероприятия по устранению нарушений</th>
                <th style="width: 10vh">Срок устранения нарушения</th>
                <th style="width: 10vh">Дата устранения</th>
                <th style="width: 10vh">Ответственный за контроль устранения нарушений</th>
                <th style="width: 10vh">Причины невыполнения в срок</th>
                <th style="width: 10vh">Перенос срока</th>
                <th style="width: 10vh">Основание переноса срока</th>
                <th style="width: 10vh">Работники, привлеченные к ответственности за допущенное нарушение</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($rows as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->date_check_out}}</td>
                    <td>{{$row->norm_act}} Пункт {{$row->point_act}}</td>
                    <td>{{$row->char_violation}}</td>
                    <td>{{$row->name_event}}</td>
                    <td>{{$row->time_violation}}</td>
                    <td>{{$row->date_violation}}</td>
                    <td>{{$row->name_f.' '.$row->name_l.' '.$row->name_l}}</td>
                    <td>{{$row->reasons_nonpref}}</td>
                    <td>{{$row->data_reasons}}</td>
                    <td>{{$row->reason_post}}</td>
                    <td>{{$row->worker_violations}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
