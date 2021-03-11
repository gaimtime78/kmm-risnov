@extends('layout.user')

@section('css')
<link type="text/css" rel="stylesheet" href="{{asset('404/css/style.css')}}" />
@endsection

@section('content')	
		<section class="section db p120">
            <div class="container">
                
            </div>
        </section>
		<section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">
					<div id="notfound">
						<div class="notfound">
							<div class="notfound-404">
								<h1>Oops!</h1>
								<h2>Halaman ini sedang dalam pengembangan</h2>
							</div>
							<a href="{{route('home')}}">Go TO Homepage</a>
						</div>
					</div>
                </div><!-- end boxed -->
              
            </div><!-- end container -->
        </section>

@endsection

@section('js')

@endsection