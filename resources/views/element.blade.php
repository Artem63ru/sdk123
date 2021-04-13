@extends('layout.app')
@section('title')
    ОПО
@endsection


{{--    <script src="/js/hchart/series-label.js"></script>--}}
{{--    <script src="/js/hchart/exporting.js"></script>--}}
{{--    <script src="/js/hchart/export-data.js"></script>--}}



@section('content')

    <script src="/js/hchart/highcharts.src.js"></script>
    <script src="/js/hchart/highcharts-more.js"></script>
    <script src="/js/hchart/solid-gauge.js"></script>
    {{--        <script type="text/javascript" src="/js/charts/chart_column_PK.js"></script>--}}
    <script type="text/javascript" src="/js/charts/chart_column_event.js"></script>

    <div class="chart">
        <div id="container">
            <div class="Name_OPO">
                <!--  Интегральный показатель ОПО равен <span class="jquery-accordion-menu-label"> 0,987 </span> -->
                <div class="card">
                    <div class="card-header card-header-large bg-white">
                        <h4 class="card-header__opo">
                            @php
                                $result = App\Http\Controllers\OpoController::id_elem_from_name($elem);
                             //   echo $result;
                             $elem_id = $result->idObj;
                            @endphp
                            {{$result->descObj}} {{$result->nameObj}} {{$elem_id}}
                        </h4>
                    </div>
                    <div class="row card-group-row">
                        <div class="col-lg-4 col-md-6 card-group-row__col">
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2">Показатель IP <br><br></div>
                                    @php
                                        $ip_elem = App\Http\Controllers\OpoController::ip_elem($result->idObj);
                                    //   echo $ip_elem->ip_elem;
                                    @endphp
                                    <div class="text-amount text-success">{{$ip_elem->ip_elem}}<i class="material-icons text-success">arrow_upward</i>
                                    </div>
                                    <div class="text-stats text-success">Работа штатно</div>
                                </div>

                            </div>
                            <!-- Показатель эффективности -->
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2">Показатель эффективности</div>
                                    <div class="text-amount">{{$result->elem_to_calc->take(-1)->first()->op_m}}</div>
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
                                    <div class="text-amount-min">А38-00528-0011</div>
                                </div>
                            </div>
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2">Дата ввода в эксплуатацию ОПО</div>
                                    <div class="text-amount-min">2010-10-05</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="Name_OPO">
                <!--  Интегральный показатель ОПО равен <span class="jquery-accordion-menu-label"> 0,987 </span> -->
                <div class="card">
                    <div class="row card-group-row">
                        <div class="col-lg-4 col-md-6 card-group-row__col">
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2"> Показатель IP </div>
                                    @include('charts.chart_1')
                                </div>

                            </div>
                            <!-- Показатель эффективности -->
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2"> Обобщенный по сценария </div>
                                                                    @include('charts.chart_2')
                                </div>
                            </div>
                            <!-- Предписания РТН -->
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2"> Обобщенный по регламентам </div>
                                                                      @include('charts.chart_3')
                                </div>
                            </div>
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2"> Обощенный элемента </div>
                                                                        @include('charts.chart_4')
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
            @php
                //      $ip_elem = App\Http\Controllers\OpoController::ip_elem(110);
                      echo  '<div class="card-header__title text-muted mb-1"> Декомпозиция на ТБ <BR></div>';
                      $ip_elem1 = App\Http\Controllers\ElemController::view_oto($result->idObj);
            @endphp
        </div>
    </div>




    {{--    <script type="text/javascript" src="/js/charts/chart1.js"></script>--}}
    {{--    <script type="text/javascript" src="/js/charts/chart_column.js"></script>--}}
    <script language="JavaScript">
        $(document).ready(function() {

            var old_date;
            var options = {
                title: {
                    text: 'Интегральный показатель регламентных значений'
                },
                chart: {
                    renderTo: 'chart2',
                    type: 'spline',
                    events: {
                        load: function () {
                            var series = this.series[0];
                            setInterval(() => {
                                $.getJSON({
                                    url: '/charts/fetch-data',
                                    method: 'GET',
                                    success: function (data) {
                                        if (data[data.length-1][0] > old_date) {
                                            var x = data[data.length - 1][0],
                                                y = data[data.length - 1][1];
                                            series.addPoint([x, y], true, true);
                                            old_date = data[data.length-1][0];
                                            console.log('Внутри');
                                        }

                                    }

                                });
                            }, 10000);
                        }
                    }
                },
                xAxis: {
                    type: 'datetime',
                },
                yAxis: {
                    min: 0,
                    max: 1,
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
                },

                series: [{
                    name: 'Регламент'
                }]
            };
            $.getJSON({
                url: '/charts/fetch-data',
                method: 'GET',
                success: function (data) {
                    options.series[0].data = data;
                    var chart = new Highcharts.Chart(options);
                    old_date = data[data.length-1][0];
                }
            });
        });



    </script>




@endsection
