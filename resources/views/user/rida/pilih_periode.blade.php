@extends('layout.user')
@section('css')

@endsection



@section('content')

<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3 style="color: #000000;">@foreach($nama_table as $f) {{ucwords($f->nama_table)}} @endforeach {{--</br> {{$fakultas}} {{$tahun}}--}}</h3>
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
                <table id="data-menu" class="table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align:justify !important;">#</th>
                            <th style="text-align:center !important;">Periode</th>
                            <th style="text-align:center !important;">Tahun</th>
                            <th style="text-align:center !important;">Sumber Data</th>
                            <th style="text-align:justify !important;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 1;
                    @endphp
                        @foreach ($data as $row)
                        <tr>
                            <td style="text-align:center !important;">{{$i}}</td>
                            <td style="text-align:center !important;">{{$row->periode}}</td>
                            <td style="text-align:center !important;">{{$row->tahun_input}}</td>
                            <td style="text-align:center !important;">{{$row->sumber_data}}</td>
                            <td>
                            <a href="{{ route ('rida-detail-'.$name, [$fakultas, $tahun, $row->periode]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                            </td>
                            <!-- Modal Edit -->
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                        
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