@extends('layout.user')
@section('css')

@endsection

@section('content')
        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                             <h3 style="color: #000000;">Dokumentasi RIDA</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">
                    <div class="row">
                        <div id="table-datatables">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <table id="data-menu" class="table display" cellspacing="0">
                                        <thead>
                                            <th
                                                rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                                                No.</th>
                                            <th
                                                rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                                                Nama Table</th>
                                            <th
                                                rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                                                Action</th>
                            
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
                                                   {{$row->nama_table}}</td>
                                            
                                                <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Doktor',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail {{ $row->jenjang}}</a>
                                                    </td>
                                                </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach
                                            
                                            @foreach ($data2 as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Magister',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail {{ $row->jenjang}}</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ($data3 as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-profesi',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail {{ $row->jenjang}}</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ($data4 as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Sp-2',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail {{ $row->jenjang}}</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ($data5 as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Sp-1',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail {{ $row->jenjang}}</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ($data6 as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Sp-2',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail {{ $row->jenjang}}</a>
                                                </td>
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
                </div>
            </div>  <!-- end container -->
        </section>  
@endsection

@section('js')

@endsection