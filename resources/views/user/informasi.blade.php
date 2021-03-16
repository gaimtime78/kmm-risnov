@extends('layout.user')

@section('css')
<style>
.highcharts-figure, .highcharts-data-table table {
  min-width: 320px; 
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}


input[type="number"] {
	min-width: 50px;
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
                                                <small>Bagian Informasi</small>
                                                <!-- <p>Data Persebaran Mahasiswa KKN</p> -->
                                            </h4>
                                        </div>
                                        <div id="container"></div>
                                          
                                        
                                    </div><!-- end box -->
                                </div><!-- end col -->

                                <!-- <div class="col-md-12">
                                    <div class="course-box">
                                        
                                        <div class="course-details">
                                            <h4>
                                                <small>Tips & Tricks</small>
                                                <a href="blog-single.html" title="">Working with team members for new projects</a>
                                            </h4>
                                            <p>Duis id aliquam metus, et consectetur risus. Praesent dictum augue id velit mattis aliquet. Aliquam faucibus sollicitudin libero, sit amet massa nunc. </p>
                                        </div>
                                        <div class="image-wrap entry">
                                          <div id="chart2"></div>
                                        </div>
                                        
                                    </div>
                                </div> -->

                                <!-- <div class="col-md-12">
                                    <div class="course-box">
                                        <div class="course-details">
                                            <h4>
                                                <small>Tips & Tricks</small>
                                                <a href="blog-single.html" title="">Buy a Macbook and learn code today like a pro</a>
                                            </h4>
                                            <p>Nulla nisl velit, lobortis vel luctus eu, rutrum ac elit. Donec nec condimentum libero. Maecenas rutrum sit amet mi vel hendrerit. Praesent tempor id. </p>
                                        </div>
                                        <div class="image-wrap entry">
                                          <div id="chart3"></div>
                                        </div>
                                    </div>
                                </div> -->

                            </div><!-- end row -->

                            <hr class="invis">
                            
                            
                        </div><!-- end col -->

                    </div><!-- end row -->
                </div><!-- end boxed -->
            </div><!-- end container -->
        </section>
@endsection

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Data Persebaran Mahasiswa KKN'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
      series: {
          cursor: 'pointer',
          point: {
              events: {
                  click: function() {
                      location.href = this.options.url;
                  }
              }
          }
      }
  },
  series: [{
    name: 'Presentase',
    colorByPoint: true,
    data: [{
      name: 'Jawa Tengah',
      y: 61.41,
      sliced: true,
      selected: true,
      url: 'http://bing.com/search?q=foo'
    }, {
      name: 'Yogyakarta',
      y: 11.84,
      url: 'http://bing.com/search?q=foo'
    }, {
      name: 'Jawa Timur',
      y: 10.85,
      url: 'http://bing.com/search?q=foo'
    }, {
      name: 'Jawa Barat',
      y: 4.67,
      url: 'http://bing.com/search?q=foo'
    }, {
      name: 'Banten',
      y: 4.18,
      url: 'http://bing.com/search?q=foo'
    }, {
      name: 'NTT',
      y: 1.64,
      url: 'http://bing.com/search?q=foo'
    }, {
      name: 'NTB',
      y: 1.6,
      url: 'http://bing.com/search?q=foo'
    }]
  }]
});
</script>
@endsection