<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!--================================================================================
	Author: Khavid Wasi Triyoga
	Version: 1.0
	Tanggal Pengerjaan : 27 Januari 2021
	Mail: khavid1305@staff.uns.ac.id
================================================================================ -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Iris Universitas Sebelas Maret ">
    <meta name="keywords" content="Iris Universitas Sebelas Maret">
    <title>Dashboard - Admin Utama Iris Universitas Sebelas Maret</title>

    <!-- Favicons-->
    <link rel="icon" href="{{asset('images\favicon\favicon-32x32.png')}}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{asset('images\favicon\apple-touch-icon-152x152.png')}}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->    
    <link href="{{asset('css\materialize.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset('css\style.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="{{asset('css/custom/custom.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{asset('js\plugins\perfect-scrollbar\perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset('js\plugins\jvectormap\jquery-jvectormap.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset('js\plugins\chartist-js\chartist.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
</head>


<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    @yield('content')

    <footer class="page-footer">
        <div class="container">
            <div class="row section">
                <div class="col l6 s12">
                    <h5 class="white-text">World Market</h5>
                    <p class="grey-text text-lighten-4">World map, world regions, countries and cities.</p>
                    <div id="world-map-markers"></div>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Sales by Country</h5>
                    <p class="grey-text text-lighten-4">A sample polar chart to show sales by country.</p>
                    <div id="polar-chart-holder">
                        <canvas id="polar-chart-country" width="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2015 <a class="grey-text text-lighten-4" href="http://themeforest.net/user/geekslabs/portfolio?ref=geekslabs" target="_blank">GeeksLabs</a> All rights reserved.
                <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">GeeksLabs</a></span>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->


    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js\plugins\jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="js\materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js\plugins\perfect-scrollbar\perfect-scrollbar.min.js"></script>
    

    <!-- chartist -->
    <script type="text/javascript" src="js\plugins\chartist-js\chartist.min.js"></script>   

    <!-- chartjs -->
    <script type="text/javascript" src="js\plugins\chartjs\chart.min.js"></script>
    <script type="text/javascript" src="js\plugins\chartjs\chart-script.js"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="js\plugins\sparkline\jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="js\plugins\sparkline\sparkline-script.js"></script>
    
    <!-- google map api -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>

    <!--jvectormap-->
    <script type="text/javascript" src="js\plugins\jvectormap\jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="js\plugins\jvectormap\jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="js\plugins\jvectormap\vectormap-script.js"></script>
    
    <!--google map-->
    <script type="text/javascript" src="js\plugins\google-map\google-map-script.js"></script>

    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js\plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js\custom-script.js"></script>
    <!-- Toast Notification -->
    <script type="text/javascript">
    // Toast Notification
    $(window).load(function() {
        setTimeout(function() {
            Materialize.toast('<span>Hiya! I am a toast.</span>', 1500);
        }, 1500);
        setTimeout(function() {
            Materialize.toast('<span>You can swipe me too!</span>', 3000);
        }, 5000);
        setTimeout(function() {
            Materialize.toast('<span>You have new order.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);
        }, 15000);
    });
    </script>
</div></div></body>

</html>