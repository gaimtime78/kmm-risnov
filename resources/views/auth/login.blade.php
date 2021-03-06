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
    <title>Biro RPM |LOGIN</title>

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
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css\layouts\page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js\plugins\prism\prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js\plugins\perfect-scrollbar\perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form  method="POST" action="{{ route('login.post') }}" class="login-form">
      @csrf 
        <div class="row">
          <div class="input-field col s12 center">
         
            <!-- <img src="images\login-logo.png" alt="" class="circle responsive-img valign profile-image-login"> -->
            <p class="center login-form-text">Login Admin Risnov</p>
            <!-- <a href="index.htm" class="btn waves-effect waves-light col s12">Login dengan SSO</a> -->
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
            <label for="email" class="center-align ">Email</label>
            @error('email')
            <div class="errorTxt1" style=" text-align: center;font-size:0.8rem;color:red;">
              <div id="uname-error " class="error">{{ $message }}
              </div>
            </div>
            @enderror
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
            <label for="password">Password</label>
            @error('password')
            <div class="errorTxt1" style=" text-align: center;font-size:0.8rem;color:red;">
              <div id="uname-error " class="error">{{ $message }}
              </div>
            </div>
            @enderror
          </div>
        </div>

        
        @if (session('message'))
        <div class="errorTxt1" style=" text-align: center;font-size:0.8rem;color:{{session('cek') ? 'green' : 'red' }};">
              <div id="uname-error " class="error">{{session('message') }}
              </div>
        </div>
        @endif
        <!-- <div class="row margin">
            <div class="input-field col s2">
                <i class="mdi-action-accessibility prefix"></i>
            </div>
            <div class="input-field col s10">
            <select>
                <option value="" disabled="" selected="">Pilih User Login
                <option value="1">Option 1
                <option value="2">Option 2
                <option value="3">Option 3
            </select>
            </div>
        </div> -->
        <div class="row">
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light col s12">Login</button>
          </div>
        </div>
        <!-- <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="page-register.html">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
          </div>          
        </div> -->

      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js\plugins\jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js\materialize.min.js"></script>
  <!--prism-->
  <script type="text/javascript" src="js\plugins\prism\prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js\plugins\perfect-scrollbar\perfect-scrollbar.min.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js\plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js\custom-script.js"></script>

</body>

</html>