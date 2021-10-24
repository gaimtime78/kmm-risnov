@extends('layout.application')

@section('css')
    <link href="{{ asset('js/plugins/data-tables/css/jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/plugins/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/data-tables/data-tables-script.js') }}"></script>
@endsection


@section('content')
    @include('layout.navbar')
    <!-- START MAIN -->
        <div id="main">
    <!-- START WRAPPER -->
        <div class="wrapper">
    @include('layout.menu')
	<!-- START CONTENT -->
           <!-- START CONTENT -->
    <section id="content">
      <!--breadcrumbs start-->
      <div id="breadcrumbs-wrapper">
          <!-- Search for small screen -->
        <div class="header-search-wrapper grey hide-on-large-only">
            <i class="mdi-action-search active"></i>
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
        </div>
        <div class="container">
          <!-- <div class="row">
            <div class="col s12 m12 l12">
              <h5 class="breadcrumbs-title">agenda</h5>
              <ol class="breadcrumbs">
                  <li><a href="index.htm">Dashboard</a></li>
                  <li><a href="#">Tables</a></li>
                  <li class="active">Basic Tables</li>
              </ol>
            </div>
          </div> -->
        </div>
      </div>
      <!--breadcrumbs end-->
      <!--start container-->
      <div class="container">
        <div class="section">    
          <!--DataTables example-->
          @if (session('message'))
          <div style="background-color: #aee8e2; border-radius:10px; padding:10px; margin-bottom:10px;">
            <b>{{ session('message') }}</b>
          </div>
          @endif

          <div id="table-datatables">
          
            <h4 class="header left">Tabel 23 H-INDEKS PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT</h4>
            <!-- <a href="{{route('admin.agenda.create')}}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Agenda</a> -->
            <div class="row">
              <div class="col s12 m12 l12">
              
            <table style="border-collapse: collapse; ">
                <tr>
                    <td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="2" rowspan="2">H-index</td>
                    <td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="13">FAKULTAS</td>
                    <td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="2" rowspan="2">JUMLAH</td>
                </tr>
                <tr>
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
                        <td style="border: 1px solid black; padding: 4px; text-align:center;" rowspan="2">{{ $h_index }}</td>
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">Jumlah</td>
                    @else
                         <td style="border: 1px solid black; padding: 4px; text-align:center;" colspan="2" rowspan="2">Jumlah</td>
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
                        <td style="border: 1px solid black; padding: 4px; text-align:center;">Percent</td>
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
          <br>
          <div class="divider"></div> 
          <!--DataTables example Row grouping-->
        </div>
      </div>
      <!--end container-->

    </section>
    <!-- END CONTENT -->
            @if (session('message'))
            <div style="background-color: #aee8e2; border-radius:10px; padding:10px; margin-bottom:10px;">
                <b>{{ session('message') }}</b>
            </div>
            @endif
            
                            
<!-- END CONTENT -->
@endsection