<style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 10px}
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
<h2 class="text-muted" style="text-align: center" >Отчет о состоянии елементов опасных производственных объектов по состоянию на</h2>
        <table style="border-collapse: collapse;" class="table table-hover">
    <thead>
    <tr>
        <th style="width: 25vh">Наименование ОПО</th>
        <th style="width: 25vh">Наименование элемента ОПО</th>
        <th style="width: 25vh">Интегральный показатель состояния ПБ Элемента ОПО</th>
        <th style="width: 25vh">Обобщенный показатель состояния ПБ элемента ОПО по комплексным сценариям</th>
        <th style="width: 25vh">Обобщенный показатель технического риска ПБ элемента ОПО</th>
        <th style="width: 25vh">Обобщенный показатель нарушения регламентных значений и превышения пределов безопасности технологического процесса</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($rows as $row)
        <tr>
            <td>{{$row->obj_to_opo->descOPO}}</td>
            <td>{{$row->nameObj}}</td>
            <td>{{$row->elem_to_calc->first()->ip_elem}}</td>
            <td>{{$row->elem_to_calc->first()->op_m}}</td>
            <td>{{$row->elem_to_calc->first()->op_el}}</td>
            <td>{{$row->elem_to_calc->first()->op_r}}</td>
        </tr>
    @endforeach


    </tbody>

</table>
