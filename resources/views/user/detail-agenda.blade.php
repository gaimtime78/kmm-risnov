@extends('layout.user')

@section('title', $agenda->title)
@section('meta-description',$agenda->description)
@section('meta-image', asset('upload/agenda/'.str_replace(' ', '%20', $agenda->thumbnail)))

@section('css')
<style>
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 150px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 110%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
@endsection

@section('content')
        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                        <h3>{{$agenda->title}}</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed">
                    <div class="row">
                        <div class="col-md-12" style="padding-right:2em;padding-left:2em;">
                            <div class="content blog-list">
                                <div class="blog-wrapper clearfix">
                                    <div class="blog-meta">
                                        {{-- <div class="tags-widget">
                                            <ul class="list-inline">
                                                @foreach($post->category()->pluck('category')->toArray() as $cc)
                                                    <li><a href="#" class="m-1">{{$cc}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div> --}}
                                    </div><!-- end blog-meta -->
                                    {{-- @if($agenda->show_thumbnail) --}}
                                    <div class="blog-media">
                                        <img src="{{asset('upload/agenda/'.$agenda->thumbnail)}}" alt="" class="img-responsive img-rounded">
                                    </div><!-- end media -->
                                    {{-- @endif --}}

                                    <div class="blog-desc-big">
                                        
                                        <p>{!! $agenda->description !!}</p>

                                        <hr class="invis">

                                        <!-- end list-widget -->
                                       
                                    </div><!-- end desc -->
                                </div><!-- end blog -->
                            </div><!-- end content -->


                            

                        </div><!-- end col -->

                        
                    </div><!-- end row -->
                </div><!-- end boxed -->
                <!-- The Modal -->
                <div onclick="modalClose()" id="myModal" class="modal">
                    <img class="modal-content" id="img01">
                </div>
            </div><!-- end container -->
        </section>        
@endsection

@section('js')
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    let showModal = (imgUrl) =>{
        
        modal.style.display = "block";
        modalImg.src = imgUrl;
        captionText.innerHTML = this.alt;
    }
    // When the user clicks on <span> (x), close the modal
    let modalClose = () =>{
        var modal = document.getElementById("myModal");
        modal.style.display = "none"
    }
</script>
@endsection