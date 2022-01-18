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
                                <h3>{{ucwords($name)}} - {{$pusat_studi}} - {{$tahun}}</h3>
                            </div>
                            <div style="width:100%; display:flex; justify-content:flex-end;margin-bottom:1em;">
                                <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Export</button>

                               {{-- <a href="{{ route('rida-detail-kerjasama-penelitian', ['pusat_studi' => $pusat_studi,'tahun' => $tahun]) }}">
                                    <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Detil</button>
                                </a> --}}
                            </div> 
                            <?php $route = route('rida-'.$name)?>
                            <form action="{{ $route }}" method="get" enctype="multipart/form-data">
                                <div style="display:grid;grid-template-columns:1fr 5fr;grid-gap:1em">
                                    <div>
                                        <div style="display:flex;width:30%;flex-wrap:wrap;">
                                            <div class="mb-3" style="width:100%;">
                                                <h5><label for="title" class="form-label">Pusat Studi</label></h5>
                                                <div style="width:200px">
                                                    <select style="width:100%" id="pusat_studi" name="pusat_studi">
                                                        @foreach($list_pusat_studi as $s)
                                                            @if($s->pusat_studi === $pusat_studi)
                                                                <option selected value="{{$s->pusat_studi}}">{{$s->pusat_studi}}</option>
                                                            @else
                                                                <option value="{{$s->pusat_studi}}">{{$s->pusat_studi}}</option>
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
                    <div class="row">
                        <div class="col-md-12">
                            <table id="data-menu" class="table display" cellspacing="0" style="border-collapse: collapse !important;">
                                <thead>
                                    <tr style="border: 1px solid black !important;">
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">No</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Pusat Studi</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Edisi</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Tahun</th>
                                        <th style="border: 1px solid black !important; text-align:center !important; vertical-align:middle !important;">Jumlah</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($data as $row)
                                    
                                    <tr style="border: 1px solid black !important;">
                                        <td style="border: 1px solid black !important;text-align:center !important;">{{$loop->iteration}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->pusat_studi}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->periode}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->tahun_input}}</td>
                                        <td style="border: 1px solid black !important;text-align:left !important;">{{$row->tahun1}}</td>
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
                    <div class="row">
                        <div class="col-md-3"></div>
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
let listPusatStudiData = []
const labels = []
//generate list label
_.map(data, v =>{
    if(!labels.includes(v.periode)) labels.push(v.periode)
})
console.log(data, labels)
//build hirarki data
_.map(data, v =>{
    let isIncludePusatStudi = _.filter(listPusatStudiData, o => o.pusat_studi === v.pusat_studi).length > 0
    if(!isIncludePusatStudi){
        listPusatStudiData.push({
            pusat_studi:v.pusat_studi,
            jumlah: new Array(labels.length).fill(0),
        })
    }
    let indexStatus = _.findIndex(listPusatStudiData, {pusat_studi:v.pusat_studi})
    let statusData = listPusatStudiData[indexStatus]
    let indexPeriode = _.indexOf(labels, v.periode)
    statusData.jumlah[indexPeriode] = v.tahun1
})
listPusatStudiData = _.orderBy(listPusatStudiData, ['pusat_studi'], ['asc']);
let container = document.getElementById('container-chart')
//generate canvas
_.map(listPusatStudiData, (v,i) =>{
    container.innerHTML = container.innerHTML + `
        <div >
            <div ><canvas id="chart-${i}"></canvas></div>
        </div>
    `
})
console.log(listPusatStudiData, "ANU")
//generate canvas
//generate datasets and chart
_.map(listPusatStudiData, (v,i) =>{
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
            title: {
                display: true,
                text: v.pusat_studi
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