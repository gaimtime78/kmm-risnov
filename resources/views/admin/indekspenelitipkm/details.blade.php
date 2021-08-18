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
          
            <h4 class="header left">Tabel 17 H-INDEKS PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT</h4>
            <!-- <a href="{{route('admin.agenda.create')}}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Agenda</a> -->
            <div class="row">
              <div class="col s12 m12 l12">
              
                <table id="data-menu" class="table display" cellspacing="0" style="border-collapse: collapse !important;">
                  <thead>
                      <tr style="border: 1px solid black !important;">
                          <th  rowspan="3" style="border: 1px solid black !important; text-align:center !important;">No</th>
                          <th  rowspan="3" style="text-align:justify !important;">Fakultas</th>
                          <th  colspan="46" style="border: 1px solid black !important; text-align:center !important;">H - I N D E K S</th>
                          <th  rowspan="3" style="border: 1px solid black !important;text-align:justify !important;">Action</th>

                      </tr>
                      <tr style="border: 1px solid black !important;">
                          
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">0</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">1</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">2</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">3</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">4</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">5</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">6</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">7</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">8</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">9</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">10</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">11</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">12</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">13</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">14</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">15</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">16</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">17</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">18</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">19</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">20</th>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">21</th>
                          <th  rowspan="2" style="border: 1px solid black !important;text-align:justify !important;">Jumlah Total</th>
                          <th  rowspan="2" style="border: 1px solid black !important;text-align:justify !important;">Percent (%)</th>

                      </tr>
                      <tr >
                          
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Jumlah</th>
                          <th style="border: 1px solid black !important;text-align:justify !important;">Percent</th>
                      </tr>
                  </thead>
                  <tbody>
                  @php
                      $i = 1;
                    @endphp
                      @foreach ($indekspenelitipkm as $row)
                      <tr style="border: 1px solid black !important;">
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$i}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->fakultas}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah0}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent0}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah1}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent1}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah2}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent2}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah3}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent3}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah4}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent4}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah5}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent5}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah6}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent6}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah7}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent7}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah8}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent8}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah9}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent9}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah10}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent10}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah11}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent11}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah12}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent12}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah13}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent13}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah14}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent14}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah15}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent15}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah16}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent16}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah17}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent17}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah18}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent18}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah19}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent19}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah20}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent20}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlah21}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percent21}}%</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlahtotal}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percenttotal}}%</td>
                          <td style="border: 1px solid black !important;"><a href="#edit{{ $row->id }}" class="btn modal-trigger" style="background-color: orange;">Edit</a></td>
                          <!-- Modal Edit -->
                          <div id="edit{{ $row->id }}" class="modal modal-fixed-footer">
                            <form
                                action="{{ route('admin.indekspenelitipkm.updaterow', $row->id) }}"
                                method="post">
                              @csrf
                              <div class="modal-content">
                                <h4>Edit Data Row {{ $row->status }}
                                    {{ $row->jenjang }} {{ $row->fakultas }}
                                    {{ $row->periode }} {{ $row->tahun_input }}</h4>
                                    <div class="divider"></div>
                                    <p>Indeks 0</p>
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input value="{{ $row->jumlah0 }}"
                                        id="jumlah0" name="jumlah0"
                                        type="text" class="validate" required>
                                        <label for="jumlah0">0</label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input value="{{ $row->percent0 }}"
                                        id="percent0" name="percent0"
                                        type="text" class="validate" required>
                                        <label for="percent0">%</label>
                                      </div>
                                    </div>
                                    
                                    <p>Indeks 1</p>
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input value="{{ $row->jumlah1 }}"
                                        id="jumlah1" name="jumlah1"
                                        type="text" class="validate" required>
                                        <label for="jumlah1">1</label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input value="{{ $row->percent1 }} %"
                                        id="percent1" name="percent1"
                                        type="text" class="validate" required>
                                        <label for="percent1">%</label>
                                      </div>
                                    </div>

                                    <p>Indeks 2</p>
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input value="{{ $row->jumlah2 }}"
                                        id="jumlah2" name="jumlah2"
                                        type="text" class="validate" required>
                                        <label for="jumlah2">2</label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input value="{{ $row->percent2 }} %"
                                        id="percent2" name="percent2"
                                        type="text" class="validate" required>
                                        <label for="percent2">%</label>
                                      </div>
                                    </div>
                                    
                                    <p>Indeks 3</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah3 }}"
                                                id="jumlah3" name="jumlah3"
                                                type="text" class="validate" required>
                                            <label for="jumlah3">3</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent3 }} %"
                                                id="percent3" name="percent3"
                                                type="text" class="validate" required>
                                            <label for="percent3">%</label>
                                        </div>
                                    </div>
                                    
                                    <p>Indeks 4</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah4 }}"
                                                id="jumlah4" name="jumlah4"
                                                type="text" class="validate" required>
                                            <label for="jumlah4">4</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent4 }} %"
                                                id="percent4" name="percent4"
                                                type="text" class="validate" required>
                                            <label for="percent4">%</label>
                                        </div>
                                    </div>

                                    <p>Indeks 5</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah5 }}"
                                                id="jumlah5" name="jumlah5"
                                                type="text" class="validate" required>
                                            <label for="jumlah5">5</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent5 }} %"
                                                id="percent5" name="percent5"
                                                type="text" class="validate" required>
                                            <label for="percent5">%</label>
                                        </div>
                                    </div>

                                    <p>Indeks 6</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah6 }}"
                                                id="jumlah6" name="jumlah6"
                                                type="text" class="validate" required>
                                            <label for="jumlah6">6</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent6 }} %"
                                                id="percent6" name="percent6"
                                                type="text" class="validate" required>
                                            <label for="percent6">%</label>
                                        </div>
                                    </div>

                                    <p>Indeks 7</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah7 }}"
                                                id="jumlah7" name="jumlah7"
                                                type="text" class="validate" required>
                                            <label for="jumlah7">7</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent7 }} %"
                                                id="percent7" name="percent7"
                                                type="text" class="validate" required>
                                            <label for="percent7">%</label>
                                        </div>
                                    </div>

                                    <p>Indeks 8</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah8 }}"
                                                id="jumlah8" name="jumlah8"
                                                type="text" class="validate" required>
                                            <label for="jumlah8">8</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent8 }} %"
                                                id="percent8" name="percent8"
                                                type="text" class="validate" required>
                                            <label for="percent8">%</label>
                                        </div>
                                    </div>
                                    
                                    <p>Indeks 9</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah9 }}"
                                                id="jumlah9" name="jumlah9"
                                                type="text" class="validate" required>
                                            <label for="jumlah9">9</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent9 }} %"
                                                id="percent9" name="percent9"
                                                type="text" class="validate" required>
                                            <label for="percent9">%</label>
                                        </div>
                                    </div>

                                    <p>Indeks 10</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah10 }}"
                                                id="jumlah10" name="jumlah10"
                                                type="text" class="validate" required>
                                            <label for="jumlah10">10</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent10 }} %"
                                                id="percent10" name="percent10"
                                                type="text" class="validate" required>
                                            <label for="percent10">%</label>
                                        </div>
                                    </div>

                                    <p>Indeks 11</p>
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input value="{{ $row->jumlah11 }}"
                                        id="jumlah11" name="jumlah0"
                                        type="text" class="validate" required>
                                        <label for="jumlah11">11</label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input value="{{ $row->percent11 }} %"
                                        id="percent11" name="percent11"
                                        type="text" class="validate" required>
                                        <label for="percent11">%</label>
                                      </div>
                                    </div>
                                    
                                    <p>Indeks 12</p>
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input value="{{ $row->jumlah12 }}"
                                        id="jumlah12" name="jumlah12"
                                        type="text" class="validate" required>
                                        <label for="jumlah12">12</label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input value="{{ $row->percent12 }} %"
                                        id="percent12" name="percent12"
                                        type="text" class="validate" required>
                                        <label for="percent12">%</label>
                                      </div>
                                    </div>

                                    <p>Indeks 13</p>
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input value="{{ $row->jumlah13 }}"
                                        id="jumlah13" name="jumlah13"
                                        type="text" class="validate" required>
                                        <label for="jumlah13">13</label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="input-field col s12">
                                        <input value="{{ $row->percent13 }} %"
                                        id="percent13" name="percent13"
                                        type="text" class="validate" required>
                                        <label for="percent13">%</label>
                                      </div>
                                    </div>
                                    
                                    <p>Indeks 14</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah14 }}"
                                                id="jumlah14" name="jumlah14"
                                                type="text" class="validate" required>
                                            <label for="jumlah14">14</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent14 }} %"
                                                id="percent14" name="percent14"
                                                type="text" class="validate" required>
                                            <label for="percent14">%</label>
                                        </div>
                                    </div>
                                    
                                    <p>Indeks 15</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah15 }}"
                                                id="jumlah15" name="jumlah15"
                                                type="text" class="validate" required>
                                            <label for="jumlah15">15</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent15 }} %"
                                                id="percent15" name="percent15"
                                                type="text" class="validate" required>
                                            <label for="percent15">%</label>
                                        </div>
                                    </div>

                                    <p>Indeks 16</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah16 }}"
                                                id="jumlah16" name="jumlah16"
                                                type="text" class="validate" required>
                                            <label for="jumlah16">16</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent16 }} %"
                                                id="percent16" name="percent16"
                                                type="text" class="validate" required>
                                            <label for="percent16">%</label>
                                        </div>
                                    </div>

                                    <p>Indeks 17</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah17 }}"
                                                id="jumlah17" name="jumlah17"
                                                type="text" class="validate" required>
                                            <label for="jumlah17">17</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent17 }} %"
                                                id="percent17" name="percent17"
                                                type="text" class="validate" required>
                                            <label for="percent17">%</label>
                                        </div>
                                    </div>

                                    <p>Indeks 18</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah18 }}"
                                                id="jumlah18" name="jumlah18"
                                                type="text" class="validate" required>
                                            <label for="jumlah18">18</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent18 }} %"
                                                id="percent18" name="percent18"
                                                type="text" class="validate" required>
                                            <label for="percent18">%</label>
                                        </div>
                                    </div>

                                    <p>Indeks 19</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah19 }}"
                                                id="jumlah19" name="jumlah19"
                                                type="text" class="validate" required>
                                            <label for="jumlah19">19</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent19 }} %"
                                                id="percent19" name="percent19"
                                                type="text" class="validate" required>
                                            <label for="percent19">%</label>
                                        </div>
                                    </div>
                                    
                                    <p>Indeks 20</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah20 }}"
                                                id="jumlah20" name="jumlah20"
                                                type="text" class="validate" required>
                                            <label for="jumlah20">20</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent20 }} %"
                                                id="percent20" name="percent20"
                                                type="text" class="validate" required>
                                            <label for="percent20">%</label>
                                        </div>
                                    </div>

                                    <p>Indeks 21</p>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->jumlah21 }}"
                                                id="jumlah21" name="jumlah21"
                                                type="text" class="validate" required>
                                            <label for="jumlah21">21</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input value="{{ $row->percent21 }} %"
                                                id="percent21" name="percent21"
                                                type="text" class="validate" required>
                                            <label for="percent21">%</label>
                                        </div>
                                    </div>
                                
                                
                                
                              </div>
                              <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                                <button type="submit" class="modal-close waves-effect waves-green btn-flat">Update</button>
                              </div>
                            </form>
                          </div>
                          <!-- Modal Hapus -->
                          <div id="hapus" class="modal">
                            <form action="#" method="get">
                              @csrf
                              <div class="modal-content">
                                <h4>Delete Agenda</h4>
                                <hr>
                                <p>Anda yakin ingin menghapus agenda {{$row->title}}?</p>
                              <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                                <button type="submit" class="modal-close waves-effect waves-green btn-flat">Delete</button>
                              </div>
                            </form>
                          </div>
                      </tr>
                      @php
                        $i++;
                      @endphp
                      @endforeach
                      
                  </tbody>
                  <thead>
                      <tr>
                          <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">Jumlah Universitas Sebelas Maret</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah0}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent0}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah1}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent1}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah2}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent2}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah3}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent3}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah4}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent4}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah5}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent5}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah6}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent6}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah7}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent7}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah8}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent8}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah9}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent9}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah10}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent10}}%</th>

                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah11}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent11}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah12}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent12}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah13}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent13}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah14}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent14}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah15}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent15}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah16}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent16}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah17}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent17}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah18}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent18}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah19}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent19}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah20}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent20}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jumlah21}}</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percent21}}%</th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$jmltotalfak}} </th>
                          <th style="border: 1px solid black !important; text-align:center !important;">{{$percenttotalfak}}% </th>
                      </tr>
                      
                  </thead>
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