@extends('layout.user')
@section('css')

@endsection



@section('content')

<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3 style="color:black">@foreach($nama_table as $f) {{ucwords($f->nama_table)}} @endforeach </br> {{$fakultas}} </h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->


<section class="section db p120">
    <div class="container">
        <div class="boxed boxedp4" style="width: min-content;">
            <div class="row">
                <div id="table-datatables">
                        <!-- <a href="{{route('admin.agenda.create')}}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Agenda</a> -->
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="container py-4">
                                    <table id="data-menu" class="table display" cellspacing="0" style="border-collapse: collapse !important;">
                                        <thead>
                                            <tr style="border: 1px solid black !important;">
                                                <th rowspan="4" style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">No</th>
                                                <th rowspan="4" style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Fakultas</th>
                                                <th colspan="14" style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Tahun</th>
                                            </tr>
                                            
                                            <tr style="border: 1px solid black !important;">
                                                @foreach($tahun_input as $tahun)
                                                    <th colspan="2" style="border: 1px solid black !important; text-align:center !important;">{{ $tahun }}</th>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach($tahun_input as $tahun)
                                                    <th 
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    Usulan</th>
                                                    <th 
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    Diterima</th>
                                                @endforeach

                                            </tr>
                                            {{--
                                            <tr style="border: 1px solid black !important;">
                                                @foreach($tahun_input as $tahun)
                                                    <th
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    Lanjutan</th>
                                                    <th
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    Baru</th>
                                                @endforeach
                                            </tr>
                                            --}}      
                                            

                                        </thead>
                                        
                                        <tbody>
                                            
                                            @foreach ($hibah as $row)
                                            
                                            <tr style="border: 1px solid black !important;">
                                                <td style="border: 1px solid black !important;text-align:center !important;">{{$loop->iteration}}</td>
                                                <td style="border: 1px solid black !important;text-align:left !important;">{{$row['fakultas']}}</td>
                                                
                                                
                                                @foreach($row['data'] as $data)
                                                    @foreach($data as $d)
                                                    <td style="border: 1px solid black !important;text-align:center !important;">{{$d}}</td>
                                                    @endforeach
                                                @endforeach
                                             
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <!-- <tr>
                                            <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">Jumlah Universitas Sebelas Maret</th>
                                        </tr>
                                         -->
                                    </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div> 
                <br>
                <div class="divider"></div> 
                <div style="margin-top:2em">
                    
                    @foreach($list_sumber as $s)
                    <div><b>RIDA {{$s->periode}}  Tahun {{ $s->tahun_input }}  </b> <br>{{$s->sumber_data}} </b></div>
                    @endforeach
                </div>
                <!--DataTables example Row grouping-->
            </div>
        </div>        
    </div>        
</section><!-- end section -->
@endsection



@section('js')

@endsection