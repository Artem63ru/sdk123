<style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 7px}
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
<<<<<<< HEAD
<h2 class="text-muted" style="text-align: center" >Отчет о состоянии елементов опасных производственных объектов по состоянию на</h2>
=======
<h2 class="text-muted" style="text-align: center" >Отчет о проведенных контрольных мероприятиях и выявленных нарушениях за период с по</h2>
>>>>>>> origin/Show_Modal
        <table style="border-collapse: collapse;" class="table table-hover">
            <thead>

            <tr>
                <th rowspan="2" class="centered">№ п/п</th>
                <th rowspan="2" class="centered">Наименование ОПО</th>
                <th colspan="3" class="centered">I уровень</th>
                <th colspan="3" class="centered">II уровень</th>
                <th colspan="3" class="centered">III уровень</th>
                <th colspan="3" class="centered">IV уровень</th>
                <th rowspan="2" class="centered">ВСЕГО нарушений по ОПО</th>
            </tr>
            <tr>
                <th class="centered">Проверок</th>
                <th class="centered">Выявлено нарушений</th>
                <th class="centered">Устранено</th>
                <th class="centered">Проверок</th>
                <th class="centered">Выявлено нарушений</th>
                <th class="centered">Устранено</th>
                <th class="centered">Проверок</th>
                <th class="centered">Выявлено нарушений</th>
                <th class="centered">Устранено</th>
                <th class="centered">Проверок</th>
                <th class="centered">Выявлено нарушений</th>
                <th class="centered">Устранено</th>
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach

            </tbody>
        </table>
