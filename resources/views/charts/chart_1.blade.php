
<style>
    #chartdiv {
        width: 100%;
        height: 150px;
    }

</style>

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
{{--<div id="chartdiv"></div>--}}


<script language="JavaScript">
    /**
     * ---------------------------------------
     * This demo was created using amCharts 4.
     *
     * For more information visit:
     * https://www.amcharts.com/
     *
     * Documentation is available at:
     * https://www.amcharts.com/docs/v4/
     * ---------------------------------------
     */

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end



    // Create chart instance
    var chart = am4core.create("chartdiv",
        am4charts.RadarChart,
        am4core.addLicense("ch-custom-attribution"),
        {
            "autoMargins": false,
            "marginTop": 2,
            "marginBottom": 2,
            "marginLeft": 2,
            "marginRight": 2
        }

    );

    // Add data
    chart.data = [{
        "category": "Rh",
        "value": 0.80,
        "full": 1
    }];
    // Make chart not full circle
    chart.startAngle = -250;
    chart.endAngle = 70;
    chart.innerRadius = am4core.percent(60);

    // Set number format
    //chart.numberFormatter.numberFormat = "#.#";


    // Create axes
    var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "category";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.grid.template.strokeOpacity = 0;
    categoryAxis.renderer.grid.template.disabled = true;

    //categoryAxis.renderer.labels.template.horizontalCenter = "right";
    //categoryAxis.renderer.labels.template.fontWeight = 100;
    /* categoryAxis.renderer.labels.template.adapter.add("fill", function(fill, target) {
      return (target.dataItem.index >= 0) ? chart.colors.getIndex(target.dataItem.index) : fill;
    }); */
    categoryAxis.renderer.minGridDistance = 40;

    var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
    valueAxis.renderer.grid.template.strokeOpacity = 0;
    valueAxis.min = 0;
    valueAxis.max = 1;
    valueAxis.renderer.labels.template.disabled = true
    valueAxis.strictMinMax = true;

    // Create series
    var series1 = chart.series.push(new am4charts.RadarColumnSeries());
    series1.dataFields.valueX = "full";
    series1.dataFields.categoryY = "category";
    series1.clustered = false;
    series1.columns.template.fill = new am4core.InterfaceColorSet().getFor("alternativeBackground");
    series1.columns.template.fillOpacity = 0.05;
    series1.columns.template.cornerRadiusTopLeft = 40;
    series1.columns.template.strokeWidth = 0;
    series1.columns.template.radarColumn.cornerRadius = 40;

    var series2 = chart.series.push(new am4charts.RadarColumnSeries());
    series2.dataFields.valueX = "value";
    series2.dataFields.categoryY = "category";
    series2.clustered = false;
    series2.columns.template.strokeWidth = 0;
    series2.columns.template.tooltipText = "{category}: [bold]{value}[/]";
    series2.columns.template.radarColumn.cornerRadius = 40;

    series2.columns.template.adapter.add("fill", function(fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
    });

    // Add cursor
    //chart.cursor = new am4charts.RadarCursor();
</script>
