

@extends('web.layouts.app')
@section('title')
    Отчет о проведенных контрольных мероприятиях
@endsection

@section('content')
    @include('web.include.sidebar_doc')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Отчет о проведенных контрольных мероприятиях и выявленных нарушениях<br>
                            За период с {{date("Y-m-d", strtotime($start))}} по {{$finish}}</h2>
                        @can('product-create')
                            <div class="bat_info"><a href="{{ url('pdf_event/'.$start.'/'.$finish_fact) }}">Создать PDF</a></div>
                        @endcan
                    </div>


                    <div style="background: #FFFFFF; border-radius: 6px" class="inside_tab_padding form51">
                        <div  class="row_block form51">
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
                    @for($i=1; $i<count($data['name_opo'])+1; $i++)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$data['name_opo'][$i]}}</td>
                            <td></td>
                            <td>{{$data['level_1_all'][$i]}}</td>
                            <td>{{$data['level_1_ok'][$i]}}</td>
                            <td></td>
                            <td>{{$data['level_2_all'][$i]}}</td>
                            <td>{{$data['level_2_ok'][$i]}}</td>
                            <td></td>
                            <td>{{$data['level_3_all'][$i]}}</td>
                            <td>{{$data['level_3_ok'][$i]}}</td>
                            <td></td>
                            <td>{{$data['level_4_all'][$i]}}</td>
                            <td>{{$data['level_4_ok'][$i]}}</td>
                            <td>{{$data['opo_all'][$i]}}</td>
                        </tr>
                    @endfor

                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </div>



@endsection
