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
<h2 class="text-muted" style="text-align: center" >Отчет о состоянии елементов опасных производственных объектов по состоянию на</h2>
        <table style="border-collapse: collapse;" class="table table-hover">
            <thead>
            <tr>
                <th rowspan="2" class="centered">Наименование ОПО</th>
                <th rowspan="2" class="centered">Элемент ОПО</th>
                <th rowspan="2" class="centered">Наименование повторного несоответствия (требования законодательства)</th>
                <th colspan="4" class="centered">Выявлено при проведении контрольных мероприятий</th>
                <th rowspan="2" class="centered">Всего за период</th>
                <th rowspan="2" class="centered">% устранения</th>
                <th rowspan="2" class="centered">% от общего количества выявленых</th>
            </tr>
            <tr>
                <th class="centered">I уровень</th>
                <th class="centered">II уровень</th>
                <th class="centered">III уровень</th>
                <th class="centered">IV уровень</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($rows as $row)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
