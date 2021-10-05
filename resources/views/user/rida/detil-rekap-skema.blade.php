@extends('layout.user')
@section('css')

@endsection



@section('content')

<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3 style="color:black"> @foreach($nama_table as $f) {{ucwords($f->nama_table)}} @endforeach </br>{{$tahun}} </h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->


<section class="section db p120">
    <div class="container">
        <div class="boxed boxedp4">
            <div class="row">
                <div class="col s12 m12 l12">
               
                <table style="margin-bottom:5em" id="data-menu" class="table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align:justify !important;">No</th>
                            <th style="text-align:center !important;">Jenis Skema</th>
                            <th style="text-align:center !important;">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 1;
                    @endphp
                        @foreach ($data as $v)
                          <tr>
                              <td style="text-align:center !important;">{{$i}}</td>
                              <td style="text-align:left !important;">{{$v->jenis_skema}}</td>
                              <td style="text-align:center !important;">{{$v->jumlah}}</td>
                              <!-- Modal Edit -->
                          </tr>

                          @php
                          $i++;
                          @endphp
                        @endforeach
                        <tr>
                            <th colspan="2" style="text-align:left !important; background:cyan;">Jumlah</th>
                            <th style="text-align:center !important;  background:cyan;">{{ $total }}</th>
                        </tr>
                    </tbody>
                    
                </table>
                </div>
            </div>
        </div>        
    </div>        
</section><!-- end section -->
@endsection



@section('js')

@endsection