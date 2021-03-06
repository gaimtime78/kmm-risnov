@extends('layout.user')
@section('css')

@endsection



@section('content')

<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h4 style="color: #000000;">@foreach($nama_table as $f) {{ucwords($f->nama_table)}} @endforeach </br> {{$fakultas}} </br></h4>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->
<section class="section db p120">
    <div class="container">
        <div class="boxed boxedp4">
            <div class="row">
            <div id="table-datatables">
<div class="row">
    <div class="col s12 m12 l12">

        <table id="data-menu" class="table display" cellspacing="0">
            <thead>
            <tr>
                <th
                rowspan="3"style="border: 1px solid black !important; text-align:center !important;">
                    No</th>
                <th
                rowspan="3" style="border: 1px solid black !important; text-align:center !important;">
                    Status</th>
                <th
                rowspan="3" style="border: 1px solid black !important; text-align:center !important;">
                    Jenjang</th>
                <th
                    colspan="18"style="border: 1px solid black !important; text-align:center !important;">
                    Rentang Usia</th>
                <th
                rowspan="3" style="border: 1px solid black !important; text-align:center !important;">
                    Total</th>
                    
                </tr>
            <tr>
                    <!-- <th
                        rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                        No</th>
                    <th
                        rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                        Status</th>
                    <th
                        rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                        Jenjang</th> -->
                    <th 
                        colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                        < 25</th>
                    <th
                        colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                        25 s.d. 35</th>
                    <th
                        colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                        36 s.d. 45</th>
                    <th
                        colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                        46 s.d. 55</th>
                    <th
                        colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                        56 s.d. 60</th>
                    <th
                        colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                        > 60</th>
                    <!-- <th
                        rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                        Total</th>
                     -->
                </tr>
                <tr>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        L</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        P</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        JML</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        L</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        P</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        JML</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        L</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        P</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        JML</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        L</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        P</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        JML</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        L</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        P</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        JML</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        L</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        P</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        JML</th>
                    
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                    $x = 0;
                @endphp
                @foreach ($data as $row)
                    <tr>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $i }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:left !important;">
                            {{ $row->status }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->jenjang }}</td>

                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia25_L }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia25_P }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia25_jumlah }}</td>

                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia25sd35_L }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia25sd35_P }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia25sd35_jumlah }}</td>

                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia36sd45_L }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia36sd45_P }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia36sd45_jumlah }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia46sd55_L }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia46sd55_P }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia46sd55_jumlah }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia56sd60_L }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia56sd60_P }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia56sd60_jumlah }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia60_L }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia60_P }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->usia60_jumlah }}</td>
                        <td
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ $row->total }}</td>
                        {{--
                            @if ($x++ == 0)
                            <td rowspan="{{ count($data) }} + 1"
                            style="border: 1px solid black !important; text-align:center !important;">
                            {{ number_format((float) $totalpercent, 2, '.', '') }}</td>
                            @endif
                            --}}
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
            <thead>
                <tr>
                    <th colspan="3"
                        style="border: 1px solid black !important; text-align:center !important;">
                        Jumlah</th>

                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum25_L }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum25_P }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum25_jumlah }}</th>

                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum25sd35_L }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum25sd35_P }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum25sd35_jumlah }}</th>


                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum36sd45_L }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum36sd45_P }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum36sd45_jumlah }}</th>


                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum46sd55_L }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum46sd55_P }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum46sd55_jumlah }}</th>
                    
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum56sd60_L }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum56sd60_P }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum56sd60_jumlah }}</th>
                    
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum60_L }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum60_P }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $sum60_jumlah }}</th>
                    
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ $total }}</th>
                    
                </tr>

                <tr>
                    <th colspan="3"
                        style="border: 1px solid black !important; text-align:center !important;">
                        Persen (%)</th>

                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum25_L/$totalsemua *100, 2, '.', '') }} </th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum25_P/$totalsemua *100, 2, '.', '') }} </th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum25_jumlah/$totalsemua *100, 2, '.', '') }} </th>

                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum25sd35_L/$totalsemua *100, 2, '.', '') }} </th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum25sd35_P/$totalsemua *100, 2, '.', '') }} </th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum25sd35_jumlah/$total *100, 2, '.', '') }}</th>


                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum36sd45_L/$total *100, 2, '.', '') }} </th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum36sd45_P/$total *100, 2, '.', '') }} </th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum36sd45_jumlah/$total *100, 2, '.', '') }}</th>


                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum46sd55_L/$total *100, 2, '.', '') }} </th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum46sd55_P/$total *100, 2, '.', '') }} </th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum46sd55_jumlah/$total *100, 2, '.', '') }} </th>
                    
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum56sd60_L/$total *100, 2, '.', '') }} </th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum56sd60_P/$total *100, 2, '.', '') }} </th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum56sd60_jumlah/$total *100, 2, '.', '') }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum60_L/$total *100, 2, '.', '') }} </th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum60_P/$total *100, 2, '.', '') }} </th>
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $sum60_jumlah/$total *100, 2, '.', '') }}</th>
                    
                    <th
                        style="border: 1px solid black !important; text-align:center !important;">
                        {{ number_format((float)  $total/$total *100, 2, '.' ,'') }}</th>
                   
                </tr>

                

            </thead>
        </table>
    </div>
</div>
</div>
<br>
<div class="divider"></div>
<div style="margin-top:2em">
                            
                            @foreach($list_sumber as $s)
                            <div><b>RIDA {{$s->periode}}  Tahun {{$tahun}}  </b> <br>{{$s->sumber_data}} </b></div>
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