

@extends('web.layouts.app')
@section('title')
    Справка о выполнении актов
@endsection

@section('content')
    @include('web.include.sidebar_doc')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-muted" style="text-align: center" >Справка о выполнении актов, предписаний, выданных службой, отделом промышленной безопасности, работником, ответственным за промышленную безопасность<br>В период с {{date("Y-m-d", strtotime($start))}} по {{"$finish"}}</h2>
                        @can('product-create')
                            <div class="bat_info"><a href="{{ url('pdf_quality_criteria/'.date("Y-m-d", strtotime($start)).'/'.$finish.'/'.$title) }}">Создать PDF</a></div>
                        @endcan
                    </div>

                    <div class="inside_tab_padding form51">
                        <div style="background: #FFFFFF; border-radius: 6px" class="row_block form51">
                            <table>
                                <tr>
                                    <td colspan="2" rowspan="2">Критерий оценки<br></td>
                                    <td colspan="10">Количество нарушений по критериям</td>
                                </tr>
                                <tr>
                                    @for($i=0; $i<count($data); $i++)
                                        <td>{{$data[$i]['name_opo']}}</td>
                                    @endfor
                                    <td>Итого</td>
                                </tr>
                                <tr>
                                    <?php
                                    $sum_red = 0;
                                    ?>
                                    <td rowspan="3" >Критерий №1<br>Тяжесть возможных последствий </td>
                                    <td class="centered">Красная зона</td>
                                    @for($i=0; $i<count($data); $i++)
                                        <td style="text-align: center">{{$data[$i]['k1_red']}}</td>
                                        <?php
                                        $sum_red = $data[$i]['k1_red'] + $sum_red;
                                        ?>
                                    @endfor
                                    <td style="text-align: center">{{$sum_red}}</td>
                                </tr>
                                <tr>
                                    <td>Желтая зона</td>
                                    <?php
                                    $sum_yellow = 0;
                                    ?>
                                    @for($i=0; $i<count($data); $i++)
                                        <td style="text-align: center">{{$data[$i]['k1_yellow']}}</td>
                                        <?php
                                        $sum_yellow = $data[$i]['k1_yellow'] + $sum_yellow;
                                        ?>
                                    @endfor
                                    <td style="text-align: center">{{$sum_yellow}}</td>
                                </tr>
                                <tr>
                                    <td>Зеленая зона</td>
                                    <?php
                                    $sum_green = 0;
                                    ?>
                                    @for($i=0; $i<count($data); $i++)
                                        <td style="text-align: center">{{$data[$i]['k1_green']}}</td>
                                        <?php
                                        $sum_green = $data[$i]['k1_green'] + $sum_green;
                                        ?>
                                    @endfor
                                    <td style="text-align: center">{{$sum_green}}</td>
                                </tr>
                                <tr>
                                    <td rowspan="3">Критерий №2 <br> Способ устранения несоответствий</td>
                                    <td class="centered">Собственными силами</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Текущий ремонт</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Капитальный ремонт</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td rowspan="6">Критерий №3 <br> Причины возникновения несоответствий</td>
                                    <td class="centered">Подготовка персонала</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Производственная дисциплина</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Деградационный фактор</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Эксплуатационный фактор</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Производственный фактор</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Низкое качество ремонтных работ</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                            {{--                    <tbody>--}}
                            {{--                    @foreach ($rows as $item)--}}
                            {{--                        <tr>--}}
                            {{--                            <td></td>--}}
                            {{--                            <td></td>--}}
                            {{--                            <td></td>--}}
                            {{--                            <td></td>--}}
                            {{--                            <td></td>--}}
                            {{--                            <td></td>--}}
                            {{--                            <td></td>--}}
                            {{--                        </tr>--}}

                            {{--                    @endforeach--}}


                            {{--                    </tbody>--}}

                            {{--                </table>--}}


                        </div>
                    </div>





@endsection
