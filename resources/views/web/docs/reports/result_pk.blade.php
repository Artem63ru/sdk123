

@extends('web.layouts.app')
@section('title')
    Сведения о результатах проверок
@endsection

@section('content')
    @include('web.include.sidebar_doc')

    <div class="table_header centered">Сведения о результатах проверок, проводимых при осуществлении производственного контроля, устранении нарушений по состоянию на

        <div style="height: 700px" class="inside_tab_padding">
            <div class="row_block plan_new">
                <table>
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Номер и дата акта проверки</th>
                        <th>Пункт и НПА, положения которого нарушены</th>
                        <th>Нарушение</th>
                        <th>Мероприятия по устранению нарушений</th>
                        <th>Срок устранения нарушения</th>
                        <th>Дата устранения</th>
                        <th>Ответственный за контроль устранения нарушений</th>
                        <th>Причины невыполнения в срок</th>
                        <th>Перенос срока</th>
                        <th>Основание переноса срока</th>
                        <th>Работники, привлеченные к ответственности за допущенное нарушение</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($rows2 as $row)
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
            </div>
        </div>




@endsection
