@extends('layout.user')
@section('css')

@endsection



@section('content')

<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                <h4 style="color: #000000;">@foreach($nama_table as $f) {{ucwords($f->nama_table)}} @endforeach  </br> {{$fakultas}} </h4>
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
                    <div class="col s12 m12 l12">
                        <table id="data-menu" class="table display" cellspacing="0" style="border-collapse: collapse !important;">
                <tr style="background-color: aqua;">
                    <td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="2" rowspan="2">H-index</td>
                    <td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="13">FAKULTAS</td>
                    <td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="2" rowspan="2">JUMLAH</td>
                </tr>
                <tr style="background-color: aqua;">
                @php
                    $jumlah_h_index_semua = 0;
                @endphp
                @foreach($table as $fakultas => $data)
                    @php
                        $jumlah_h_index_semua += $data[23]['jumlahtotal'];
                    @endphp
                    <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $fakultas }}</td>
                @endforeach
                </tr>
                @for($h_index = 0; $h_index <= 23; $h_index++)
                    <tr>
                    @if($h_index < 23)
                        <td style="border: 1px solid black; padding: 4px; text-align:center; background-color: aqua;" rowspan="2">{{ $h_index }}</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center; background-color: aqua;">Jumlah</td>
                    @else
                         <td style="border: 1px solid black; padding: 4px; text-align:center; background-color: aqua;" colspan="2" rowspan="2">Jumlah</td>
                    @endif
                    @php
                        $jumlah_h_index_fakultas = 0;
                    @endphp
                    @foreach($table as $fakultas => $data)
                        @if($h_index < 23)
                            @php
                                $jumlah_h_index_fakultas += $data[$h_index]['jumlah'];
                            @endphp
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data[$h_index]['jumlah'] }}</td>
                        @else
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data[$h_index]['jumlahtotal'] }}</td>
                        @endif
                    @endforeach
                    @if($h_index < 23)
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">{{  $jumlah_h_index_fakultas }}</td>
                    @else
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $jumlah_h_index_semua }}</td>
                    @endif
                    </tr>
                    <tr>
                    @if($h_index < 23)
                        <td style="border: 1px solid black; padding: 4px; text-align:center;background-color: aqua;">Percent</td>
                    @endif
                    @foreach($table as $fakultas => $data)
                        @if($h_index < 23)
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data[$h_index]['percent'] }}%</td>
                        @else
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data[$h_index]['percenttotal'] }}%</td>
                        @endif
                    @endforeach
                    @if($h_index < 23)
                        @php
                            $percent = round((float) $jumlah_h_index_fakultas / $jumlah_h_index_semua, 3) * 100;
                        @endphp
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $percent }}%</td>
                    @else
                        @php
                            $percent = round((float) $jumlah_h_index_semua / $jumlah_h_index_semua, 3) * 100;
                        @endphp
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $percent }}%</td>
                    @endif
                    </tr>
                @endfor
                        </table>
                    </div>
                </div>
            </div> 
            <!--DataTables example Row grouping-->
            <br>
            <div class="divider"></div> 

            <div style="margin-top:2em">
            
                @foreach($list_sumber as $s)
                 <div><b>RIDA {{$s->periode}}  Tahun {{$tahun}}  </b> <br>{{$s->sumber_data}} </b></div>
                @endforeach
            </div>
        </div>
    </div>        
</section><!-- end section -->
@endsection



@section('js')

@endsection