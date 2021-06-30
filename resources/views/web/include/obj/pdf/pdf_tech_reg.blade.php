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
<h2 class="text-muted" style="text-align: center" >Отчет перечне контролируемых технологичных параметров по объекту {{$title}} </h2>
        <table style="border-collapse: collapse;" class="table table-hover">
    <thead>
    <tr>
         <th style="width: 25vh">АСУ ТП</th>
        <th style="width: 25vh">Наименование параметра</th>
        <th style="width: 25vh">Мин.</th>
        <th style="width: 25vh">Макс.</th>
        <th style="width: 25vh">Коэф-нт</th>
     </tr>
    </thead>
    <tbody>

    @foreach ($this_elem as $row)
        <tr>
            <td>{{$row->reglament_to_param->asutp_name}}</td>
            <td>{{$row->reglament_to_param->full_name}}</td>
            <td>{{$row->min}}</td>
            <td>{{$row->max}}</td>
            <td>{{$row->koef}}</td>
        </tr>
    @endforeach


    </tbody>

</table>
