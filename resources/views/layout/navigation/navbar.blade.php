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
            
            <div class="container">
                <nav class="navbar navbar-default yamm">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <br>
                        <div class="logo-normal">
                            <a class="navbar-brand" href="{{route('home')}}"><img style="width:70px;margin-top: 4rem;" src="{{asset('images/logo-uns.png')}}" alt=""></a>
                        </div>
                    </div>
                    <br>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">

                            <li><a href="{{route('home')}}">Home</a></li>
                             <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tentang Kami <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('tentang-kami.sambutan')}}">Sambutan WR</a></li>
                                    <!-- <li><a href="{{route('tentang-kami.visiMisi')}}">Visi Misi</a></li>
                                    <li><a href="{{route('tentang-kami.tugasFungsi')}}">Tugas dan Fungsi</a></li>
                                    <li><a href="{{route('tentang-kami.rencanaStrategis')}}">Rencana Strategis</a></li>
                                    <li><a href="{{route('tentang-kami.profilBiro')}}">Profil Biro RPM</a></li> -->
                                </ul>
                            </li> 
                            <li><a href="http://lppm.uns.ac.id/" target="_blank">LPPM</a></li>
                            <li><a href="{{route('coming')}}">Direktorat Inovasi </a></li>
                            <li><a href="{{route('coming')}}">KHDDTK </a></li>
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Informasi&nbsp;<span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('informasi')}}">Sebaran KKN</a></li>
                                    <li><a href="{{route('coming')}}">Sertifikat HAKI</a></li>
                                    <li><a href="{{route('coming')}}">Produk Buku Siap Komersial</a></li>                                 
                                    <!-- <li><a href="{{route('dokumentasi')}}">Dokumentasi</a></li>        -->
                                    <li class="dropdown level-2">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dokumentasi&nbsp;<span class="fa fa-angle-right"></span></a>
                                        <ul class="dropdown-menu level-3" role="menu">
                                            <!-- <li><a href="{{route('informasi')}}">Sebaran KKN</a></li>
                                            <li><a href="{{route('coming')}}">Sertifikat HAKI</a></li>
                                            <li><a href="{{route('coming')}}">Produk Buku Siap Komersial</a></li> -->
                                            <li><a href="{{route('dokumentasi')}}">Koran Digital</a></li>    
                                            <li><a href="{{route('dokumentasi')}}">E-Book</a></li>    
                                            <!-- <li><a href="{{route('dokumentasi')}}">Dokumentasi</a></li>        -->
                                        </ul>
                                    </li>                          
                                </ul>
                            </li>
                            {{-- <li><a href="{{route('pui')}}">Dokumentasi</a></li> --}}
                            <li><a href="{{route('produk-komersial')}}">Produk Siap Commercial</a></li>
                         
                            <li><a href="{{route('berita-terkini')}}">Berita Terkini</a></li>
                            <li><a href="{{route('agenda')}}">Agenda</a></li>
                            <li class="iconitem"><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-search"></i></a></li>
                          
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