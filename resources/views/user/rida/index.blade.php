@extends('layout.user')
@section('css')

@endsection

@section('content')
        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                        <h3 style="color: #000000;">Dokumentasi RIDA</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
        <section class="section gb nopadtop">
          <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box m30">
                            <i class="flaticon-monitor-tablet-and-smartohone"></i>
                            <h4>RENTANG USIA PRODUKTIF PENELITI DAN PENGABDI TENAGA PENDIDIK JENJANG DOKTOR</h4>
                            <a href="{{route('rida-doktoral')}}" class="readmore">Selengkapnya</a>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="box m30">
                            <i class="flaticon-monitor-tablet-and-smartohone"></i>
                            <h4>RENTANG USIA PRODUKTIF PENELITI DAN PENGABDI TENAGA PENDIDIK JENJANG MAGISTER</h4>
                            <a href="{{route('rida-magister')}}" class="readmore">Selengkapnya</a>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="box m30">
                            <i class="flaticon-monitor-tablet-and-smartohone"></i>
                            <h4>RENTANG USIA PRODUKTIF PENELITI DAN PENGABDI TENAGA PENDIDIK JENJANG SPESIALIS-2</h4>
                            <a href="{{route('rida-spesialis-2')}}" class="readmore">Selengkapnya</a>
                        </div>
                    </div><!-- end col -->
                </div>
                
                <hr class="invis">
                <hr class="invis">

                <div class="row">
                    <div class="col-md-4">
                        <div class="box m30">
                            <i class="flaticon-monitor-tablet-and-smartohone"></i>
                            <h4>RENTANG USIA PRODUKTIF PENELITI DAN PENGABDI TENAGA PENDIDIK JENJANG SPESIALIS-1 (K)</h4>
                            <a href="{{route('rida-spesialis-konsultan')}}" class="readmore">Selengkapnya</a>
                        </div>
                    </div><!-- end col -->
               
                    <div class="col-md-4">
                        <div class="box m30">
                            <i class="flaticon-monitor-tablet-and-smartohone"></i>
                            <h4>RENTANG USIA PRODUKTIF PENELITI DAN PENGABDI TENAGA PENDIDIK JENJANG SPESIALIS-1</h4>
                            <a href="{{route('rida-spesialis-1')}}" class="readmore">Selengkapnya</a>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="box m30">
                            <i class="flaticon-monitor-tablet-and-smartohone"></i>
                            <h4>RENTANG USIA PRODUKTIF PENELITI DAN PENGABDI TENAGA PENDIDIK JENJANG PROFESI</h4>
                            <a href="{{route('rida-profesi')}}" class="readmore">Selengkapnya</a>
                        </div>
                    </div><!-- end col -->
                  
              </div><!-- end row -->
              <div class="row">
              
              </div>
          </div><!-- end container -->
        </section>  
@endsection

@section('js')

@endsection