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
    <meta name="description" content="IRIS1103 Premiere Suite | Intelligent Research and Innovation Services 1103">
    <meta name="keywords" content="IRIS1103 Premiere Suite | Intelligent Research and Innovation Services 1103">
    <title>IRIS1103 Premiere Suite | Intelligent Research and Innovation Services 1103</title>

    <!-- Favicons-->
    <link rel="icon" href="images\favicon\favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images\favicon\apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->    
    <link href="css\materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css\style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <!-- <link href="css\custom\custom.min.css" type="text/css" rel="stylesheet" media="screen,projection"> -->


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="js\plugins\perfect-scrollbar\perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js\plugins\jvectormap\jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js\plugins\chartist-js\chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    @yield('css')

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
        <!-- Floating Action Button -->
        <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
            <a class="btn-floating btn-large">
            <i class="mdi-action-stars"></i>
            </a>
            <ul>
            <li><a href="css-helpers.htm" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
            <li><a href="app-widget.htm" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
            <li><a href="app-calendar.htm" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
            <li><a href="app-email.htm" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
            </ul>
        </div>
    <!-- Floating Action Button -->

<!--end container-->
</div></section>
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
                Copyright © 2021 <a class="grey-text text-lighten-4" href="https://iris1103.uns.ac.id/" target="_blank">©Engineering IRIS1103</a> All rights reserved.
                <!-- <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">GeeksLabs</a></span> -->
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
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script> -->

    <!--jvectormap-->
    <script type="text/javascript" src="js\plugins\jvectormap\jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="js\plugins\jvectormap\jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="js\plugins\jvectormap\vectormap-script.js"></script>
    
    <!--google map-->
    <!-- <script type="text/javascript" src="js\plugins\google-map\google-map-script.js"></script> -->

    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js\plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js\custom-script.js"></script>
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
</div></div></body>

</html>