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

          <div id="table-datatables">\
          
            <h4 class="header left">Tabel 7 H-INDEKS PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT</h4>
            <!-- <a href="{{route('admin.agenda.create')}}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Agenda</a> -->
            <div class="row">
              <div class="col s12 m12 l12">
              
                <table id="data-menu" class="table display" cellspacing="0" style="border-collapse: collapse !important;">
                  <thead>
                      <tr style="border: 1px solid black !important;">
                          <th  colspan="1" style="border: 1px solid black !important; text-align:center !important;">#</th>
                          <th  rowspan="2" style="text-align:justify !important;">Fakultas</th>
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
                          <th  rowspan="2" style="border: 1px solid black !important;text-align:justify !important;">Jumlah Total</th>
                          <th  rowspan="2" style="border: 1px solid black !important;text-align:justify !important;">Percent (%)</th>
                          <th  rowspan="2" style="border: 1px solid black !important;text-align:justify !important;">Action</th>

                      </tr>
                      <tr >
                          <th style="border: 1px solid black !important;text-align:justify !important;">No</th>
                          
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
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->jumlahtotal}}</td>
                          <td style="border: 1px solid black !important;text-align:center !important;">{{$row->percenttotal}}%</td>
                          <td><a href="#" class="btn modal-trigger" style="background-color: orange;">Edit</a>   <a href="#hapus" class="btn modal-trigger" style="background-color: red;">Delete</a></td>
                          <!-- Modal Edit -->
                          <div id="#" class="modal modal-fixed-footer">
                            <form action="#" method="post">
                              @csrf
                              <div class="modal-content">
                                <h4>Edit Data</h4>
                                <hr>
                                <div class="row">
                                  <div class="input-field col s12">
                                    <input value="{{$row->title}}" id="title" name="title"  type="text" class="validate" required>
                                    <label for="title">RIDA title</label>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="mb-3" style="margin-left:8px">
                                    <label for="date">Rida date</label>
                                    <input value="{{$row->date}}" id="date"  name="date"  type="date" class="validate" required>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="mb-3" style="margin-left:8px">
                                    <label for="time">Rida time</label>
                                    <input value="{{$row->time}}" id="time"  name="time"  type="time" class="validate" required>
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