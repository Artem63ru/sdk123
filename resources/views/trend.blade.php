@extends('layout.app')
@section('title')
    Элемент
@endsection
@section('content')
<script language = "JavaScript">
    $(document).ready(function() {
        var old_date;
        var options = {
            title: {
                text: 'Интегральный показатель регламентных значений'
            },
            chart: {
                renderTo: 'container',
                type: 'spline',
                events: {
                    load: function() {
                        var series = this.series[0];
                        setInterval(() => {
                            $.getJSON('json.php', function(data) {
                                if (data[data.length-1][0]>old_date) {
                                    var x = data[data.length-1][0],
                                        y = data[data.length-1][1];
                                    series.addPoint([ x, y ], true, true);
                                    old_date = data[data.length-1][0];
                                }
                            });
                        }, 1000);
                    }
                }
            },
            xAxis :{
                type: 'datetime',
            },
            yAxis :{
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
            },

            series: [{
                name: 'Регламент'
            }]
        };
        $.getJSON('json.php', function(data) {
            options.series[0].data = data;
            var chart = new Highcharts.Chart(options);
            old_date = data[data.length-1][0];
        });
    });

</script>

<script type="text/javascript" src="new.js" ></script>

<script type="text/javascript">
    //обработчик
    jQuery(document).ready(function () {
        jQuery("#jquery-accordion-menu").jqueryAccordionMenu();

    });
    //активный класс
    $(function(){
        $("#demo-list li").click(function(){
            $("#demo-list li.active").removeClass("active")
            $(this).addClass("active");
        })
    })

    $('tr').each(function(){
        $(this).find('td').each(function(){
            if ($(this).html() == 'C1') {
                $(this).parent('tr').addClass('empty1');
                return false;
            }
            if ($(this).html() == 'C2') {
                $(this).parent('tr').addClass('empty2');
                return false;
            }
        });
    });
</script>
<div class="chart">
    <div id = "container">
    </div>
</div>
@endsection
