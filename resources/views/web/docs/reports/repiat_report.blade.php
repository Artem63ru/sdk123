

@extends('web.layouts.app')
@section('title')
    Отчет "Анализ повторяемости несоответствий"
@endsection

@section('content')
    @include('web.include.sidebar_doc')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Отчет "Анализ повторяемости несоответствий"<br>
                            В период с {{date('Y-m-d', strtotime($start))}} по {{$finish}}</h2>
                        @can('product-create')
                            <div class="bat_info"><a href="{{ url('pdf_repair/'.$start.'/'.$finish_fact) }}">Создать PDF</a></div>
                        @endcan
                    </div>


                    <div style="background: #FFFFFF; border-radius: 6px" class="inside_tab_padding form51">
                        <div  style="" class="row_block form51">

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
                    @for($id_OPO=0; $id_OPO<count($output_data['name_opo']); $id_OPO++)
                        @for($id_obj=0; $id_obj<count($output_data['name_elem'][$id_OPO]); $id_obj++)
                            @for($id_violation=0; $id_violation<count($output_data['name_violation'][$id_OPO][$id_obj]); $id_violation++)
                                <tr>
                                    <td style="text-align: center">{{$output_data['name_opo'][$id_OPO]}}</td>
                                    <td style="text-align: center">{{$output_data['name_elem'][$id_OPO][$id_obj]}}</td>
                                    <td style="text-align: center">{{$output_data['name_violation'][$id_OPO][$id_obj][$id_violation]}}</td>
                                    <td style="text-align: center">{{$output_data['num_1_level'][$id_OPO][$id_obj][$id_violation]}}</td>
                                    <td style="text-align: center">{{$output_data['num_2_level'][$id_OPO][$id_obj][$id_violation]}}</td>
                                    <td style="text-align: center">{{$output_data['num_3_level'][$id_OPO][$id_obj][$id_violation]}}</td>
                                    <td style="text-align: center">{{$output_data['num_4_level'][$id_OPO][$id_obj][$id_violation]}}</td>
                                    <td style="text-align: center">{{$output_data['num_all'][$id_OPO][$id_obj][$id_violation]}}</td>
                                    <td style="text-align: center">{{$output_data['ok'][$id_OPO][$id_obj][$id_violation]}}%</td>
                                    <td style="text-align: center">{{$output_data['ok_of_all'][$id_OPO][$id_obj][$id_violation]}}%</td>
                                </tr>
                            @endfor
                        @endfor
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>



@endsection
