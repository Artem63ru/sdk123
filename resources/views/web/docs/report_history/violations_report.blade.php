

@extends('web.layouts.app')
@section('title')
    Отчет о состоянии ОПО
@endsection

@section('content')
    @include('web.include.sidebar_doc')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Отчет о выяленных нарушениях на опасных производственных объектах
                        <br> В период с {{$start}} по {{$finish}}</h2>
                        @can('product-create')
                            <div class="bat_info"><a href="{{ url('pdf_violations_report/'.$start.'/'.$finish.'/'.$title) }}">Создать PDF</a></div>
                        @endcan
                    </div>

                    <div class="inside_tab_padding form51">
                        <div style="background: #FFFFFF; border-radius: 6px" class="row_block form51">
                <table>
                    <thead>
                    <tr>
                        <th>Содержание выявленного нарушения</th>
                        <th>Наименование элемента ОПО</th>
                        <th>Уровень ПК</th>
                        <th>Направление контроля</th>
                        <th>Тяжесть последствий</th>
                        <th>Отметка о повторяемости</th>
                        <th>Мероприятие по устранению нарушения и причин его возникновения</th>
                        <th>Срок устранения</th>
                        <th>Статус нарушения</th>
                        <th>Ответственный исполнитель</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $dat)
                        <tr>
                            <td>{{$dat['desc_violation']}}</td>
                            <td>{{$dat['name_obj']}}</td>
                            <td>{{$dat['level_km']}}</td>
                            <td>{{$dat['direction']}}</td>
                            <td>{{$dat['severity_fatal']}}</td>
                            <td>{{$dat['infi_repeat']}}</td>
                            <td>{{$dat['plan_work']}}</td>
                            <td>{{$dat['plan_date']}}</td>
                            <td>{{$dat['violation_status']}}</td>
                            <td>{{$dat['plan_pers']}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>


            </div>
        </div>





@endsection
