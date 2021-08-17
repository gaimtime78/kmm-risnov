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
                          <i class="flaticon-download-business-statistics-symbol-of-a-graphic"></i>
                          <h4>Direktorat Inovasi dan Hilirisasi</h4>
                          <a href="{{route('coming')}}" class="readmore">Pelajari Selengkapnya</a>
                      </div>
                  </div><!-- end col -->
                  <div class="col-md-3">
                      <div class="box m30">
                          <i class="flaticon-computer-tool-for-education"></i>
                          <h4>UPT PPK</br></br></h4> 
                          <a href="https://diklathut.uns.ac.id/" class="readmore">Pelajari Selengkapnya</a>
                      </div>
                  </div><!-- end col -->
                  <div class="col-md-3">
                      <div class="box m30">
                          <i class="flaticon-monitor-tablet-and-smartohone"></i>
                          <h4>UP KKN</h4>
                          <a href="https://kkn.uns.ac.id/" class="readmore">Pelajari Selengkapnya</a>
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