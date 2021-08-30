@extends('layout.user')
@section('css')

@endsection

@section('content')
        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                        <h3>Dokumentasi RIDA</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
        <section class="section gb nopadtop">
          <div class="container">
              <div class="row">
                  <div class="col-md-3">
                      <div class="box m30">
                          <i class="flaticon-monitor-tablet-and-smartohone"></i>
                          <h4>Doktoral</h4>
                          <a href="{{route('rida-doktoral')}}" class="readmore">Pelajari Selengkapnya</a>
                      </div>
                  </div><!-- end col -->
                  <div class="col-md-3">
                      <div class="box m30">
                          <i class="flaticon-monitor-tablet-and-smartohone"></i>
                          <h4>Magister</h4>
                          <a href="{{route('rida-magister')}}" class="readmore">Pelajari Selengkapnya</a>
                      </div>
                  </div><!-- end col -->
                  <div class="col-md-3">
                      <div class="box m30">
                          <i class="flaticon-monitor-tablet-and-smartohone"></i>
                          <h4>Spesialis-2</h4>
                          <a href="{{route('rida-spesialis-2')}}" class="readmore">Pelajari Selengkapnya</a>
                      </div>
                  </div><!-- end col -->
                  <div class="col-md-3">
                      <div class="box m30">
                          <i class="flaticon-monitor-tablet-and-smartohone"></i>
                          <h4>Spesialis Konsultan</h4>
                          <a href="{{route('rida-spesialis-konsultan')}}" class="readmore">Pelajari Selengkapnya</a>
                      </div>
                  </div><!-- end col -->
                  <div class="col-md-3">
                      <div class="box m30">
                          <i class="flaticon-monitor-tablet-and-smartohone"></i>
                          <h4>Spesialis-1</h4>
                          <a href="{{route('rida-spesialis-1')}}" class="readmore">Pelajari Selengkapnya</a>
                      </div>
                  </div><!-- end col -->
                  <div class="col-md-3">
                      <div class="box m30">
                          <i class="flaticon-monitor-tablet-and-smartohone"></i>
                          <h4>Profesi</h4>
                          <a href="{{route('rida-profesi')}}" class="readmore">Pelajari Selengkapnya</a>
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