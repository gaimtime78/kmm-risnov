<style>
    .kotak{
        width: 150px;
        height: 148px;
        position: absolute;
        left: 0;
        top: -40px;
        padding: 15px;
        text-align: center;
        z-index: 99;
        background-color: #FFFFFF;
    }

</style>

<header class="header header-normal">

            <div class="topbar clearfix">
                <div class="container">
                    <div class="row-fluid">
                        <div class="col-md-6 col-sm-6 text-left">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" >Select Language <span class="fa fa-angle-down"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('home')}}"><img draggable="false" role="img" class="emoji" alt="🇮🇩" style="width:15px" src="https://s.w.org/images/core/emoji/13.0.1/svg/1f1ee-1f1e9.svg"> Bahasa Indonesia</a></li>
                                <li><a href="{{route('coming')}}"><img draggable="false" role="img" class="emoji" alt="🇬🇧" style="width:15px" src="https://s.w.org/images/core/emoji/13.0.1/svg/1f1ec-1f1e7.svg"> English</a></li>
                            </ul>
                        </div><!-- end left -->
                        <div class="col-md-6 col-sm-6 hidden-xs text-right">
                            <!-- <div class="social">
                                <a class="facebook" href="#" data-tooltip="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                <a class="twitter" href="#" data-tooltip="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a class="google" href="#" data-tooltip="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                <a class="linkedin" href="#" data-tooltip="tooltip" data-placement="bottom" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                                <a class="pinterest" href="#" data-tooltip="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            </div> -->
                            <!-- end social -->
                        </div><!-- end left -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end topbar -->
            <div class="container">
                <nav class="navbar navbar-default yamm">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                       
                        <div class="logo-normal">
                            <a class="navbar-brand" href="{{route('home')}}"><img style="width:50px;" src="{{asset('images/logo-uns2.png')}}" alt=""></a>
                        </div>
                    </div>
                   
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">

                            {{-- <li><a href="{{route('home')}}">Home</a></li> --}}

                            @foreach ($menus as $menu)
                                @if ($menu['sub_menu'] != null) 
                                <li class="dropdown hassubmenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{$menu['menu']}} <span class="fa fa-angle-down"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        @php
                                        $i = 0;
                                        @endphp
                                        @foreach ($menu['sub_menu'] as $sub)
                                        {{-- <li><a href="/{{$menu['page']->slug}}/{{$menu['url'][$i]}}">{{$sub}}</a></li> --}}
                                        <li><a href="{{route('submenu', ['slug' => $menu['page']->slug, 'sub' => $menu['url'][$i]] )}}">{{$sub}}</a></li>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach
                                    </ul>
                                </li> 
                                @else
                                <li><a href="{{route('userpage', $menu['url'])}}">{{$menu['menu']}}</a></li>
                                @endif
                            @endforeach


                             {{-- <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tentang Kami <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('tentang-kami.sambutan')}}">Sambutan WR</a></li>
                                    <!-- <li><a href="{{route('tentang-kami.visiMisi')}}">Visi Misi</a></li>
                                    <li><a href="{{route('tentang-kami.tugasFungsi')}}">Tugas dan Fungsi</a></li>
                                    <li><a href="{{route('tentang-kami.rencanaStrategis')}}">Rencana Strategis</a></li>
                                    <li><a href="{{route('tentang-kami.profilBiro')}}">Profil Biro RPM</a></li> -->
                                </ul>
                            </li> 
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kelembagaan <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="http://lppm.uns.ac.id/" target="_blank">LPPM</a></li>
                                    <li><a href="https://risnov.uns.ac.id/id/post/WEBINAR-DAN-GRAND-LAUNCHING-SEMESTA-2021">Direktorat Inovasi dan Hilirisasi</a></li>
                                    <li><a href="https://diklathut.uns.ac.id/">UPT PPK</a></li>
                                    <li><a href="https://kkn.uns.ac.id/">UP KKN </a></li>
                                </ul>
                            </li> 
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dokumentasi&nbsp;<span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <!-- <li><a href="{{route('informasi')}}">Sebaran KKN</a></li> -->
                                    <!-- <li><a href="{{route('coming')}}">Sertifikat HAKI</a></li> -->
                                    <!-- <li><a href="{{route('coming')}}">Produk Buku Siap Komersial</a></li>    -->
                                    <li><a href="{{route('koran-search')}}">Koran Digital</a></li>    
                                    <li><a href="{{route('dokumentasi')}}">E-Book</a></li>                               
                                    <!-- <li><a href="{{route('dokumentasi')}}">Dokumentasi</a></li>        -->
                                    <!-- <li class="dropdown level-2">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dokumentasi&nbsp;<span class="fa fa-angle-right"></span></a>
                                        <ul class="dropdown-menu level-3" role="menu">
                                            <li><a href="{{route('informasi')}}">Sebaran KKN</a></li>
                                            <li><a href="{{route('coming')}}">Sertifikat HAKI</a></li>
                                            <li><a href="{{route('coming')}}">Produk Buku Siap Komersial</a></li>
                                           
                                            <li><a href="{{route('dokumentasi')}}">Dokumentasi</a></li>       
                                        </ul>
                                    </li>                           -->
                                </ul>
                            </li>
                            {{-- <li><a href="{{route('pui')}}">Dokumentasi</a></li>
                            <li><a href="{{route('produk-komersial')}}">Produk Siap Komersial</a></li>
                         
                            <li><a href="{{route('berita-terkini')}}">Berita Terkini</a></li>
                            <li><a href="{{route('agenda')}}">Agenda</a></li> 
                            @foreach ($allMenu as $menu)
                            <li><a href="{{$menu->url}}">{{$menu->menu}}</a></li>
                            @endforeach
                            <li class="iconitem"><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-search"></i></a></li>
                             --}}

                        </ul>
                    </div>
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>

         <!-- BEGIN # MODAL LOGIN -->
         <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Begin # DIV Form -->
                    <div id="div-forms">
                        <form id="login-form" method="get" action="{{route('search')}}">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="flaticon-add" aria-hidden="true"></span>
                            </button>
                            <div class="modal-body">
                                <input class="form-control" name="cari" type="text" placeholder="Apa yang anda cari" required>
                                <button style="margin-top:5px" type="submit" class="btn btn-info btn-sm ">Cari</button>
                            </div>
                        
                        </form><!-- End # Login Form -->
                    </div><!-- End # DIV Form -->
                </div>
            </div>
        </div>
        <!-- END # MODAL LOGIN -->

<style>
    ul.nav li ul.dropdown-menu li:hover ul.level-3 {
        min-width: 150px;
        display: block;
        -webkit-animation:mantul-horizontal 1s;
        animation:mantul-horizontal 1s;
        top:0;
        left:30%;
    }
 
</style>