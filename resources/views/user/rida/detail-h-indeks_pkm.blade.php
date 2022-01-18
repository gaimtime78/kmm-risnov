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
                    <table style="border-collapse: collapse; ">
                        <tr>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="2" rowspan="2">H-index</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="13">FAKULTAS</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="2" rowspan="2">JUMLAH</td>
                        </tr>
                        <tr>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">FIB</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">FKIP</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">FEB</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">FH</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">FISIP</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">FK</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">FP</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">FT</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">FMIPA</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">FSRD</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">FKOR</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">SV</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">PASCASARJANA</td>
                        </tr>
                        @foreach($table as $data)
                        <tr>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;" rowspan="2">{{ $data['h_index'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">Jumlah</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fib_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fkip_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['feb_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fh_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fisip_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fk_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fp_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['ft_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fmipa_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fsrd_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fkor_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['sv_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['pascasarjana_jumlah'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['total_jumlah'] }}</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">Percent</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fib_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fkip_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['feb_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fh_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fisip_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fk_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fp_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['ft_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fmipa_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fsrd_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['fkor_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['sv_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['pascasarjana_percent'] }}%</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $data['total_percent'] }}%</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="2" rowspan="2">Jumlah</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['fib'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['fkip'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['feb'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['fh'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['fisip'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['fk'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['fp'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['ft'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['fmipa'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['fsrd'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['fkor'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['sv'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['pascasarjana'] }}</td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">{{ $table_total['total'] }}</td>                    
                        </tr>
                        @php
                            function toPercent($val) {
                                return round((float) $val, 3) * 100;
                            }
                        @endphp
                        <tr>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['fib'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['fkip'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['feb'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['fh'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['fisip'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['fk'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['fp'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['ft'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['fmipa'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['fsrd'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['fkor'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['sv'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['pascasarjana'] / $table_total['total']) }}%
                            </td>
                            <td style="border: 1px solid black; padding: 4px; text-align:center;">
                                {{ toPercent($table_total['total'] / $table_total['total']) }}%
                            </td>
                        </tr>
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