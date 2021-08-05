

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
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Отчет о состоянии опасных производственных объектов
                        <br>В период с {{$start}} по {{$finish}}</h2>
                        @can('product-create')
                            <div class="bat_info"><a href="{{ url('pdf_opo/'.$start.'/'.$finish) }}">Создать PDF</a></div>
                        @endcan
                    </div>

                    <div class="inside_tab_padding form51">
                        <div style="background: #FFFFFF; border-radius: 6px" class="row_block form51">
                <table>
                    <thead>
                    <tr>
                        <th rowspan="2" class="centered">ОПО</th>
                        <th rowspan="2" class="centered">ИП ПБ ОПО</th>
                        <th colspan="2" class="centered">Минимальный интегральный показатель состояния ПБ элемента ОПО</th>
                    </tr>
                    <tr>
                        <th >ИП ПБ элемента ОПО</th>
                        <th class="centered">Наименование элемента</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=0; $i<count($data['name_opos']); $i++)
                        <tr>
                            <td>{{$data['name_opos'][$i]}}</td>
                            <td class="centered">{{$data['ip_opos'][$i]}}</td>
                            <td class="centered">{{$data['ip'][$i]}}</td>
                            <td>{{$data['name'][$i]}}</td>
                        </tr>
                    @endfor

                    </tbody>

                </table>


            </div>
        </div>





@endsection
