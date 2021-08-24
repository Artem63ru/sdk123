

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
                            В период с {{$start}} по {{$finish}}</h2>
                        @can('product-create')
                            <div class="bat_info"><a href="{{ url('pdf_elem/'.$start.'/'.$finish) }}">Создать PDF</a></div>
                        @endcan
                    </div>



                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


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

                        @for($i=0; $i<count($data['desc_opo']); $i++)
                            <tr>
                                <td>{{$data['desc_opo'][$i]}}</td>
                                <td>{{$data['name_obj'][$i]}}</td>
                                <td>{{$data['ip_elem'][$i]}}</td>
                                <td>{{$data['op_m'][$i]}}</td>
                                <td>{{$data['op_el'][$i]}}</td>
                                <td>{{$data['op_r'][$i]}}</td>
                            </tr>
                        @endfor

                    </tbody>

                </table>

            </div>

        </div>




@endsection
