@extends('layout.user')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                                <h4>@foreach($nama_table as $nama) {{ucwords( $nama->nama_table )}} @endforeach <br> {{$pusat_studi}} <!--<br>  <br> TAHUN {{$tahun}}--></h4>
                            </div>
                            <div style="width:100%; display:flex; justify-content:flex-end">
                                <a href="{{route( 'rida-export-'.$name , [$pusat_studi, $tahun]) }}">
                                    <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Export</button>
                                </a>

                                <a href="{{route( 'rida-periode-akreditasi_pusdi', [$pusat_studi]) }}">
                                    <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Detail 5 Edisi Terakhir</button>
                                </a>
                            </div>
                            <?php $route = route('rida-akreditasi_pusdi')?>
                            <form action="{{ $route }}" method="get" enctype="multipart/form-data">
                                <div style="display:grid;grid-template-columns:1fr 5fr;grid-gap:1em">
                                    <div>
                                        <div style="display:flex;flex-wrap:wrap;">
                                            <div class="mb-3" style="width:100%;">
                                                <h5><label for="title" class="form-label">Pusat Studi</label></h5>
                                                <div style="width:200px">
                                                    <select style="width:100%" id="pusat_studi" name="pusat_studi" class="select2">
                                                        @foreach($list_pusat_studi as $p)
                                                            @if($p->pusat_studi === $pusat_studi)
                                                                <option selected value="{{$p->pusat_studi}}">{{$p->pusat_studi}}</option>
                                                            @else
                                                                <option value="{{$p->pusat_studi}}">{{$p->pusat_studi}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="mb-3" style="width:100%;">
                                                <h5><label for="title" class="form-label">Tahun</label></h5>
                                                <div style="width:200px">
                                                    <select style="width:100%" id="tahun" name="tahun" class="select2">
                                                        @foreach($list_tahun as $t)
                                                            @if($t->tahun_input === $tahun)
                                                                <option selected value="{{$t->tahun_input}}">{{$t->tahun_input}}</option>
                                                            @else
                                                                <option value="{{$t->tahun_input}}">{{$t->tahun_input}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <button style="margin-top:2em;background-color:blue" type="submit" class="waves-effect waves-light btn primary darken-1">Filter</button>
                                        </div>
                                    </div>
                                    <div style="grid-column:2; margin-top: 20px" id="container-chart">
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
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Pusat Studi</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Edisi</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Tahun</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Status Akreditasi</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Keterangan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $row)

                                    <tr style="border: 1px solid black !important;">
                                        <td style="border: 1px solid black !important;text-align:center !important;">{{$loop->iteration}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->pusat_studi}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->periode}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->tahun_input}}</td>
                                        <td style="border: 1px solid black !important;text-align:center !important;">{{$row->akreditasi}}</td>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});


const data = {!! json_encode($data) !!}
const pusat_studi = {!! json_encode($pusat_studi) !!}
const colorList = ["#565554", "#2EE878"]
const akreditasiList = ["Akreditasi"]
const mapAkreditasiVar = ["akreditasi"]
// const mapAkreditasiVar = {!! json_encode($akreditasi) !!}
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
_.map(akreditasiList, (o,p) =>{
    console.log(o,p)
    datasets.push({
        label:o,
        data:_.map(JSON.parse(JSON.stringify(data)), (v,i) => {
            const val = _.get(v, mapAkreditasiVar[p])
            if(val === "A"){return 4}
            else if(val === "B"){return 3}
            else if(val === "C"){return 2}
            else if(val === "D"){return 1}
            }),
        backgroundColor:colorList[p],
        borderColor:colorList[p],
        yAxisID:'yAxis'
    })
})
console.log(datasets)
const myChart = new Chart(document.getElementById(`chart-id`).getContext('2d'), {
    type: 'bar',
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
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const label = context.dataset.label || '';
                        const value = context.parsed.y
                        let newValue = ''
                        if(value === 1) newValue = 'D'
                        else if(value === 2) newValue = 'C'
                        else if(value === 3) newValue = 'B'
                        else if(value === 4) newValue = 'A'

                        return `${label} : ${newValue}`;
                    }
                }
            },
        title: {
            display: true,
            text: pusat_studi
        }
        },
        scales: {
            yAxis: {
                type: 'linear',
                display: true,
                position: 'left',
                ticks:{
                    beginAtZero: true,
                    min: 0,
                    max: 4,
                    stepSize: 1,
                    callback: function(value, index,values){
                        console.log(values, 'values')
                        console.log(value, 'coba')
                        console.log(this.getLabelForValue(value))
                        if (this.getLabelForValue(value) == 0){
                            return 'Belum Terakreditasi'
                        }
                        else if (this.getLabelForValue(value) == 1){
                            return 'D'
                        }
                        else if (this.getLabelForValue(value) == 2){
                            return 'C'
                        }
                        else if (this.getLabelForValue(value) == 3){
                            return 'B'
                        }
                        else if (this.getLabelForValue(value) == 4){
                            return 'A'
                        }
                        else{
                            return this.getLabelForValue(value)
                        }
                    }
                },
            },
        }
    },
});
</script>
@endsection
