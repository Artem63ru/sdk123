

@extends('web.layouts.app')
@section('title')
    Отчет "Анализ повторяемости несоответствий"
@endsection

@section('content')
    @include('web.include.sidebar_doc')

    <div class="table_header centered">Отчет "Анализ повторяемости несоответствий" по состоянию на по

        <div style="height: 700px" class="inside_tab_padding">
            <div class="row_block plan_new">
                <table>
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
                    @foreach ($rows5 as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id.''.$row->id.''.$row->id}}</td>
                            <td>{{$row->id.''.$row->id.''.$row->id.''.$row->id.''.$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->id}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>



@endsection
