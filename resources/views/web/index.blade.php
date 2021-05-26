@extends('web.layouts.app')
@section('title')
    Главная страница ОПО
@endsection

@section('content')


@include('web.include.sidebar_opo')





    <div class="top_table">
@include('web.include.toptable')

    </div>




    <div class="inside_content">

        <div class="row_block centered">

{{--            <div class="third_size col_block centered">--}}

{{--                @include('charts.chart_ip_opo_singl')--}}
{{--                @include('charts.chart_ip_opo_singl_prognoz')--}}
{{--                @include('charts.chart_ip_opo_mini')--}}

{{--            </div>--}}

            <div class="third_size col_block main_info_col">
                <div class="padding_ins">
                    <div class="inside_main_info left"><p>Текущий показатель</p><img alt="" src="{{asset('replace/2.png')}}"></div>
                    <div class="inside_main_info right">
                        <p class="bold dark_grey_text clear">{{\App\Http\Controllers\OpoController::view_ip_opo($id)}}</p>
                        <img alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}" class="rate_icon clear">
                    </div>
                    <div class="clearfix"></div>
                    @include('charts.chart_ip_opo_mini')
                </div><div class="clearfix"></div>
            </div>

            <div class="third_size col_block main_info_col">
                <div class="padding_ins">
                    <div class="inside_main_info left"><p>Прогнозный показатель</p><img alt="" src="{{asset('replace/2.png')}}"></div>
                    <div class="inside_main_info right">
                        <p class="bold dark_grey_text clear">0.98</p>
                        <img alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}" class="rate_icon clear">
                    </div>
                    <div class="clearfix"></div>
                    @include('charts.chart_ip_opo_mini_prognoz')
                </div><div class="clearfix"></div>
            </div>

            <div class="third_size col_block main_info_col">
                <div class="padding_ins special">

                    <div class="tripple_cols">
                        <p class="title">Сутки:</p>
                          <p class="value @if ($mins_opos->status == '1') good
                                  @elseif ($mins_opos->status == '2') normal
                                  @elseif ($mins_opos->status == '3') critical
                                @else bad
                                @endif">{{$mins_opos->calc_to_status->status}}</p>
                           <div class="lined"></div>
                           <div class="value_numb">
                         <img alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}" class="rate_icon clear">
{{--            <i class="rate_icon clear zmdi zmdi-trending-up"></i>--}}
                            <p class="bold dark_grey_text clear">{{$mins_opos->ip_opo}}</p>
                     </div>
                    </div>

                    <div class="tripple_cols bordered">
                        <p class="title">Месяц:</p>
                        <p class="value @if ($mins_opo_months->status == '1') good
                                  @elseif ($mins_opo_months->status == '2') normal
                                  @elseif ($mins_opo_months->status == '3') critical
                                @else bad
                                @endif">{{$mins_opo_months->calc_to_status->status}}</p>
                        <div class="lined"></div>
                        <div class="value_numb">
                            <img alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}" class="rate_icon clear">
                            <p class="bold dark_grey_text clear">{{$mins_opo_months->ip_opo}}</p>
                        </div>
                    </div>

                    <div class="tripple_cols">
                        <p class="title">Год:</p>
                        <p class="value
                         @if ($mins_opo_year->status == '1') good
                                  @elseif ($mins_opo_year->status == '2') normal
                                  @elseif ($mins_opo_year->status == '3') critical
                                @else bad
                                @endif

                        " >{{$mins_opo_year->calc_to_status->status}}</p>
                        <div class="lined"></div>
                        <div class="value_numb">
                            <img alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}" class="rate_icon clear">
                            <p class="bold dark_grey_text clear">{{$mins_opo_year->ip_opo}}</p>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>





        <div class="period_block">
            <div class="period_header clear">
                <div class="ins_left clear"><a href="index.html#" class="active">Текущий показатель</a>
                    <a href="index.html#" class="">Прогнозный показатель</a></div>
                <div class="ins_right clear">
                    <a href="index.html#" class="">Выбрать период <span><img alt="" src="{{asset('assets/images/icons/arrow_bottom.svg')}}"></span></a>
                </div>
            </div>
            <div class="period_info">
<?php
//                $url = $get['page'];
////                $url = explode('/', $url);
////                $url = $url[1];
//
//                echo $url;
            ?>
                  @include('charts.chart_ip_opo')
{{--                <img alt="" src="replace/1.png">--}}
            </div>
        </div>

                 @include('web.include.futer_table')






    </div>



@endsection
