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
                                <h3>{{ucwords($name)}} - {{$skema}} - {{$tahun}}</h3>
                            </div>
                            <div style="width:100%; display:flex; justify-content:flex-end;margin-bottom:1em;">
                                <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Export</button>
                                <a href="{{ route('rida-periode-rekap-skema-pnbp', ['jenis_skema' => $skema,'tahun' => $tahun]) }}">
                                    <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Detil</button>
                                </a>
                            </div>
                            <?php $route = route('rida-Rekap-Skema-PNBP')?>
                            <form action="{{ $route }}" method="get" enctype="multipart/form-data">
                                <div style="display:grid;grid-template-columns:1fr 5fr;grid-gap:1em">
                                    <div>
                                        <div style="display:flex;width:30%;flex-wrap:wrap;">
                                            <div class="mb-3" style="width:100%;">
                                                <h5><label for="title" class="form-label">Skema</label></h5>
                                                <div style="width:200px">
                                                    <select style="width:100%" id="skema" name="jenis_skema">
                                                        @foreach($list_skema as $s)
                                                            @if($s->jenis_skema === $skema)
                                                                <option selected value="{{$s->jenis_skema}}">{{$s->jenis_skema}}</option>
                                                            @else
                                                                <option value="{{$s->jenis_skema}}">{{$s->jenis_skema}}</option>
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
                                        <div style="margin-top:2em">
                                            <h4>Sumber Data :</h4>
                                            @foreach($list_sumber as $s)
                                            <div><b>{{$s->periode}}</b> berasal dari <b>{{$s->sumber_data}}</b></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div style="grid-column:2" id="container-chart"></div>
                                </div>
                            </form>
                        </div><!-- end col -->
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="col s12 m12 l12" style="grid-column:2">

                        
                            <div class="col-md-12"><h4 class="text-center">Detail Grafik</h4></div>
                            <table style="margin-bottom:5em" id="data-menu" class="table display" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align:center !important;">No</th>
                                        <th style="text-align:center !important;">Tahun</th>
                                        <th style="text-align:center !important;">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                    @foreach ($data as $v)
                                    <tr>
                                        <td style="text-align:center !important;">{{$i}}</td>
                                        <td style="text-align:center !important;">{{$v->tahun_input}}</td>
                                        <td style="text-align:center !important;">{{$v->jumlah}}</td>
                                        <!-- Modal Edit -->
                                    </tr>
                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div><!-- end row -->
                    <div class="row">
                        

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
console.log(data)
const colorList = ["#e8dc2e", "#2ee878", "#2e53e8"]
const lineList = ["Jumlah"]
const mapLineVar = ["jumlah"]
let listJenisSkemaData = []
const labels = []
//generate list label
_.map(data, v =>{
    if(!labels.includes(v.tahun_input)) labels.push(v.tahun_input)
})
console.log(data, labels)
//build hirarki data
_.map(data, v =>{
    let isIncludeJenisSkema = _.filter(listJenisSkemaData, o => o.jenis_skema === v.jenis_skema).length > 0
    // if(!isIncludeJenisSkema){
        listJenisSkemaData.push({
            jenis_skema:v.jenis_skema,
            jumlah: new Array(labels.length).fill(0),
        })
    // }
    let indexStatus = _.findIndex(listJenisSkemaData, {jenis_skema:v.jenis_skema})
    let statusData = listJenisSkemaData[indexStatus]
    let indexPeriode = _.indexOf(labels, v.tahun_input)
    statusData.jumlah[indexPeriode] = v.jumlah
})
listJenisSkemaData = _.orderBy(listJenisSkemaData, ['jenis_skema'], ['asc']);
let container = document.getElementById('container-chart')
//generate canvas
_.map(listJenisSkemaData, (v,i) =>{
    container.innerHTML = container.innerHTML + `
            <div ><canvas id="chart-${i}"></canvas></div>
    `
})
console.log(listJenisSkemaData, "ANU")
//generate canvas
//generate datasets and chart
_.map(listJenisSkemaData, (v,i) =>{
    let datasets = []
    _.map(lineList, (o,p) =>{
        datasets.push({
            label:o,
            data:_.get(v, mapLineVar[p], -999),
            backgroundColor:colorList[p],
            borderColor:colorList[p],
            yAxisID:'jumlah'
        })
    })
    console.log(datasets)
    const myChart =new Chart(document.getElementById(`chart-${i}`).getContext('2d'), {
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
                text: v.jenis_skema
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
})  
</script>
@endsection