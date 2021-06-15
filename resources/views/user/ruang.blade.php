@extends('layout.user')

@section('css')
<link type="text/css" rel="stylesheet" href="{{asset('404/css/style.css')}}" />
@endsection

@section('content')	
		<section class="section db p120">
            <div class="container" style="text-align:center;">
				<h2 >Jadwal Agenda LPPM UNS</h2>
            </div>
        </section>
		{{--<section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">
					<div id="notfound">
						<div class="notfound">
							<div class="notfound-404">
								<h3 text-align="center">Kami, <strong>Biro Riset dan Pengabdian Kepada Masyarakat Universitas Sebelas Maret</strong> sedang bekerja keras untuk menyelesaikan pengembangan situs ini </h3>
							</div>
							<a href="{{route('home')}}">Go TO Homepage</a>
						</div>
					</div>
                </div><!-- end boxed -->
              
            </div><!-- end container -->
        </section>--}}

        <section class="section">
            <div class="container">
                <iframe  style="width:-webkit-fill-available;"   height="850"   src="https://lppm.uns.ac.id/ruang/"></iframe>
            </div>
        </section>


                    <hr class="invis">

@endsection

@section('js')

@endsection