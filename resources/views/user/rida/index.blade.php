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
                                                Dokumentasi</th>
                                            <th
                                                rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                                                Action</th>
                            
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                                $x = 0;
                                            @endphp

                                            @foreach ( $dataUsiaProduktifDoktor as $magister)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $magister->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Usia-Produktif-Doktor',['jenjang'=> $magister->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ( $dataUsiaProduktifMagister as $magister)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $magister->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Usia-Produktif-Magister',['jenjang'=> $magister->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach
                                            
                                            @foreach ( $dataUsiaProduktifSp_2 as $magister)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $magister->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Usia-Produktif-Sp_2',['jenjang'=> $magister->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach
                                           
                                            @foreach ( $dataUsiaProduktifSp_1k  as $magister)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $magister->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Usia-Produktif-Sp_1K',['jenjang'=> $magister->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach
                                            
                                            @foreach ( $dataUsiaProduktifSp_1  as $magister)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $magister->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Usia-Produktif-Sp_1',['jenjang'=> $magister->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach
                                            
                                            @foreach ( $dataUsiaProduktifProfesi  as $magister)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $magister->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Usia-Produktif-Profesi',['jenjang'=> $magister->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach
                                            
                                            @foreach ( $dataMagister as $magister)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $magister->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Tendik-Magister',['jenjang'=> $magister->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ( $dataProfesi as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $row->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Tendik-Profesi',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ( $dataSarjana as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $row->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Tendik-Sarjana',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ( $dataDiploma4 as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $row->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Tendik-Diploma4',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ( $dataDiploma3 as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $row->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Tendik-Diploma3',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            
                                            @foreach ( $dataDiploma2 as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $row->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Tendik-Diploma2',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ( $dataDiploma1 as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $row->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Tendik-Diploma1',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ( $dataSlta as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $row->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                   <a href="{{ route ('rida-Tendik-Slta',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ( $dataSltp as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $row->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Tendik-Sltp',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ( $dataSd as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{ $row->nama_table }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Tendik-Sd',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ($data as $row)
                                            <tr>
                                                <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                   {{$row->nama_table}}</td>
                                            
                                                <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Doktor',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
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
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Magister',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
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
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-profesi',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
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
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Sp-2',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
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
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Sp-1k',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
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
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Sp-1',['jenjang'=> $row->jenjang]) }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            
                                            @foreach ($dataindeksPenelitiPKM as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-H-indeksPenelitiPKM') }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ($datarekaphibahpnbp as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Rekap-Skema-PNBP') }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ($datahibahpnbp as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-Hibah-PNBP') }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
                                                </td>
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach

                                            @foreach ($dataskema_non_pnbp as $row)
                                                <tr>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    {{ $i }}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:left !important;">
                                                    {{$row->nama_table}}</td>
                                                    <td
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    <a href="{{ route ('rida-skema-non-pnbp') }}" class="btn" style="background-color: #43cae9 ;">Detail</a>
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