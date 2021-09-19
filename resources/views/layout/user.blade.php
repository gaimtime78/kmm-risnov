<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js " lang="en"> <!--<![endif]-->
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, height=device-height">
    
    <!-- Site Meta -->
    <title>RISET DAN INOVASI | @yield('title')</title>
    <meta name="title" content="@yield('title')">
    <meta name="description" content="@yield('meta-description')">
    <meta name="author" content="RISET DAN INOVASI">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://risnov.uns.ac.id/">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('meta-description')">
    <meta property="og:image" itemprop="image" content="@yield('meta-image')">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300">
	<meta property="og:image:height" content="300">

    <meta property="og:type" content="website" />
    <meta property="og:updated_time" content="1440432930" />

    <meta property="og:site_name" content="Riset Inovasi Universitas Sebelas Maret">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet"> 
	
    <!-- Custom & Default Styles -->
	<link rel="stylesheet" type="text/css" href="{{ asset('design\css\bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design\css\font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design\css\carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design\css\animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design\style.css') }}">

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
	<![endif]-->
    <meta name="google-site-verification" content="e6UXMEpodd4Gkid3WCrUYVJ4zcvxzm7aFsHlokWOgyc">
    <style>
        #myBtn {
            display: fixed;
            position: fixed;
            bottom: 100px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            color: white;
            padding: 15px;

            /* background-color: Transparent; */
            background-repeat: #43cae9;
            border: 2px;
            border-radius:8px;
            cursor:pointer;
            overflow: hidden;
            outline:none;
        }

        #myBtn:hover {
            background-color: #43cae9;
        }
        </style>
@yield('css')
</head>
<body>
    <span itemprop="image" itemscope itemtype="image/jpeg"> 
        <link itemprop="url" href="@yield('meta-image')"> 
      </span>  
      @if (Auth::check())
        <div class="ui item">
            <a href="{{route('admin.dashboard')}}">
                <button  id="myBtn" title="Dashboard">Dashboard</button>
            </a>
        </div>
        @endif
    <!-- LOADER -->
    <!-- <div id="preloader">
        <img class="preloader" src="images/loader.gif" alt="">
    </div> -->
    <!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">
        <div style="position:fixed;z-index:1000;right:1em;bottom:1em;width:200px;" class="col-md-6 col-sm-6 text-right">
            <div class="social" id="container-share">
                
            </div><!-- end social -->
        </div>
        @include('layout.navigation.navbar')

        @yield('content')

        @include('layout.navigation.footer')
    </div><!-- end wrapper -->

    <!-- jQuery Files -->
    <script type="text/javascript" src="{{ asset('design\js\jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('design\js\bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('design\js\carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('design\js\animate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('design\js\custom.js') }}"></script>
    <!-- VIDEO BG PLUGINS -->
    <script type="text/javascript" src="{{ asset('design\js\videobg.js') }}"></script>
    <script>
        let renderShare = () =>{
            let currURL = window.location.href
            let container = document.querySelector("#container-share")
            console.log(currURL)
            container.innerHTML = `
                <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=${currURL}" target="_blank" data-tooltip="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                <a class="twitter" href="https://twitter.com/intent/tweet?text=Share+title&url=${currURL}" target="_blank" data-tooltip="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                <a style="background-color:green;" class="whatsapp" href="https://wa.me/?text=${currURL}" target="_blank" data-tooltip="tooltip" data-placement="bottom" title="Whatsapp"><i class="fa fa-whatsapp"></i></a>
            `
        }
        renderShare()
    </script>

            
        <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        // function scrollFunction() {
        // if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        //     mybutton.style.display = "block";
        // } else {
        //     mybutton.style.display = "none";
        // }
        // }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
        </script>
    @yield('js')
</body>
</html>