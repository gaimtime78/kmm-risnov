@extends('layout.user')
@section('css')

@endsection



@section('content')

<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3 style="color: #000000;">@foreach($nama_table as $f) {{ucwords($f->nama_table)}} @endforeach </br> {{$fakultas}} </br> {{$periode}} Tahun {{$tahun}}</h3>
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
                        rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                        #</th>
                    <th
                        rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                        Status</th>
                    <th
                        rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                        Jenjang</th>
                    <th 
                        colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                        < 25</th>
                    <th
                        colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                        25 s.d 35</th>
                    <th
                        colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                        36 s.d 45</th>
                    <th
                        colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                        46 s.d 55</th>
                    <th
                        colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                        56 s.d 60</th>
                    <th
                        rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                        Total</th>
                    <th
                        rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                        %</th>
                </tr>
                <tr>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        < 25 L</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        < 25 P</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        JML</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        25 s.d 35 P</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        25 s.d 35 P</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        JML</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        36 s.d 45 L</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        36 s.d 45 P</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        JML</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        46 s.d 55 L</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        46 s.d 55 P</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        JML</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        56 s.d 60 L</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        56 s.d 60 P</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
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
                            style="border: 1px solid black !important; text-align:center !important;">
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
                            {{ $row->total }}</td>
                        @if ($x++ == 0)
                            <td rowspan="{{ count($data) }}"
                                style="border: 1px solid black !important; text-align:center !important;">
                                {{ number_format((float) $totalpercent, 2, '.', '') }} %</td>
                        @endif
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
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum25_L }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum25_P }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum25_jumlah }}</th>

                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum25sd35_L }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum25sd35_P }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum25sd35_jumlah }}</th>


                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum36sd45_L }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum36sd45_P }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum36sd45_jumlah }}</th>


                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum46sd55_L }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum46sd55_P }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum46sd55_jumlah }}</th>
                    
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum56sd60_L }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum56sd60_P }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $sum56sd60_jumlah }}</th>
                    
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        {{ $total }}</th>
                    <th
                        style="border: 1px solid black !important; text-align:justify !important;">
                        </th>
                </tr>

            </thead>
        </table>
    </div>
</div>
</div>
<br>
<div class="divider"></div>
<div style="margin-top:2em">
    <h4>Sumber Data :</h4>
    @foreach($list_sumber as $s)
    <div><b>{{$s->periode}}</b> berasal dari <b>{{$s->sumber_data}}</b></div>
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