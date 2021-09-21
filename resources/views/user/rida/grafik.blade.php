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
                                <h3>@foreach($nama_table as $f) {{ucwords($f->nama_table)}} @endforeach  - {{$fakultas}} - {{$tahun}}</h3>
                            </div>
                            <div style="width:100%; display:flex; justify-content:flex-end">
                                <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Export</button>
                                <a href="{{route( 'rida-periode-'.$name , [$fakultas, $tahun]) }}">
                                    <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Detil</button>
                                </a>
                            </div>
                            <?php $route = route('rida-'.$name)?>
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
                    </div><!-- end row -->
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
const colorList = ["#e8dc2e", "#2ee878", "#2e53e8", "#722ee8", "#e82ed2", "#ed1a59"]
const usiaList = ["25 sd 35", "36 sd 45", "46 sd 55", "56 sd 65", "66 sd 75", "> 75"]
const mapUsiaVar = ["list_25sd35", "list_36sd45", "list_46sd55", "list_56sd65", "list_66sd75", "list_75"]
const labels = []
const listStatus = ["PNS", "CPNS", "NON PNS", "CALON NON PNS", "PURNA", "KP", "PNS DPK"]
let listStatusData = []
//generate list label
_.map(data, v =>{
    if(!labels.includes(v.periode)) labels.push(v.periode)
})
//build hirarki data
_.map(data, v =>{
    let isIncludeStatus = _.filter(listStatusData, o => o.status === v.status).length > 0
    if(!isIncludeStatus){
        listStatusData.push({
            status:v.status,
            list_25sd35: new Array(labels.length).fill(0),
            list_36sd45: new Array(labels.length).fill(0),
            list_46sd55: new Array(labels.length).fill(0),
            list_56sd65: new Array(labels.length).fill(0),
            list_66sd75: new Array(labels.length).fill(0),
            list_75: new Array(labels.length).fill(0),
        })
    }
    let indexStatus = _.findIndex(listStatusData, {status:v.status})
    let statusData = listStatusData[indexStatus]
    let indexPeriode = _.indexOf(labels, v.periode)
    statusData.list_25sd35[indexPeriode] = v.usia25sd35_jumlah
    statusData.list_36sd45[indexPeriode] = v.usia36sd45_jumlah
    statusData.list_46sd55[indexPeriode] = v.usia46sd55_jumlah
    statusData.list_56sd65[indexPeriode] = v.usia56sd65_jumlah
    statusData.list_66sd75[indexPeriode] = v.usia66sd75_jumlah
    statusData.list_75[indexPeriode] = v.usia75_jumlah

})

// listStatusData = _.orderBy(listStatusData, ['status'], ['asc']);
listStatusData = _.orderBy(listStatusData);
let container = document.getElementById('container-chart')
//generate canvas
_.map(listStatusData, (v,i) =>{
    container.innerHTML = container.innerHTML + `<div ><canvas id="chart-${i}"></canvas></div>`
})
//generate datasets and chart
_.map(listStatusData, (v,i) =>{
    let datasets = []
    _.map(usiaList, (o,p) =>{
        datasets.push({
            label:o,
            data:_.get(v, mapUsiaVar[p], -999),
            backgroundColor:colorList[p],
            borderColor:colorList[p],
            yAxisID:'jumlah'
        })
    })
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
                text: v.status
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