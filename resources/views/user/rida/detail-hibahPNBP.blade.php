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
                                                <th rowspan="3" style="border: 1px solid black !important; text-align:center !important;">No</th>
                                                <th rowspan="3" style="text-align:justify !important;">Fakultas</th>
                                                @foreach($tahun_input as $tahun)
                                                <th colspan="3" style="border: 1px solid black !important; text-align:center !important;">Tahun {{ $tahun }}</th>
                                                @endforeach
                                            </tr>
                                            
                                            @foreach($tahun_input as $tahun)
                                            <tr style="border: 1px solid black !important;">
                                                <th colspan="2"
                                                style="border: 1px solid black !important; text-align:center !important;">
                                                Usulan</th>
                                                <th rowspan="2"
                                                style="border: 1px solid black !important; text-align:center !important;">
                                                Diterima</th>
                                            </tr>
                                                <tr style="border: 1px solid black !important;">
                                                    <th
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    Lanjutan</th>
                                                    <th
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    Baru</th>
                                                </tr>
                                                @endforeach
                                            

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
                <!--DataTables example Row grouping-->
            </div>
        </div>        
    </div>        
</section><!-- end section -->
@endsection



@section('js')

@endsection