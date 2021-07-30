<style>
    body { font-family: DejaVu Sans, sans-serif; }
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
<h2 class="text-muted" style="text-align: center" >{{$data['title']}}</h2>
<table style="border-collapse: collapse;" class="table table-hover">
    <thead>
    <tr>
        <th rowspan="2" class="centered">ОПО</th>
        <th rowspan="2" class="centered">ИП ПБ ОПО</th>
        <th colspan="2" class="centered">Минимальный интегральный показатель состояния ПБ элемента ОПО</th>
    </tr>
    <tr>
        <th >ИП ПБ элемента ОПО</th>
        <th class="centered">Наименование элемента</th>
    </tr>
    </thead>
    <tbody>
    @for($i=0; $i<count($data['name_opos']); $i++)
        <tr>
            <td>{{$data['name_opos'][$i]}}</td>
            <td class="centered">{{$data['ip_opos'][$i]}}</td>
            <td class="centered">{{$data['ip'][$i]}}</td>
            <td>{{$data['name'][$i]}}</td>
        </tr>
    @endfor

    </tbody>

</table>
