{{--@extends('web.layouts.app')--}}
{{--@section('title')--}}
{{--    Главная страница ОПО--}}
{{--@endsection--}}

{{--@section('content')--}}


    @push('datapicker')
    <link rel="stylesheet" href="{{asset('js/jquery/jquery-ui.css')}}">
    <script src="{{asset('js/jquery/jquery1.12.4.js')}}"></script>
    <script src="{{asset('js/jquery/jquery-ui.js')}}"></script>
    @endpush


<script language="JavaScript">
    var ids = 1;

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10) {  dd = '0'+dd }
    if(mm<10) {  mm = '0'+mm }
    var _time = yyyy + '-' + mm + '-' + dd;
    var chart;
    var old_date;
    var options;
    var flag_ip = true;  // если True then IP_OPO and False then IP_OPO_PROact
    var path = '/charts/fetch-data/{{$id}}/data/'+_time;
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: 'Предыдущий',
        nextText: 'Следующий',
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);

    $( function() {
        var dateFormat = 'yyyy-mm-dd',
           from = $( "#from" )
                .datepicker({
                     defaultDate: "+0D",
                    // changeMonth: true,
                    // numberOfMonths: 1,
                    dateFormat: "yy-mm-dd",
                    showButtonPanel: true,
                    maxDate: "+0D",
                    onSelect: function(dateText) {
                        _time = this.value;
                        if (flag_ip){
                            path = '/charts/fetch-data/{{$id}}/data/'+_time;
                        }
                        else {
                            path = '/charts/fetch-data-prognoz/{{$id}}/data/'+_time;
                        }

                        // console.log(path);
                        $.getJSON({
                            url: path,
                            method: 'GET',
                            success: function (data) {
                                options.series[0].data = data;
                                chart = new Highcharts.Chart(options);
                                old_date = data[data.length-1][0];
                                chart.series[0].color = colors_charts(data[0][1]);
                                chart.series[0].redraw();

                            }
                        });
                    }
                })
                .on( "change", function() {
                    to.datepicker( "option", "minDate", getDate( this ) );
                }),
            to = $( "#to" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1
            })
                .on( "change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ) );
                });

        function getDate( element ) {
            var date;
            try {
                date = $.datepicker.parseDate( dateFormat, element.value );

            } catch( error ) {
                date = null;
            }

            return date;
        }
    } );
    function colors_charts(params) {
        if ((params<=1.00)&&(params>0.8)) {
            return "rgba(70,183,78,0.5)";
        }
        if ((params<=0.80)&&(params>0.5)) {
            return  "#fae6ae";

        }
        if ((params<=0.50)&&(params>0.2)) {
            return  "#f2b140";

        }
        if ((params<=0.20)&&(params>0.00)) {
            return  "rgba(234,87,87,0.5)";
        }
    }
    $(document).ready(function() {
        $("#ip-opo").click(function() {
            // действия, которые будут выполнены при наступлении события...
            flag_ip = true;
            // console.log($(this).text())
           path = '/charts/fetch-data/{{$id}}/data/'+_time;
            // console.log(path);
            $.getJSON({
                url: path,
                method: 'GET',
                success: function (data) {
                    options.series[0].data = data;
                    chart = new Highcharts.Chart(options);
                    old_date = data[data.length-1][0];
                    chart.series[0].color = colors_charts(data[0][1]);
                    chart.series[0].redraw();

                }
            });

        });
        $("#ip-opo-pro").click(function() {
            // действия, которые будут выполнены при наступлении события...
            flag_ip = false;
            // console.log($(this).text())
            path = '/charts/fetch-data-prognoz/{{$id}}/data/'+_time;
            // console.log(path);
            $.getJSON({
                url: path,
                method: 'GET',
                success: function (data) {
                    options.series[0].data = data;
                    chart = new Highcharts.Chart(options);
                    old_date = data[data.length-1][0];
                    chart.series[0].color = colors_charts(data[0][1]);
                    chart.series[0].redraw();

                }
            });

        });
        // console.log(ids_to_kv);

        options = {
            title: {
                text: 'Интегральный показатель ОПО' ,
                style: {
                    display: 'none'
                }
            },
            chart: {
                renderTo: 'chart1',
                type: 'area',
                plotAreaWidth: 300,
                plotAreaHeight: 75,


                events: {
                    load: function () {
                        var series = this.series[0];
                        setInterval(() => {
                            $.getJSON({
                                url: path,
                                method: 'GET',
                                success: function (data) {
                                    if (data[data.length-1][0] > old_date) {
                                        var x = data[data.length - 1][0],
                                            y = data[data.length - 1][1];
                                        series.addPoint([x, y], true, true);
                                        old_date = data[data.length-1][0];
                                        series.color = colors_charts(data[0][1]);
                                        series.redraw();
                                        console.log('Внутри');
                                    }

                                }

                            });
                        }, 60000);
                    }
                }
            },
            xAxis: {
                type: 'datetime',
                gridLineWidth: 1
            },
            legend: {
                enabled: false
            },

            yAxis: {
                min: 0,
                max: 1,
                title: {
                    text: 'Интегральный показатель',
                    style: {
                        display: 'none'
                    }
                },
                labels: {
                    enabled:false
                },
                minorGridLineWidth: 0,
                gridLineWidth: 0,
                alternateGridColor: null,

            },
            credits: {
                enabled: false
            },

            series: [{
                name: 'Текущий показатель',
                marker: {
                    enabled: false
                },
            }]
        };
        $.getJSON({
            url: path,
            method: 'GET',
            success: function (data) {

                options.series[0].data = data;
                chart = new Highcharts.Chart(options);
                old_date = data[data.length-1][0];
                chart.series[0].color = colors_charts(data[0][1]);
                chart.series[0].redraw();


            }
        });

    });

</script>
    <div class="period_block">
        <div class="period_header clear">
            <div class="ins_left clear">
                <button class="button" id="ip-opo" > Интегральный показатель </button>
                <button class="button" id="ip-opo-pro" > Прогнозный показатель </button>
               </div>
            <div style="margin-top: -10px" class="ins_right clear">
                <p class="light_blue_text"> Выбор Даты :   <input text id="from" name="from" autocomplete="off" ></p>
            </div>
        </div>
        <div class="period_info">
            <div id="chart1" style="height: 200px; padding-top: 10px"></div>
{{--            @include('charts.chart_ip_opo')--}}
            {{--                <img alt="" src="replace/1.png">--}}
        </div>
        </div>


{{--    <label for="to">to</label>--}}
{{--    <input id="to" name="to">--}}

{{--    @include('web.include.script-lib.am4')--}}
{{--    @include('web.include.script-lib.highcharts')--}}
{{--@endsection--}}
