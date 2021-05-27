

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>



<script language="JavaScript">


    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end



    // Create chart instance
    var chart = am4core.create("chartdiv1",
        am4charts.RadarChart,
        am4core.addLicense("ch-custom-attribution"));

    // Add data
    chart.data = [{
        "category": "ОП ТБ",
        "value": {{$this_calc_tb->op_tb}},
        "full": 1
    }];

    // Make chart not full circle
    chart.startAngle = -250;
    chart.endAngle = 70;
    chart.innerRadius = am4core.percent(60);
    chart.colors.saturation = 0.9;


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

    var yearLabel = chart.radarContainer.createChild(am4core.Label);
    yearLabel.text = "[bold]{{$this_calc_tb->op_tb}}[/]";
    yearLabel.horizontalCenter = 'middle'
    yearLabel.verticalCenter = 'middle'
    yearLabel.x = am4core.percent(100);
    yearLabel.y = am4core.percent(100);
    yearLabel.fontSize = 40; // irrelevant, can be omitted



    // Create series
    var series1 = chart.series.push(new am4charts.RadarColumnSeries());
    series1.dataFields.valueX = "full";
    series1.dataFields.categoryY = "category";
    series1.clustered = false;
    series1.columns.template.fill = new am4core.InterfaceColorSet().getFor("alternativeBackground");
    series1.columns.template.fillOpacity = 0.04;
    series1.columns.template.cornerRadiusTopLeft = 60;
    series1.columns.template.strokeWidth = 0;
    series1.columns.template.radarColumn.cornerRadius = 60;

    /* var gradient = new am4core.LinearGradient();
    gradient.addColor(am4core.color("red"));
    gradient.addColor(am4core.color("green")); */

    // let rgm = new am4core.RadialGradientModifier();
    // rgm.brightnesses.push(-0.8, -0.8, -0.8, 0, - 0.3);


    var series2 = chart.series.push(new am4charts.RadarColumnSeries());
    series2.dataFields.valueX = "value";
    series2.dataFields.categoryY = "category";
    series2.clustered = false;
    series2.columns.template.fill = am4core.color("#4990ff");
    // series2.columns.template.fillModifier = rgm;
    // series2.columns.template.strokeModifier = rgm;
    // series2.columns.template.strokeOpacity = 0.4;
    // series2.columns.template.strokeWidth = 0;
    series2.columns.template.tooltipText = "{category}: [bold]{value}[/]";
    series2.columns.template.radarColumn.cornerRadius = 60;


    // Add cursor
    //chart.cursor = new am4charts.RadarCursor();
</script>
