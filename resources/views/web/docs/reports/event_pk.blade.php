

@extends('web.layouts.app')
@section('title')
    Отчет о проведенных контрольных мероприятиях
@endsection

@section('content')
    @include('web.include.sidebar_doc')

    <div class="table_header centered">Отчет о проведенных контрольных мероприятиях и выявленных нарушениях за период с по

        <div style="height: 700px" class="inside_tab_padding">
            <div class="row_block plan_new">
                <table>
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
                    @foreach ($rows6 as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id.''.$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id.''.$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id.''.$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id.''.$row->id.''.$row->id}}</td>
                            <td>{{$row->id}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>



@endsection
