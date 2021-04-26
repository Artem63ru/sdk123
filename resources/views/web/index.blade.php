@extends('web.layouts.app')
@section('title')
    Главная ОПО
@endsection

@section('content')
{{--    <script src="https://code.highcharts.com/highcharts.js"></script>--}}
{{--    <script type="text/javascript" src="/js/charts/chart_column_PK.js"></script>--}}
{{--    <script type="text/javascript" src="/js/charts/chart_column_event.js"></script>--}}
    <div class="sidebar">
        <div class="inside_sidebar">

            <div class="sidebar_top">
                <div class="sidebar_top_single main rounded white_bg">
                    <a href="index.html#">
                        <div class="sidebar_top_single info">
                            <div class="class_rate good">1</div>
                            <div class="class_name">
                                <p class="bold blue_text">ПАО Газпром</p>
                                <p class="grey_text">ПАО "Газпром автоматизация"</p>
                            </div>
                        </div>
                        <div class="more_arrow"><img alt="Далее" src="{{asset('assets/images/icons/arrow_right.svg')}}" class="more_arrow_icon"></div>
                    </a>
                </div>
                <div class="sidebar_top_single main rounded white_bg">
                    <a href="index.html#">
                        <div class="sidebar_top_single info">
                            <div class="class_rate good">1</div>
                            <div class="class_name">
                                <p class="bold blue_text">ГД Астрахань</p>
                                <p class="grey_text">ООО "Газпром добыча Астрахань"</p>
                            </div>
                        </div>
                        <div class="more_arrow"><img alt="Далее" src="{{asset('assets/images/icons/arrow_right.svg')}}" class="more_arrow_icon"></div>
                    </a>
                </div>
            </div>

            <div class="sidebar_bottom rounded">



                @foreach ($opo as $opo_val)
                <div class="sidebar_bottom_single">
                    <a href="/opo/{{$opo_val->idOPO}}">
                        <div class="clear">
                            <div class="single_fond_name rounded">
                                <p class="light_blue_text">{{$opo_val->descOPO}}</p>
                                <p class="grey_text">ООО "Газпром добыча Астрахань"</p>
                            </div>
                            <div class="single_fond_rate clear">
{{--                                <p class="bold dark_grey_text clear">{{\App\Http\Controllers\OpoController::ip_opo($opo_val->idOPO)}}</p>--}}
                                <p class="bold dark_grey_text clear">{{ $ip_opo=$opo_val->opo_to_calc1->first()->ip_opo}}</p>
{{--opo_to_calci()->orderBy('id', 'desc')->limit(1)->get()--}}
                                <img alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}" class="rate_icon clear">
                            </div>
                        </div>
                        <div class="clearfix"></div>
{{--                        <div class="rate_line"></div>--}}
                        <div class="progress">
                            @php
                        //    $ip_opo=$opo_val->opo_to_calc1->first()->ip_opo*100
                            @endphp
                            <div class="progress-bar
                            @if ($ip_opo<0.3)
                                bg-danger"
                            @elseif  ($ip_opo<0.6 && $ip_opo>0.3 )
                                bg-warning"
                            @elseif  ($ip_opo<1 && $ip_opo>0.6 )
                                bg-success"
                            @endif
                               role="progressbar" style="width: {{$ip_opo*100}}%" aria-valuenow="0.3" aria-valuemin="0" aria-valuemax="1"></div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>



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
                          <p class="value">{{$mins_opos->calc_to_status->status}}</p>
                           <div class="lined"></div>
                           <div class="value_numb">
                         <img alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}" class="rate_icon clear">
{{--            <i class="rate_icon clear zmdi zmdi-trending-up"></i>--}}
                            <p class="bold dark_grey_text clear">{{$mins_opos->ip_opo}}</p>
                     </div>
                    </div>

                    <div class="tripple_cols bordered">
                        <p class="title">Месяц:</p>
                        <p class="value">{{$mins_opo_months->calc_to_status->status}}</p>
                        <div class="lined"></div>
                        <div class="value_numb">
                            <img alt="Показатель" src="{{asset('assets/images/icons/rate/good.svg')}}" class="rate_icon clear">
                            <p class="bold dark_grey_text clear">{{$mins_opo_months->ip_opo}}</p>
                        </div>
                    </div>

                    <div class="tripple_cols">
                        <p class="title">Год:</p>
                        <p class="value">{{$mins_opo_year->calc_to_status->status}}</p>
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
                @include('charts.chart_ip_opo')
{{--                <img alt="" src="replace/1.png">--}}
            </div>
        </div>

                 @include('web.include.futer_table')






    </div>



@endsection
