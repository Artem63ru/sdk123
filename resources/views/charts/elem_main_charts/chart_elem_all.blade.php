


<div id="chart_elems"  ></div>

<script language="JavaScript">
    $(document).ready(function() {
        var data_path = '/charts/fetch-data_elem/{{$id_obj}}';
        var old_date;
        var options = {
            title: {
                text: 'Интегральный показатель ОПО' ,
                style: {
                    display: 'none'
                }
            },
            chart: {
                renderTo: 'chart_elems',
                type: 'area',
                width: 1100,
                height: 190,



                events: {
                    load: function () {
                        var series = this.series[0];
                        setInterval(() => {
                            $.getJSON({
                                url: data_path,
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
            }//,
                // {
                //     name: 'УППГ-1',
                //     data: [
                //         1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
                //         1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
                //         1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
                //         1, 1, 1, 1, 1, 1, 1, 1, 1, 1
                //     ]
                // }
            ]
        };
        $button = $('.opo_page_square');
        $button.click(function () {
          //  var series = chart.series[0];
            var clickId = $(this).attr('id');
            if (clickId == 1) {
                data_path = '/charts/fetch-data_elem/{{$id_obj}}';
            }
            if (clickId == 2) {
                data_path = '/charts/fetch-data_elem_op_m/{{$id_obj}}';
            }  if (clickId == 3) {
                data_path = '/charts/fetch-data_elem_op_r/{{$id_obj}}';
            }  if (clickId == 4) {
                data_path = '/charts/fetch-data_elem_op_el/{{$id_obj}}';
            }
            $.getJSON({
                url: data_path,
                method: 'GET',
                success: function (data) {
                    options.series[0].data = data;
                    var chart = new Highcharts.Chart(options);
                    old_date = data[data.length-1][0];
                }
            });
        });


        $.getJSON({
            url: data_path,
            method: 'GET',
            success: function (data) {
                options.series[0].data = data;
                var chart = new Highcharts.Chart(options);
                old_date = data[data.length-1][0];
            }
        });
    });

</script>
