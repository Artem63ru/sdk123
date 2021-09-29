

@extends('web.layouts.app')
@section('title')
    Отчет о выяленных нарушениях
@endsection

@section('content')
    @include('web.include.sidebar_doc')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Отчет о выяленных нарушениях на опасных производственных объектах<br>
                            В период с {{$start}} по {{$finish}}</h2>
                        @can('product-create')
                            <div class="bat_info"><a href="{{ url('pdf_violations_report/'.$start.'/'.$finish_fact) }}">Создать PDF</a></div>
                        @endcan
                    </div>


                    <div style="background: #FFFFFF; border-radius: 6px" class="inside_tab_padding form51">
                        <div  style="" class="row_block form51">

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
                    @for($i=0; $i<count($data['desc_violation']); $i++)
                        <tr>
                            <td>{{$data['desc_violation'][$i]}}</td>
                            <td>{{$data['name_obj'][$i]}}</td>
                            <td>{{$data['level_km'][$i]}}</td>
                            <td>{{$data['direction'][$i]}}</td>
                            <td>{{$data['severity_fatal'][$i]}}</td>
                            <td>{{$data['infi_repeat'][$i]}}</td>
                            <td>{{$data['plan_work'][$i]}}</td>
                            <td>{{$data['plan_date'][$i]}}</td>
                            <td>{{$data['violation_status'][$i]}}</td>
                            <td>{{$data['plan_pers'][$i]}}</td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>




@endsection
