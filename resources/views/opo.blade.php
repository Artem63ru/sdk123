@extends('layout.app')
@section('title')
    ОПО
@endsection
@section('content')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript" src="/js/charts/chart_column_PK.js"></script>
    <script type="text/javascript" src="/js/charts/chart_column_event.js"></script>
    <div class="chart">
        <div id="container">
            <div class="Name_OPO">

            <!--  Интегральный показатель ОПО равен <span class="jquery-accordion-menu-label"> 0,987 </span> -->
                <div class="card">
                    <div class="card-header card-header-large bg-white">
                        <h4 class="card-header__opo">Страница ОПО {{$opo}}</h4>
                    </div>
                    <div class="row card-group-row">
                        <div class="col-lg-4 col-md-6 card-group-row__col">
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2">Показатель IP <br><br></div>

                                    <div class="text-amount text-success">
                                        @php
                                            $result = App\Http\Controllers\OpoController::id_opo_from_name($opo);
                                            $ip_opo = App\Http\Controllers\OpoController::ip_opo($result->idOPO);
                                            echo $ip_opo;
                                        @endphp
                                        <i class="material-icons text-success">arrow_upward</i>
                                    </div>
                                    <div class="text-stats text-success">Работа штатно</div>
                                </div>

                            </div>
                            <!-- Показатель эффективности -->
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2">Показатель эффективности</div>
                                    <div class="text-amount">98%</div>
                                </div>
                            </div>
                            <!-- Предписания РТН -->
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2">Кол-во предписаний Ростехнадзора
                                    </div>
                                    <div class="text-amount">0</div>
                                </div>
                            </div>
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2">Регистрационный номер ОПО</div>
                                    <div class="text-amount-min">{{$result->regNumOPO}}</div>
                                </div>
                            </div>
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2">Дата ввода в эксплуатацию ОПО</div>
                                    <div class="text-amount-min">{{$result->dateReg}}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="Name_OPO_digr">
                @include('charts.chart_ip_opo')
            </div>
            <div id="Name_OPO_digr">
                <div id="chart2">
                </div>

            </div>
            <div id="Name_OPO_digr">
                <div id="chart3">
                </div>
            </div>
            <div id="Name_OPO_digr">
                <div id="chart4">
                </div>
            </div>
        </div>
        <div id="Navigator_opo">

            <button class="OPO_nav" onclick="window.location.href = '/opo_plan/{{$opo}}';"> Ситуационный план </button>
            <button class="OPO_nav" onclick="window.location.href = '/opo/{{$opo}}';"> Общие сведения</button>
            <button class="OPO_nav"> Показатель Эффективности производственного контроля</button>
            <button class="OPO_nav"> Документация</button>
        </div>
    </div>
{{--    <script src="/js/hchart/highcharts.js"></script>--}}
{{--    <script src="/js/hchart/series-label.js"></script>--}}
{{--    <script src="/js/hchart/exporting.js"></script>--}}
{{--    <script src="/js/hchart/export-data.js"></script>--}}


    <script language = "JavaScript">
        $(document).ready(function() {
            var    chart= {
                type: 'spline'
            };
            var title = {
                text: 'Интегральный показатель ОПО'
            };
            var xAxis = {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            };
            var yAxis = {
                title: {
                    text: 'ИП ОПО'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }],
                min:0,
                max:1,
                title: {
                    text: 'Интегральный показатель'
                },
                minorGridLineWidth: 0,
                gridLineWidth: 0,
                alternateGridColor: null,
                plotBands: [{ // Light air
                    from: 0,
                    to: 0.2,
                    color: 'rgba(250, 128, 114, 0.4)',
                    label: {
                        text: 'Авария',
                        style: {
                            color: '#606060'
                        }
                    }
                }, { // Light breeze
                    from: 0.2,
                    to: 0.5,
                    color: 'rgba(255, 165, 0, 0.4)',
                    label: {
                        text: 'Инцедент',
                        style: {
                            color: '#606060'
                        }
                    }
                }, { // Gentle breeze
                    from: 0.5,
                    to: 0.8,
                    color: 'rgba(240, 230, 140, 0.6)',
                    label: {
                        text: 'Низкий риск',
                        style: {
                            color: '#606060'
                        }
                    }
                }, { // Moderate breeze
                    from: 0.8,
                    to: 1.0,
                    color: 'rgba(152, 251, 152, 0.3)',
                    label: {
                        text: 'Работа штатно',
                        style: {
                            color: '#606060'
                        }
                    }
                }]
            };

            var tooltip = {
                valueSuffix: ''
            }
            var legend = {
                layout: 'horizont',
                align: 'top',
                verticalAlign: 'horizont',
                borderWidth: 0
            };
            var series =  [{
                name: 'OPr',
                data: [1.0, 0.9, 0.6, 0.7, 0.7, 0.7, 0.8,
                    0.5, 0.8, 0.8, 0.9, 0.8],
                marker: {
                    enabled: false
                }
            }
            ];

            var json = {};
            json.chart = chart;
            json.title = title;
            json.xAxis = xAxis;
            json.yAxis = yAxis;
            json.tooltip = tooltip;
            json.legend = legend;
            json.series = series;


            $('#chart3').highcharts(json);
        });
    </script>






@endsection
