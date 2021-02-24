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
                        <div class="logo-normal">
                            <a class="navbar-brand" href="index.html"><img src="" alt=""></a>
                        </div>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/home">Home</a></li>
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tentang Kami <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/tentang-kami/sambutan">Sambutan WR</a></li>
                                    <li><a href="/tentang-kami/visi-misi">Visi Misi</a></li>
                                    <li><a href="/tentang-kami/tugas-dan-fungsi">Tugas dan Fungsi</a></li>
                                    <li><a href="/tentang-kami/rencana-strategis">Rencana Strategis</a></li>
                                    <li><a href="/tentang-kami/profil-biro-rpm">Profil Biro RPM</a></li>
                                </ul>
                            </li>
                            <li><a href="/lppm">LPPM</a></li>
                            <li><a href="#">Direktorat Inovasi </a></li>
                            <li><a href="#">Informasi</a></li>
                            <li><a href="#">PUI</a></li>
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Produk <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('produk-penelitian')}}">Penelitian</a></li>
                                    <li><a href="{{route('produk-pengabdian')}}">Pengabdian</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('berita-terkini')}}">Berita Terkini</a></li>
                            <li><a href="#">Agenda</a></li>
                        </ul>
                    </div>
                </nav><!-- end navbar -->
            </div><!-- end container -->
        </header>