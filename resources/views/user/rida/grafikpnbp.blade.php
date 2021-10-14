@extends('layout.user')
@section('css')

@endsection

@section('content')
        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                            <h3  style="color: #000000;">Dokumentasi Riset Inovasi Dalam Angka</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
        @if(count($list_tahun) <= 0)
        <h2 class="text-center">Data tidak ditemukan</h2>
        @else
        <section class="section db p120">
            <div class="container">
                <div class="boxed boxedp4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" page-title text-center">
                                <h4>@foreach($nama_table as $nama) {{ucwords( $nama->nama_table )}} @endforeach <br> {{$fakultas}} <!--<br>  <br> TAHUN {{$tahun}}--></h4>
                            </div>
                            <div style="width:100%; display:flex; justify-content:flex-end">
                                <a href="{{route( 'rida-export-'.$name , [$fakultas, $tahun]) }}">
                                    <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Export</button>
                                </a>
                                
                                <a href="{{route( 'rida-periode-hibah-pnbp', [$fakultas]) }}">
                                    <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Detail 5 Edisi Terakhir</button>
                                </a>
                            </div>
                            <?php $route = route('rida-Hibah-PNBP')?>
                            <form action="{{ $route }}" method="get" enctype="multipart/form-data">
                                <div style="display:grid;grid-template-columns:1fr 5fr;grid-gap:1em">
                                    <div>
                                        <div style="display:flex;width:30%;flex-wrap:wrap;">
                                            <div class="mb-3" style="width:100%;">
                                                <h5><label for="title" class="form-label">Fakultas</label></h5>
                                                <div style="width:200px">
                                                    <select style="width:100%" id="fakultas" name="fakultas">
                                                        @foreach($list_fakultas as $f)
                                                            @if($f->fakultas === $fakultas)
                                                                <option selected value="{{$f->fakultas}}">{{$f->fakultas}}</option>
                                                            @else
                                                                <option value="{{$f->fakultas}}">{{$f->fakultas}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>    
                                                </div>
                                            </div>
                                            <div class="mb-3" style="width:100%;">
                                                <h5><label for="title" class="form-label">Tahun</label></h5>
                                                <div style="width:200px">
                                                    <select style="width:100%" id="tahun" name="tahun">
                                                        @foreach($list_tahun as $t)
                                                            @if($t->tahun_input === $tahun)
                                                                <option selected value="{{$t->tahun_input}}">{{$t->tahun_input}}</option>
                                                            @else
                                                                <option value="{{$t->tahun_input}}">{{$t->tahun_input}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>    
                                                </div>
                                            </div>
                                            <button style="margin-top:2em;background-color:blue" type="submit" class="waves-effect waves-light btn primary darken-1">Filter</button>
                                        </div>
                                    </div>
                                    <div style="grid-column:2" id="container-chart">
                                        <div ><canvas id="chart-id"></canvas></div>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="data-menu" class="table display" cellspacing="0" style="border-collapse: collapse !important;">
                                <thead>
                                    <tr style="border: 1px solid black !important;">
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">No</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Fakultas</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Edisi</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Tahun</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Usulan</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Diterima</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Keterangan</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($data as $row)
                                    
                                    <tr style="border: 1px solid black !important;">
                                        <td style="border: 1px solid black !important;text-align:center !important;">{{$loop->iteration}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->fakultas}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->periode}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->tahun_input}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->usulan_lanjutan + $row->usulan_baru}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->diterima}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->sumber_data}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <thead>
                                <!-- <tr>
                                    <th  colspan="2" style="border: 1px solid black !important; text-align:center !important;">Jumlah Universitas Sebelas Maret</th>
                                </tr>
                                    -->
                            </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- end container -->
        </section><!-- end section -->
        @endif
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('design\js\chart.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('design\js\lodash.min.js') }}"></script>
<script>
const data = {!! json_encode($data) !!}
const tahun = {!! json_encode($tahun) !!}
const colorList = ["#e8dc2e", "#2ee878", "#2e53e8"]
const usulanList = ["Usulan", "Diterima"]
const mapUsulanVar = ["usulan_lanjutan", "usulan_baru", "diterima"]
const labels = []
//generate list label
_.map(data, v =>{
    if(!labels.includes(v.tahun_input)) labels.push(v.tahun_input)
})
console.log(data, labels)
//build hirarki data
//generate canvas
//generate datasets and chart
let datasets = []
_.map(usulanList, (o,p) =>{
    console.log(o,p)
    if(o === "Usulan"){
        datasets.push({
            label:o,
            data:_.map(JSON.parse(JSON.stringify(data)), (v,i) => _.get(v, 'usulan_lanjutan', -999)*1 + _.get(v, 'usulan_baru', -999)*1),
            backgroundColor:colorList[p],
            borderColor:colorList[p],
            yAxisID:'jumlah'
        })
    }else{
        datasets.push({
            label:o,
            data:_.map(JSON.parse(JSON.stringify(data)), (v,i) => _.get(v, 'diterima', -999)),
            backgroundColor:colorList[p],
            borderColor:colorList[p],
            yAxisID:'jumlah'
        })
    }
    
})
console.log(datasets)
const myChart = new Chart(document.getElementById(`chart-id`).getContext('2d'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: datasets,
    },
    options: {
        responsive: true,
        interaction: {
        mode: 'index',
        intersect: false,
        },
        stacked: false,
        plugins: {
        title: {
            display: true,
            text: tahun
        }
        },
        scales: {
        jumlah: {
            type: 'linear',
            display: true,
            position: 'left',
        },
        }
    },
});

// const keyToKeep = ['periode', 'tahun_input', 'usulan_lanjutan', 'usulan_baru', 'diterima'];

// const redux = array => array.map(o => keyToKeep.reduce((acc, curr) => {
//   acc[curr] = o[curr];
//   return acc;
// }, {}));

// function generateTableHead(table, data) {
//   let thead = table.createTHead();
//   let row = thead.insertRow();
//   for (let key of data) {
//     let th = document.createElement("th");
//     let text = document.createTextNode(key);
//     th.appendChild(text);
//     row.appendChild(th);
//   }
// }

// function generateTable(table, data) {
//   for (let element of data) {
//     let row = table.insertRow();
//     for (key in element) {
//       let cell = row.insertCell();
//       let text = document.createTextNode(element[key]);
//       cell.appendChild(text);
//     }
//   }
// }

// let table = document.querySelector("table");
// let header = ["Periode", "Tahun", "Usulan Lanjutan", "Usulan Baru", "Diterima"];
// let dataChosen = redux(data);
// generateTableHead(table, header);
// generateTable(table, dataChosen);
</script>
@endsection