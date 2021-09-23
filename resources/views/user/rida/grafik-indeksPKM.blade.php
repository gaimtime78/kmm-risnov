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
                                <h4>@foreach($nama_table as $f) {{ucwords($f->nama_table)}} @endforeach <br> {{$fakultas}} <!--<br>  <br> TAHUN {{$tahun}}--></h4>
                            </div>
                            <div style="width:100%; display:flex; justify-content:flex-end">
                                <a href="{{route( 'rida-export-'.$name , [$fakultas, $tahun]) }}">
                                    <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Export</button>
                                </a>
                                <a href="{{route( 'rida-periode-'.$name , [$fakultas, $tahun]) }}">
                                    <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Detil</button>
                                </a>
                            </div>
                            <?php $route = route('rida-H-indeksPenelitiPKM')?>
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
                                        {{--
                                            <div style="margin-top:2em">
                                                <h4>Sumber Data :</h4>
                                                @foreach($list_sumber as $s)
                                                <div><b>{{$s->periode}}</b> berasal dari <b>{{$s->sumber_data}}</b></div>
                                                @endforeach
                                            </div>
                                            --}}
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
const colorList = ["#e8dc2e", "#2ee878", "#2e53e8", "#722ee8", "#e82ed2", "#ed1a59", "#e8dc2e", "#2ee878", "#2e53e8", "#722ee8", "#e82ed2", "#ed1a59", "#ed1a59" ]
const labels = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", 
                "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21"]

let container = document.getElementById('container-chart')
//generate canvas
_.map(data, (v,i) =>{
    container.innerHTML = container.innerHTML + `<div ><canvas id="chart-${i}"></canvas></div>`
})
//generate datasets and chart
_.map(data, (v,i) =>{
    let datasets = []
    datasets.push({
        label:v.periode,
        backgroundColor: colorList[1],
        borderColor: colorList[1],
        data :[
            v.jumlah0,
            v.jumlah1,
            v.jumlah2,
            v.jumlah3,
            v.jumlah4,
            v.jumlah5,
            v.jumlah6,
            v.jumlah7,
            v.jumlah8,
            v.jumlah9,
            v.jumlah10,
            v.jumlah11,
            v.jumlah12,
            v.jumlah13,
            v.jumlah14,
            v.jumlah15,
            v.jumlah16,
            v.jumlah17,
            v.jumlah18,
            v.jumlah19,
            v.jumlah20,
            v.jumlah21,
        ]
    })
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
                text: v.periode
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