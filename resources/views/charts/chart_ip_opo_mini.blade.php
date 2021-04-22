


<div id="chart_mini" style="height: 100px; padding-top: 20px"></div>

<script language="JavaScript">
    $(document).ready(function() {

        var old_date;
        var options = {
            title: {
                text: 'Интегральный показатель ОПО' ,
                style: {
                    display: 'none'
                }
            },
            chart: {
                renderTo: 'chart_mini',
                type: 'area',
                plotAreaWidth: 300,
                plotAreaHeight: 75,


                events: {
                    load: function () {
                        var series = this.series[0];
                        setInterval(() => {
                            // $.getJSON({
                            //     url: '/charts/fetch-data',
                            //     method: 'GET',
                            //     success: function (data) {
                            data = {{\App\Http\Controllers\Opo_dayController::view_day($id)}}
                                    if (data[data.length-1][0] > old_date) {
                                        var x = data[data.length - 1][0],
                                            y = data[data.length - 1][1];
                                        series.addPoint([x, y], true, true);
                                        old_date = data[data.length-1][0];
                                        console.log('Внутри');
                                    }

                           //     }

                         //   });
                        }, 10000);
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
                minorGridLineWidth: 0,
                gridLineWidth: 0,
                alternateGridColor: null,
                // plotBands: [{ // Light air
                //     from: 0,
                //     to: 0.2,
                //     color: 'rgba(250, 128, 114, 0.4)',
                //     label: {
                //         text: 'Авария',
                //         style: {
                //             color: '#606060'
                //         }
                //     }
                // }, { // Light breeze
                //     from: 0.2,
                //     to: 0.5,
                //     color: 'rgba(255, 165, 0, 0.4)',
                //     label: {
                //         text: 'Инцедент',
                //         style: {
                //             color: '#606060'
                //         }
                //     }
                // }, { // Gentle breeze
                //     from: 0.5,
                //     to: 0.8,
                //     color: 'rgba(240, 230, 140, 0.6)',
                //     label: {
                //         text: 'Низкий риск',
                //         style: {
                //             color: '#606060'
                //         }
                //     }
                // }, { // Moderate breeze
                //     from: 0.8,
                //     to: 1.0,
                //     color: 'rgba(152, 251, 152, 0.3)',
                //     label: {
                //         text: 'Работа штатно',
                //         style: {
                //             color: '#606060'
                //         }
                //     }
                // }]
            },
            credits: {
                enabled: false
            },

            series: [{
                 name: 'IP ОПО',
                marker: {
                    enabled: false
                },
            }]
        };
        // $.getJSON({
        //     url: '/charts/fetch-data',
        //     method: 'GET',
        //     success: function (data) {
                data = {{\App\Http\Controllers\Opo_dayController::view_day($id)}}
                options.series[0].data = data;
                var chart = new Highcharts.Chart(options);
                old_date = data[data.length-1][0];
        //     }
        // });
    });

</script>
