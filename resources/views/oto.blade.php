@extends('layout.app')
@section('title')
    ОПО
@endsection


{{--    <script src="/js/hchart/series-label.js"></script>--}}
{{--    <script src="/js/hchart/exporting.js"></script>--}}
{{--    <script src="/js/hchart/export-data.js"></script>--}}



@section('content')
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>--}}
    <script src="/js/hchart/highcharts.src.js"></script>
    <script src="/js/hchart/highcharts-more.js"></script>
    <script src="/js/hchart/solid-gauge.js"></script>
    {{--        <script type="text/javascript" src="/js/charts/chart_column_PK.js"></script>--}}
    <script type="text/javascript" src="/js/charts/chart_column_event.js"></script>

    <div class="chart">
        <div id="container">
            <div class="Nav_TU">
                <div class="row align-items-start">
                    @php
                        $result = App\Http\Controllers\ElemController::view_tu($elem_id, $oto);

                    //     echo '<BR>';
               //   foreach ($result->elem_to_oto as $nameOTO)
               //     {
                               echo 'Технологический блок "'.App\Models\ref_oto::find($oto)->descOTO;
                               echo '"   '.$result->nameObj;
                   //        }
                      //   echo '<BR>';

                         @endphp


                 </div>
            </div>

            <div class="Tab_TU">
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
{{--                                                                                                        @include('charts.chart_2')--}}
                                </div>
                            </div>
                            <!-- Предписания РТН -->
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2"> Обобщенный по регламентам </div>
{{--                                                                                                          @include('charts.chart_3')--}}
                                </div>
                            </div>
                            <div class="card card-group-row__card card-body card-body-x-lg flex-row align-items-center">
                                <div class="flex">
                                    <div class="card-header__title text-muted mb-2"> Обощенный элемента </div>
{{--                                                                                                           @include('charts.chart_4')--}}
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div id="Table_TU">
                <div class="Name_table"> <h3> Наличие несоответствий на выявленных при проведении проверки промышленной безопастности </h3> </div>
                <table class="table table-bordered border-primary">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">Несоответствия</th>
                        <th scope="col_2">Документ</th>
                        <th scope="col">Дата</th>
                        <th scope="col">Коэффициент</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td scope="row">Mark</td>
                        <td scope="row">Otto</td>
                        <td scope="row">@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td scope="row">Jacob</td>
                        <td scope="row">Thornton</td>
                        <td scope="row">@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td scope="row">@twitter</td>
                    </tr>
                    </tbody>
                </table>
                @foreach ($result->elem_to_tu as $tu) {
                @if ($tu->from_type_obor == $oto)
                @echo '<BR>';
                @echo $tu ;
                //   echo $tu->name;

                @endif
                @endforeach
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

        </div>
    </div>




    {{--    <script type="text/javascript" src="/js/charts/chart1.js"></script>--}}
    {{--    <script type="text/javascript" src="/js/charts/chart_column.js"></script>--}}
{{--    <script language="JavaScript">--}}
{{--        $(document).ready(function() {--}}

{{--            var old_date;--}}
{{--            var options = {--}}
{{--                title: {--}}
{{--                    text: 'Интегральный показатель регламентных значений'--}}
{{--                },--}}
{{--                chart: {--}}
{{--                    renderTo: 'chart2',--}}
{{--                    type: 'spline',--}}
{{--                    events: {--}}
{{--                        load: function () {--}}
{{--                            var series = this.series[0];--}}
{{--                            setInterval(() => {--}}
{{--                                $.getJSON({--}}
{{--                                    url: '/charts/fetch-data',--}}
{{--                                    method: 'GET',--}}
{{--                                    success: function (data) {--}}
{{--                                        if (data[data.length-1][0] > old_date) {--}}
{{--                                            var x = data[data.length - 1][0],--}}
{{--                                                y = data[data.length - 1][1];--}}
{{--                                            series.addPoint([x, y], true, true);--}}
{{--                                            old_date = data[data.length-1][0];--}}
{{--                                            console.log('Внутри');--}}
{{--                                        }--}}

{{--                                    }--}}

{{--                                });--}}
{{--                            }, 10000);--}}
{{--                        }--}}
{{--                    }--}}
{{--                },--}}
{{--                xAxis: {--}}
{{--                    type: 'datetime',--}}
{{--                },--}}
{{--                yAxis: {--}}
{{--                    min: 0,--}}
{{--                    max: 1,--}}
{{--                    title: {--}}
{{--                        text: 'Интегральный показатель'--}}
{{--                    },--}}
{{--                    minorGridLineWidth: 0,--}}
{{--                    gridLineWidth: 0,--}}
{{--                    alternateGridColor: null,--}}
{{--                    plotBands: [{ // Light air--}}
{{--                        from: 0,--}}
{{--                        to: 0.2,--}}
{{--                        color: 'rgba(250, 128, 114, 0.4)',--}}
{{--                        label: {--}}
{{--                            text: 'Авария',--}}
{{--                            style: {--}}
{{--                                color: '#606060'--}}
{{--                            }--}}
{{--                        }--}}
{{--                    }, { // Light breeze--}}
{{--                        from: 0.2,--}}
{{--                        to: 0.5,--}}
{{--                        color: 'rgba(255, 165, 0, 0.4)',--}}
{{--                        label: {--}}
{{--                            text: 'Инцедент',--}}
{{--                            style: {--}}
{{--                                color: '#606060'--}}
{{--                            }--}}
{{--                        }--}}
{{--                    }, { // Gentle breeze--}}
{{--                        from: 0.5,--}}
{{--                        to: 0.8,--}}
{{--                        color: 'rgba(240, 230, 140, 0.6)',--}}
{{--                        label: {--}}
{{--                            text: 'Низкий риск',--}}
{{--                            style: {--}}
{{--                                color: '#606060'--}}
{{--                            }--}}
{{--                        }--}}
{{--                    }, { // Moderate breeze--}}
{{--                        from: 0.8,--}}
{{--                        to: 1.0,--}}
{{--                        color: 'rgba(152, 251, 152, 0.3)',--}}
{{--                        label: {--}}
{{--                            text: 'Работа штатно',--}}
{{--                            style: {--}}
{{--                                color: '#606060'--}}
{{--                            }--}}
{{--                        }--}}
{{--                    }]--}}
{{--                },--}}

{{--                series: [{--}}
{{--                    name: 'Регламент'--}}
{{--                }]--}}
{{--            };--}}
{{--            $.getJSON({--}}
{{--                url: '/charts/fetch-data',--}}
{{--                method: 'GET',--}}
{{--                success: function (data) {--}}
{{--                    options.series[0].data = data;--}}
{{--                    var chart = new Highcharts.Chart(options);--}}
{{--                    old_date = data[data.length-1][0];--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}



{{--    </script>--}}




@endsection
