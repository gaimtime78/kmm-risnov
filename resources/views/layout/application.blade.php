<?php 
ini_set('memory_limit', '-1');
?>
<!DOCTYPE html>
<html lang="en">

<!--================================================================================
 Item Name: Materialize - Material Design Admin Template
 Version: 3.1
 Author: GeeksLabs
 Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Biro RPM | Riset dan Pengabdian Kepada Masyarakat">
    <meta name="keywords" content="Biro RPM | Riset dan Pengabdian Kepada Masyarakat">
    <title>Biro RPM |Riset dan Pengabdian Kepada Masyarakat</title>

    <!-- Favicons-->
    <link rel="icon" href="images\favicon\favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images\favicon\apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->
    <link href="{{ asset('css\materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('css\style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <!-- <link href="css\custom\custom.min.css" type="text/css" rel="stylesheet" media="screen,projection"> -->


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{ asset('js\plugins\perfect-scrollbar\perfect-scrollbar.css') }}" type="text/css" rel="stylesheet"
        media="screen,projection">
    <link href="{{ asset('js\plugins\jvectormap\jquery-jvectormap.css') }}" type="text/css" rel="stylesheet"
        media="screen,projection">
    <link href="{{ asset('js\plugins\chartist-js\chartist.min.css') }}" type="text/css" rel="stylesheet"
        media="screen,projection">
    @yield('css')

    {{-- jQuery Library --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!-- Start Page Loading -->
    {{-- <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> --}}
    <!-- End Page Loading -->

    @yield('content')

    <!--end container-->
    </div>
    </section>
    <!-- END CONTENT -->


    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
    <footer class="page-footer">
        <div class="container">
            <!-- <div class="row section">
                <div class="col l6 s12">
                    <h5 class="white-text">World Market</h5>
                    <p class="grey-text text-lighten-4">World map, world regions, countries and cities.</p>
                </div>
                <div class="col l4 s12">
                    <h5 class="white-text">Sales by Country</h5>
                    <p class="grey-text text-lighten-4">A sample polar chart to show sales by country.</p>
                    <div id="polar-chart-holder">
                        <canvas id="polar-chart-country" width="200"></canvas>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="footer-copyright">
            <div class="container">
                Copyright ?? 2021 <a class="grey-text text-lighten-4" href="https://iris1103.uns.ac.id/"
                    target="_blank">??Engineering Risnov</a> All rights reserved.
                <!-- <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">GeeksLabs</a></span> -->
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- ================================================
    Scripts
    ================================================ -->

    <!--materialize js-->
    <script type="text/javascript" src="{{ asset('js\plugins\jquery-1.11.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\materialize.min.js') }}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{ asset('js\plugins\perfect-scrollbar\perfect-scrollbar.min.js') }}"></script>


    <!-- chartist -->
    <script type="text/javascript" src="{{ asset('js\plugins\chartist-js\chartist.min.js') }}"></script>

    <!-- chartjs -->
    <script type="text/javascript" src="{{ asset('js\plugins\chartjs\chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\plugins\chartjs\chart-script.js') }}"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="{{ asset('js\plugins\sparkline\jquery.sparkline.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\plugins\sparkline\sparkline-script.js') }}"></script>

    <!-- google map api -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script> -->

    <!--jvectormap-->
    <script type="text/javascript" src="{{ asset('js\plugins\jvectormap\jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\plugins\jvectormap\jquery-jvectormap-world-mill-en.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('js\plugins\jvectormap\vectormap-script.js') }}"></script>

    <!--google map-->
    <!-- <script type="text/javascript" src="js\plugins\google-map\google-map-script.js"></script> -->


    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{ asset('js\plugins.min.js') }}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{ asset('js\custom-script.js') }}"></script>
    <!-- Toast Notification -->
    <script type="text/javascript">
        // Toast Notification
        // $(window).load(function() {
        //     setTimeout(function() {
        //         Materialize.toast('<span>Hiya! I am a toast.</span>', 1500);
        //     }, 1500);
        //     setTimeout(function() {
        //         Materialize.toast('<span>You can swipe me too!</span>', 3000);
        //     }, 5000);
        //     setTimeout(function() {
        //         Materialize.toast('<span>You have new order.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);
        //     }, 15000);
        // });

    </script>
    @yield('js')
    </div>
    </div>
</body>

</html>
