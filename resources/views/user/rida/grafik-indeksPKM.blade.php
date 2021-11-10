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
                                <h4>@foreach($nama_table as $f) {{ucwords($f->nama_table)}} @endforeach <br> {{strtoupper($fakultas)}} <!--<br>  <br> TAHUN {{$tahun}}--></h4>
                            </div>
                            <div style="width:100%; display:flex; justify-content:flex-end">
                                {{--<a href="{{route( 'rida-export-H-Indeks_PKM' , [$tahun ? $tahun : date('Y')]) }}">--}}
                                <a href="{{route( 'rida-export-H-Indeks_PKM' , [$tahun ? $tahun : date('Y')]) }}">
                                    <button style="margin-top:2em;background-color:blue" class="waves-effect waves-light btn primary darken-1">Export</button>
                                </a>
                                <a href="{{route( 'rida-periode-indeks-pkm', [$fakultas, $tahun]) }}">
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
                                                        <option value="all" selected>Semua Fakultas</option>
                                                        @foreach($list_fakultas as $f)
                                                            @if(strtolower($f) === $fakultas)
                                                                <option selected value="{{$f}}">{{$f}}</option>
                                                            @else
                                                                <option value="{{$f}}">{{$f}}</option>
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
const data_php = {!! json_encode($data) !!};
const colorList = ["#e8dc2e", "#2ee878", "#2e53e8", "#722ee8", "#e82ed2", "#ed1a59", "#e8dc2e", "#2ee878", "#2e53e8", "#722ee8", "#e82ed2", "#ed1a59", "#ed1a59" ]
const labels = data_php.map(item => item["h_index"]);

const fakultas = "{!! $fakultas !!}";
console.log('woi', fakultas);

const container = document.getElementById('container-chart');
//generate canvas
// _.map(data_php, (v,i) =>{
//     container.innerHTML = container.innerHTML + `<div ><canvas id="chart-${i}"></canvas></div>`
// })
//generate datasets and chart
// _.map(data_php, (v,i) =>{
if (fakultas !== "") {
    console.log('yuhu');
    container.innerHTML = container.innerHTML + `<div><canvas id="chart-x"></canvas></div>`;
    let datasets = [];
    datasets.push({
        label: fakultas.toUpperCase(),
        backgroundColor: colorList[1],
        borderColor: colorList[1],
        data: data_php.map(item => item[fakultas + "_jumlah"])
    })
    const myChart =new Chart(document.getElementById(`chart-x`).getContext('2d'), {
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
                text: data_php[0].periode
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
} else {
    const list_fakultas = {!! json_encode($list_fakultas) !!};
    list_fakultas.forEach((fakultas, i) => container.innerHTML = container.innerHTML + `<div style="padding-bottom: 4rem;"><canvas id="chart-${i}"></canvas></div>`)
    list_fakultas.map(f => f.toLowerCase()).forEach((fakultas, i) => {
        let datasets = [];
        datasets.push({
            label: fakultas.toUpperCase(),
            backgroundColor: colorList[i],
            borderColor: colorList[i],
            data: data_php.map(item => item[fakultas + "_jumlah"])
        })
        const myChart = new Chart(document.getElementById(`chart-${i}`).getContext('2d'), {
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
                    text: fakultas.toUpperCase(),
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
}
// })
    
</script>
@endsection