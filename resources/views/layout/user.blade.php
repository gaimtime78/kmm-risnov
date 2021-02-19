<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js " lang="en"> <!--<![endif]-->
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Site Meta -->
    <title>Edulogy</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet"> 
	
    <!-- Custom & Default Styles -->
	<link rel="stylesheet" href="{{asset('design/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/carousel.css')}}">
    <link rel="stylesheet" href="{{asset('design/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('design/style.css')}}">

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
	<![endif]-->
    <meta name="google-site-verification" content="e6UXMEpodd4Gkid3WCrUYVJ4zcvxzm7aFsHlokWOgyc">
    @yield('css')
</head>
<body>  

    <!-- LOADER -->
    <!-- <div id="preloader">
        <img class="preloader" src="images/loader.gif" alt="">
    </div> -->
    <!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">
        @include('layout.navigation.navbar')

        @yield('content')

        @include('layout.navigation.footer')
    </div><!-- end wrapper -->

    <!-- jQuery Files -->
    <script src="{{asset('design/js/jquery.min.js')}}"></script>
    <script src="{{asset('design/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('design/js/carousel.js')}}"></script>
    <script src="{{asset('design/js/animate.js')}}"></script>
    <script src="{{asset('design/js/custom.js')}}"></script>
    <!-- VIDEO BG PLUGINS -->
    <script src="{{asset('design/js/videobg.js')}}"></script>
    @yield('js')
</body>
</html>