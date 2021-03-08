@extends('layout.user')

@section('css')
<style>
#chart1 {
  width: 100%;
  height: 500px;
}

#chart2 {
  width: 100%;
  height: 500px;
}

#chart3 {
  width: 100%;
  height: 500px;
}
</style>
@endsection

@section('content')
<section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                            <h3>Informasi</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row blog-grid">
                                <div class="col-md-12">
                                    <div class="course-box">
                                        
                                        <div class="course-details">
                                            <h4>
                                                <small>KKN</small>
                                                <a href="blog-single.html" title="">Data Persebaran Mahasiswa KKN Universitas Sebelas Maret</a>
                                            </h4>
                                            <p>Silakan melihat data dibawah ini. </p>
                                        </div><!-- end details -->
                                        <div class="image-wrap entry">
                                          <div id="chart1"></div>
                                        </div><!-- end image-wrap -->
                                    </div><!-- end box -->
                                </div><!-- end col -->

                                <div class="col-md-12">
                                    <div class="course-box">
                                        
                                        <div class="course-details">
                                            <h4>
                                                <small>Tips & Tricks</small>
                                                <a href="blog-single.html" title="">Working with team members for new projects</a>
                                            </h4>
                                            <p>Duis id aliquam metus, et consectetur risus. Praesent dictum augue id velit mattis aliquet. Aliquam faucibus sollicitudin libero, sit amet massa nunc. </p>
                                        </div><!-- end details -->
                                        <div class="image-wrap entry">
                                          <div id="chart2"></div>
                                        </div><!-- end image-wrap -->
                                        
                                    </div><!-- end box -->
                                </div><!-- end col -->

                                <div class="col-md-12">
                                    <div class="course-box">
                                        <div class="course-details">
                                            <h4>
                                                <small>Tips & Tricks</small>
                                                <a href="blog-single.html" title="">Buy a Macbook and learn code today like a pro</a>
                                            </h4>
                                            <p>Nulla nisl velit, lobortis vel luctus eu, rutrum ac elit. Donec nec condimentum libero. Maecenas rutrum sit amet mi vel hendrerit. Praesent tempor id. </p>
                                        </div><!-- end details -->
                                        <div class="image-wrap entry">
                                          <div id="chart3"></div>
                                        </div><!-- end image-wrap -->
                                    </div><!-- end box -->
                                </div><!-- end col -->

                            </div><!-- end row -->

                            <hr class="invis">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="pagination">
                                        <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                                        <li class="active"><a href="javascript:void(0)">1</a></li>
                                        <li><a href="javascript:void(0)">2</a></li>
                                        <li><a href="javascript:void(0)">3</a></li>
                                        <li><a href="javascript:void(0)">...</a></li>
                                        <li><a href="javascript:void(0)">&raquo;</a></li>
                                    </ul>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end col -->

                    </div><!-- end row -->
                </div><!-- end boxed -->
            </div><!-- end container -->
        </section>
@endsection

@section('js')
<script src="{{asset('amcharts4/core.js')}}"></script>
<script src="{{asset('amcharts4/charts.js')}}"></script>
<script src="{{asset('amcharts4/themes/animated.js')}}"></script>
<script src="{{asset('amcharts4/themes/material.js')}}"></script>
<script src="{{asset('amcharts4/themes/animated.js')}}"></script>
<script src="{{asset('amcharts4/themes/frozen.js')}}"></script>

<!-- Chart code -->


<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chart1", am4charts.PieChart);

// Add data
chart.data = [ {
  "country": "Lithuania",
  "litres": 501.9
}, {
  "country": "Czechia",
  "litres": 301.9
}, {
  "country": "Ireland",
  "litres": 201.1
}, {
  "country": "Germany",
  "litres": 165.8
}, {
  "country": "Australia",
  "litres": 139.9
}, {
  "country": "Austria",
  "litres": 128.3
}, {
  "country": "UK",
  "litres": 99
}, {
  "country": "Belgium",
  "litres": 60
}, {
  "country": "The Netherlands",
  "litres": 50
} ];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

}); // end am4core.ready()
</script>

<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_material);
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart2 = am4core.create("chart2", am4charts.PieChart);

// Add data
chart2.data = [ {
  "country": "Lithuania",
  "litres": 501.9
}, {
  "country": "Czech Republic",
  "litres": 301.9
}, {
  "country": "Ireland",
  "litres": 201.1
}, {
  "country": "Germany",
  "litres": 165.8
}, {
  "country": "Australia",
  "litres": 139.9
}, {
  "country": "Austria",
  "litres": 128.3
}, {
  "country": "UK",
  "litres": 99
}, {
  "country": "Belgium",
  "litres": 60
}, {
  "country": "The Netherlands",
  "litres": 50
} ];

// Set inner radius
chart2.innerRadius = am4core.percent(50);

// Add and configure Series
var pieSeries2 = chart2.series.push(new am4charts.PieSeries());
pieSeries2.dataFields.value = "litres";
pieSeries2.dataFields.category = "country";
pieSeries2.slices.template.stroke = am4core.color("#fff");
pieSeries2.slices.template.strokeWidth = 2;
pieSeries2.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

}); // end am4core.ready()
</script>

<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_frozen);
am4core.useTheme(am4themes_animated);
// Themes end

var chart3 = am4core.create("chart3", am4charts.PieChart);
chart3.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart3.data = [
  {
    country: "Lithuania",
    value: 401
  },
  {
    country: "Czech Republic",
    value: 300
  },
  {
    country: "Ireland",
    value: 200
  },
  {
    country: "Germany",
    value: 165
  },
  {
    country: "Australia",
    value: 139
  },
  {
    country: "Austria",
    value: 128
  }
];
chart3.radius = am4core.percent(70);
chart3.innerRadius = am4core.percent(40);
chart3.startAngle = 180;
chart3.endAngle = 360;  

var series = chart3.series.push(new am4charts.PieSeries());
series.dataFields.value = "value";
series.dataFields.category = "country";

series.slices.template.cornerRadius = 10;
series.slices.template.innerCornerRadius = 7;
series.slices.template.draggable = true;
series.slices.template.inert = true;
series.alignLabels = false;

series.hiddenState.properties.startAngle = 90;
series.hiddenState.properties.endAngle = 90;

chart3.legend = new am4charts.Legend();

}); // end am4core.ready()
</script>
@endsection