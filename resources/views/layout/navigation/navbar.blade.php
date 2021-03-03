        <header class="header">
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
                            <a class="navbar-brand" href="index.html"><img  style="width:100px" src="{{asset('images/logo-uns.png')}}" alt=""></a>
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
                                    <li><a href="{{route('tentang-kami.visiMisi')}}">Visi Misi</a></li>
                                    <li><a href="{{route('tentang-kami.tugasFungsi')}}">Tugas dan Fungsi</a></li>
                                    <li><a href="{{route('tentang-kami.rencanaStrategis')}}">Rencana Strategis</a></li>
                                    <li><a href="{{route('tentang-kami.profilBiro')}}">Profil Biro RPM</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('lppm')}}">LPPM</a></li>
                            <li><a href="{{route('direktorat')}}">Direktorat Inovasi </a></li>
                            <li><a href="{{route('informasi')}}">Informasi</a></li>
                            <li><a href="{{route('pui')}}">PUI</a></li>
                            <li><a href="{{route('produk-penelitian')}}">Produk Siap Commercial</a></li>
                            <!-- <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Produk <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('produk-penelitian')}}">Penelitian</a></li>
                                    <li><a href="{{route('produk-pengabdian')}}">Pengabdian</a></li>
                                </ul>
                            </li> -->
                            <li><a href="{{route('berita-terkini')}}">Berita Terkini</a></li>
                            <li><a href="{{route('agenda')}}">Agenda</a></li>

                            <!-- @foreach($menu as $m)
                                <li><a href="{{ route('page.blog', 'anu') }}">{{$m->menu." - ".$m->sub_menu}}</a></li>
                            @endforeach -->
                        </ul>
                    </div>
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>