

@extends('web.layouts.app')
@section('title')
    Отчет о состоянии элементов
@endsection

@section('content')
    @include('web.include.sidebar_doc')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Отчет о состоянии элементов опасных производственных объектов<br>
                            c {{$start}} по {{$finish}}</h2>
                        @can('product-create')
                            <div class="bat_info"><a href="{{ url('pdf_elem/'.$start.'/'.$finish.'/'.$title) }}">Создать PDF</a></div>
                        @endcan
                    </div>


                    <div class="inside_tab_padding form51">
                        <div style="background: #FFFFFF; border-radius: 6px" class="row_block form51">
                <table>
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

                        @foreach ($data as $row)
                            <tr>
                                <td>{{$row['name_opo']}}</td>
                                <td>{{$row['name_obj']}}</td>
                                <td>{{$row['IP_obj']}}</td>
                                <td>{{$row['OP_pb']}}</td>
                                <td>{{$row['OP_tech_risk']}}</td>
                                <td>{{$row['OP_reg']}}</td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>




@endsection
