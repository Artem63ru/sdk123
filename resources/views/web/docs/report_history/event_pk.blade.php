

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
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Отчет о проведенных контрольных мероприятиях и выявленных нарушениях
                        <br> В период с {{$start}} по {{$finish}}</h2>
                        @can('product-create')
                            <div class="bat_info"><a href="{{ url('pdf_event/'.$start.'/'.$finish.'/'.$title) }}">Создать PDF</a></div>
                        @endcan
                    </div>

                    <div class="inside_tab_padding form51">
                        <div style="background: #FFFFFF; border-radius: 6px; width: 110%" class="row_block form51">
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
                    @foreach($data as $dat)
                        <tr>
                            <td style="text-align: center">{{$dat['id_in_calc']}}</td>
                            <td style="text-align: center">{{$dat['name_opo']}}</td>
                            <td style="text-align: center">{{$dat['num_pk_1']}}</td>
                            <td style="text-align: center">{{$dat['level_1_all']}}</td>
                            <td style="text-align: center">{{$dat['level_1_ok']}}</td>
                            <td style="text-align: center">{{$dat['num_pk_2']}}</td>
                            <td style="text-align: center">{{$dat['level_2_all']}}</td>
                            <td style="text-align: center">{{$dat['level_2_ok']}}</td>
                            <td style="text-align: center">{{$dat['num_pk_3']}}</td>
                            <td style="text-align: center">{{$dat['level_3_all']}}</td>
                            <td style="text-align: center">{{$dat['level_3_ok']}}</td>
                            <td style="text-align: center">{{$dat['num_pk_4']}}</td>
                            <td style="text-align: center">{{$dat['level_4_all']}}</td>
                            <td style="text-align: center">{{$dat['level_4_ok']}}</td>
                            <td style="text-align: center">{{$dat['opo_all']}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>


            </div>
        </div>
                </div>
            </div>
        </div>
    </div>




@endsection
