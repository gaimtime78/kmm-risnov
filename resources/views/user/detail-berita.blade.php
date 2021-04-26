@extends('layout.user')

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
                        <h3>{{$post->title}}</h3>
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
                                        <!-- <h3>{{$post->title}}</h3> -->
                                        <div class="tags-widget">
                                            <ul class="list-inline">
                                                @foreach($post->category()->pluck('category')->toArray() as $cc)
                                                    <li><a href="#" class="m-1">{{$cc}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div><!-- end blog-meta -->
                                    @if($post->show_thumbnail)
                                    <div class="blog-media">
                                        <img src="{{asset('upload/post/'.$post->thumbnail)}}" alt="" class="img-responsive img-rounded">
                                    </div><!-- end media -->
                                    @endif

                                    <div class="blog-desc-big">
                                        <!-- <p class="lead">{{$post->overview}}</p> -->
                                        <div class="row blog-grid" style="margin-top:6em;">
                                            @foreach($post->gallery as $gal)
                                            <div class="col-md-4">
                                                <div class="course-box">
                                                    <div class="image-wrap entry">
                                                        <img style="height:200px;object-fit:cover;" src="{{asset('upload/post/'.$gal->file)}}" alt="" class="img-responsive">
                                                        <div class="magnifier">
                                                            <a onclick="showModal(`{{asset('upload/post/'.$gal->file)}}`)" href="javascript:void(0)" title=""><i class="flaticon-add"></i></a>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="image-wrap entry">
                                                        <img style="height:200px;object-fit:cover;" src="{{asset('upload/post/'.$gal->file)}}" alt="" class="img-responsive">
                                                    </div> -->
                                                    @if($gal->deskripsi !== null)
                                                    <div  class="course-details" style="padding:1em">
                                                        {{$gal->deskripsi}}                           
                                                    </div><!-- end details -->
                                                    @endif
                                                </div><!-- end box -->
                                            </div><!-- end col -->
                                            @endforeach
                                        </div>
                                        <p>{!! $post->content !!}</p>
                                        <hr class="invis">

                                        <!-- end list-widget -->
                                       
                                        <ul class="list-inline">
                                            <li><i class="fa fa-clock-o"></i> Dipublikasikan pada : {{date("d M Y", strtotime($post->published_at))}}</li><br>
                                            <li><i class="fa fa-user"></i><span> Penulis : </span> <a href="#">{{$post->user->name}}</a></li>
                                        </ul>
                                    </div><!-- end desc -->
                                </div><!-- end blog -->
                            </div><!-- end content -->

                            <!-- <div class="authorbox">
                                <div class="site-publisher clearfix">
                                    <img src="upload/people_10.jpeg" alt="" class="img-responsive img-circle">
                                    <a href="single-agency.html" title=""><h4><small>about</small> <span>Martin Martines</span></h4></a>
                                    <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth.</p>

                                    <div class="authorbox-social">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                            <!-- end details -->

                            

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