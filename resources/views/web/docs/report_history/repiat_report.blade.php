

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
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Отчет "Анализ повторяемости"
                        <br> В период с {{$start}} по {{$finish}}</h2>
                        @can('product-create')
                            <div class="bat_info"><a href="{{ url('pdf_repiat_report/'.$start.'/'.$finish.'/'.$title) }}">Создать PDF</a></div>
                        @endcan
                    </div>

                    <div class="inside_tab_padding form51">
                        <div style="background: #FFFFFF; border-radius: 6px" class="row_block form51">
                <table>
                    <thead>
                    <tr>
                        <th rowspan="2" class="centered">Наименование ОПО</th>
                        <th rowspan="2" class="centered">Элемент ОПО</th>
                        <th rowspan="2" class="centered">Наименование повторного несоответствия (требования законодательства)</th>
                        <th colspan="4" class="centered">Выявлено при проведении контрольных мероприятий</th>
                        <th rowspan="2" class="centered">Всего за период</th>
                        <th rowspan="2" class="centered">% устранения</th>
                        <th rowspan="2" class="centered">% от общего количества выявленых за год</th>
                    </tr>
                    <tr>
                        <th class="centered">I уровень</th>
                        <th class="centered">II уровень</th>
                        <th class="centered">III уровень</th>
                        <th class="centered">IV уровень</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $dat)
                        <tr>
                            <td style="text-align: center">{{$dat['name_opo']}}</td>
                            <td style="text-align: center">{{$dat['name_elem']}}</td>
                            <td style="text-align: center">{{$dat['name_violation']}}</td>
                            <td style="text-align: center">{{$dat['num_1_level']}}</td>
                            <td style="text-align: center">{{$dat['num_2_level']}}</td>
                            <td style="text-align: center">{{$dat['num_3_level']}}</td>
                            <td style="text-align: center">{{$dat['num_4_level']}}</td>
                            <td style="text-align: center">{{$dat['num_all']}}</td>
                            <td style="text-align: center">{{$dat['percent_ok']}}%</td>
                            <td style="text-align: center">{{$dat['percent_ok_all']}}%</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>


            </div>
        </div>





@endsection
