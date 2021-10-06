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
        <div class="boxed boxedp4" style="width: min-content;">
            <div class="row">
                <div id="table-datatables">
                    <div class="col s12 m12 l12">
                        <table id="data-menu" class="table display" cellspacing="0" style="border-collapse: collapse !important;">
                            <thead>
                                <tr style="border: 1px solid black !important;">
                                    <th  rowspan="3" style="border: 1px solid black !important; text-align:center !important;">No</th>
                                    <th  rowspan="3" style="border: 1px solid black !important; text-align:center !important;">Fakultas</th>
                                    <th  colspan="46" style="border: 1px solid black !important; text-align:center !important;">H - I N D E K S</th>
                                </tr>
                               
                                
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                                @foreach ($data as $row)
                                <tr style="border: 1px solid black !important;">
                                    <td rowspan="8" style="vertical-align: middle; border: 1px solid black !important;text-align:center !important;">{{$i}}</td>
                                    <td rowspan="8" style="vertical-align: middle; border: 1px solid black !important;text-align:center !important;">{{$row->fakultas}}</td>
                                </tr>

                                <tr style="border: 1px solid black !important;">
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">0</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">1</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">2</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">3</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">4</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">5</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">6</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">7</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">8</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">9</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">10</th>
                            
                                    <th  rowspan="2" style="background-color: cyan; border: 1px solid black !important;text-align:justify !important;">Jumlah Total</th>
                                    <th  rowspan="2" style="background-color: cyan; border: 1px solid black !important;text-align:justify !important;">Percent (%)</th>

                                </tr>
                                <tr >
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                </tr>

                                <tr>
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

                                    <td rowspan="8" style="vertical-align: middle; border: 1px solid black !important;text-align:center !important;">{{$row->jumlahtotal}}</td>
                                    <td rowspan="8" style="vertical-align: middle; border: 1px solid black !important;text-align:center !important;">{{$row->percenttotal}}%</td>
                                
                                </tr>
                                <tr>
                                    <th></th>
                                </tr>
                                    
                                <tr style="border: 1px solid black !important;">
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">11</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">12</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">13</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">14</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">15</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">16</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">17</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">18</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">19</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">20</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">21</th>
                                </tr>
                                <tr >
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">Jml</th>
                                    <th style="background-color: yellow; border: 1px solid black !important;text-align:center !important;">%</th>
                                </tr>
                                <tr>
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
                                    
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                
                            </tbody>
                            <thead>
                                <tr>
                                    <th  rowspan="6" colspan="2" style="background-color: #80eb80; vertical-align: middle; border: 1px solid black !important; text-align:center !important;">Jumlah Universitas Sebelas Maret</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">0</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">1</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">2</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">3</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">4</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">5</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">6</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">7</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">8</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">9</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">10</th>

                                    <th rowspan="6"style="vertical-align: middle; border: 1px solid black !important; text-align:center !important;">{{$jmltotalfak}} </th>
                                    <th rowspan="6"style="vertical-align: middle; border: 1px solid black !important; text-align:center !important;">{{$percenttotalfak}}% </th>
                                </tr>
                                <tr>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah0}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent0}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah1}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent1}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah2}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent2}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah3}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent3}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah4}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent4}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah5}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent5}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah6}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent6}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah7}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent7}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah8}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent8}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah9}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent9}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah10}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent10}}%</th>

                                   
                                </tr>
                                <tr>
                                    <th></th>
                                </tr>
                              
                                
                                <tr style="border: 1px solid black !important;">
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">11</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">12</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">13</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">14</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">15</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">16</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">17</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">18</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">19</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">20</th>
                                    <th  colspan="2" style="background-color: cyan; border: 1px solid black !important; text-align:center !important;">21</th>
                                </tr>
                                <tr>
                                    
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah11}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent11}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah12}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent12}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah13}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent13}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah14}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent14}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah15}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent15}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah16}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent16}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah17}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent17}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah18}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent18}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah19}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent19}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah20}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent20}}%</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$jumlah21}}</th>
                                    <th style=" border: 1px solid black !important; text-align:center !important;">{{$percent21}}%</th>
                                    
                                   
                                </tr>
                                
                            </thead>
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