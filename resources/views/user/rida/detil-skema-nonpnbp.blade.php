@extends('layout.user')
@section('css')

@endsection



@section('content')

<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3 style="color:black">Penelitian Non PNBP - {{$jenis}} - {{$tahun}}</h3>
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
                @foreach($data as $row)
                <h4>{{$row["periode"]}}</h4>
                <table style="margin-bottom:5em" id="data-menu" class="table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align:justify !important;">#</th>
                            <th style="text-align:center !important;">Fakultas</th>
                            <th style="text-align:center !important;">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 1;
                    @endphp
                        @foreach ($row["data"] as $v)
                          <tr>
                              <td style="text-align:center !important;">{{$i}}</td>
                              <td style="text-align:center !important;">{{$v->fakultas}}</td>
                              <td style="text-align:center !important;">{{$v->jumlah}}</td>
                              <!-- Modal Edit -->
                          </tr>
                          @php
                          $i++;
                          @endphp
                        @endforeach
                        
                    </tbody>
                    
                </table>
                @endforeach
                </div>
            </div>
        </div>        
    </div>        
</section><!-- end section -->
@endsection



@section('js')

@endsection