@extends('layout.user')
@section('css')
<style>
    .clamp{
        display:block;
        width:200px;
        text-overflow:ellipsis;
        overflow:hidden;
        max-height:120px;

        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
    }
    .hr-primary{
        background-image: -webkit-linear-gradient(left, rgba(66,133,244,.8), rgba(66, 133, 244,.6), rgba(0,0,0,0));
    }
    .hr-primary2{
        background-image: -webkit-linear-gradient(right, rgba(66,133,244,.8), rgba(66, 133, 244,.6), rgba(0,0,0,0));
    }

    .hr {
    height: 4px;
    margin-left: 15px;
    margin-bottom:-3px;
    }

    /* MODAL */
    #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

    /* The Modal (background) */
    .modal-img {
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
    .modal-img-content {
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
    .modal-img-content, #caption {  
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
    /* #container-slider{
        display:grid;
        grid-template-columns:1fr 1fr 1fr;
        grid-gap:1em;
    } */

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
    .modal-img-content {
        width: 100%;
    }
    }
    .wrapper         {width:80%;height:100%;margin:0 auto;background:#CCC}
    .h_iframe        {position:static;}
    .h_iframe .ratio {display:block;width:auto;height:auto;}
    .h_iframe iframe {position:absolute;top:0;left:0;width:100%; height:100%;}

    #ytplayer {
        /* display:none; */
        position: absolute;
    }
</style>
@endsection

@section('content')
<section id="home" class="video-section js-height-full">
    <div style="color:grey" class="overlay"></div>
    <iframe id="ytplayer" type="text/html" width="100%" height="100%"
src="https://www.youtube.com/embed?playlist={{ $videoIds }}&version=3&autoplay=1&controls=0&disablekb=1&enablejsapi=1&fs=0&loop=1&modestbranding=1&iv_load_policy=3&mute=1&cc_load_policy=3"
frameborder="0" allowfullscreen></iframe>
    <div class="home-text-wrapper relative container">
        <div class="home-message">
            <p>Riset Inovasi</p>
            <small>Universitas Sebelas Maret</small>
        </div>
    </div>
</section>
<section class="section gb nopadtop">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="box m30">
                    <i class="flaticon-monitor-tablet-and-smartohone"></i>
                    <h4>LPPM</h4>
                    <a href="http://lppm.uns.ac.id/" class="readmore">Pelajari Selengkapnya</a>
                </div>
            </div><!-- end col -->
            <div class="col-md-3">
                <div class="box m30">
                    <i class="flaticon-download-business-statistics-symbol-of-a-graphic"></i>
                    <h4>Direktorat Inovasi dan Hilirisasi</h4>
                    <a href="{{route('coming')}}" class="readmore">Pelajari Selengkapnya</a>
                </div>
            </div><!-- end col -->
            <div class="col-md-3">
                <div class="box m30">
                    <i class="flaticon-computer-tool-for-education"></i>
                    <h4>UPT PPK</br></br></h4> 
                    <a href="https://diklathut.uns.ac.id/" class="readmore">Pelajari Selengkapnya</a>
                </div>
            </div><!-- end col -->
            <div class="col-md-3">
                <div class="box m30">
                    <i class="flaticon-monitor-tablet-and-smartohone"></i>
                    <h4>UP KKN</h4>
                    <a href="https://kkn.uns.ac.id/" class="readmore">Pelajari Selengkapnya</a>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
        <div class="row">
        
        </div>
    </div><!-- end container -->
</section>
<section class="section gb nopadtop">
    <div class="container">
        <div class="boxed">
            <div class="row">
                <div class="section-title text-center">
                    </div><!-- end title -->
                    <div class="sidebar col-md-4">
                        <div class="widget clearfix">
                            <div class="banner-widget">
                                <!-- <img src="upload/banner.jpeg" alt="" class="img-responsive img-rounded"> -->
                                <h3 class="widget-title">Popular Post</h3>
                            </div>
                        </div>
                    <div class="widget clearfix">
                        @foreach($left as $q)
                        <div class="post-widget">
                            <div class="media">
                                <img style="width:50px;object-fit:cover;" src="{{asset('upload/post/'.$q->thumbnail)}}" alt="" class="img-responsive alignleft img-rounded">
                                <div class="media-body">
                                
                                    <a href="{{route('detail-post',['slug'=>str_replace(' ', '-', $q->title)])}}" title="">{{$q->title}}</a>
                                    <div class="blog-meta">
                                        <ul class="list-inline">
                                            <li> <small><i class="fa fa-clock-o"></i> {{date("d M Y", strtotime($q->published_at)) }}</small></li>
                                        </ul>
                                    </div><!-- end blog-meta -->
                                </div>
                            </div>
                        </div><!-- end post-widget -->
                        @endforeach
                    </div><!-- end widget -->
                </div><!-- end sidebar -->
                <div style="display:grid;grid-template-columns:50px 1fr 50px;">
                    <div style="position:relative;width:50px; display:flex; justiify-content:center; align-items:center;">
                        <div onclick="prevSlider()" style="height:50px;width:100%;margin-bottom:30px;background-color:grey;cursor:pointer;display:flex;justify-content:center;align-items:center;margin-right:1em;"><i class="fa fa-arrow-left"></i></div>
                    </div>
                    <div id="container-slider" class="col-md-8" style="width:100%;"></div><!-- end col -->
                    <div style="position:relative;width:50px; display:flex; justiify-content:center; align-items:center;">
                        <div onclick="nextSlider()" style="height:50px;width:100%;margin-bottom:30px;background-color:grey;cursor:pointer;display:flex;justify-content:center;align-items:center;margin-right:1em;"><i class="fa fa-arrow-right"></i></div>
                    </div>
                </div>
                
            </div><!-- end row -->
        </div><!-- end boxed -->
    </div><!-- end container -->
</section>
<!-- <section class="section gb nopadtop">
    <div class="container">
        <div class="section-title text-center">
            <h3>Post Terbaru</h3>
        </div>
        <div class="boxed" style="display:flex">
            <div style="width:50px; display:flex; justiify-content:center; align-items:center;">
                <div onclick="prevSlider()" style="height:50px;width:100%;margin-bottom:30px;background-color:grey;cursor:pointer;display:flex;justify-content:center;align-items:center;margin-right:1em;"><i class="fa fa-arrow-left"></i></div>
            </div>
            <div style="width:100%;">
                <div id="container-slider">
                </div>
            </div>
            <div style="width:50px; display:flex; justiify-content:center; align-items:center;">
                <div onclick="nextSlider()" style="height:50px;width:100%;margin-bottom:30px;background-color:grey;cursor:pointer;display:flex;justify-content:center;align-items:center;margin-left:1em;"><i class="fa fa-arrow-right"></i></div>
            </div>
        </div><!-- end boxed -->
    </div><!-- end container -->
</section> -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="custom-module">
                    <h2><mark>Produk Siap Komersial</mark></h2>
                </div>
                <hr class="hr-primary">
            </div>
            <div class="col-md-6 ">
                <div class="custom-module">
                    <br>
                    <img style="height:500px;object-fit:cover;" src="{{asset('images/produk-siap.PNG')}}" alt="download-ebook" class="img-responsive wow slideInLeft">
                    <a href="https://cloud.uns.ac.id/index.php/s/mq67vUFZMJWDT6T" target="_blank"><p style="text-align:center">Download E-book</p></a>
                </div><!-- end module -->
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="custom-module p40l">
                    <p style="text-align:justify; 
                        margin: 18rem 0px 0px 0px;
                        width: 100%;
                        padding: 10px;">Bidang Riset dan Inovasi UNS (RISNOV UNS)
                        menyampaikan terima kasih yang sebesar-besarnya atas kegigihan kepada para
                        inventor yang telah menghilirkan hasil risetnya dan para inovator yang telah menghasilkan produk inovasinya. RISNOV mendorong
                        para peneliti dan inovator UNS untuk
                        melakukan riset dan inovasi secara berkelanjutan hingga produknya dimanfaatkan
                        masyarakat. Mari bersama-sama majukan
                        Riset dan Inovasi UNS untuk masyarakat.
                    </p>
                    <div class="authorbox">
                        <div class="site-publisher clearfix">
                            <!-- <img src="upload/people_10.jpeg" alt="" class="img-responsive img-circle"> -->
                            <a href="#" title="" style="text-align: right;" >
                                <h4><span>Prof. Dr. Kuncoro Diharjo, S.T., M.T.</span></h4>
                            </a>
                            <p style="text-align: right;">Wakil Rektor Riset dan Inovasi</p>
                            <!-- end share -->
                        </div><!-- end publisher -->
                    </div><!-- end details -->
                    <hr class="invis">
                    <!-- <div class="btn-wrapper">
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div> -->
                </div><!-- end module -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>


<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-module p40l">
                    <a href="{{route('produk-komersial')}}">
                        <h3><mark>Publikasi Produk Siap Komersial</mark></h3>
                    </a>
                    <hr class="hr-primary2">
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-module p40l">
                    <p style="text-align:justify; 
                        margin: 3rem 0px 0px 0px;
                        width: 100%;
                        padding: 10px;">Universitas Sebelas Maret (UNS) memberikan
                        apresiasi yang tinggi kepada Bidang Riset dan
                        Inovasi yang telah melangkah sebagai inisiator hilirisasi Produk Siap Komersial. Langkah ini merupakan salah satu capaian Indek
                        Kinerja Utama (IKU) UNS, khususnya dalam
                        menghadirkan produk yang dimanfaatkan
                        oleh masyarakat. Produk-produk ini dapat
                        segera dipasarkan oleh unit bisnis UNS agar
                        secepatnya memberikan revenue generating untuk meningkatkan pendapatan non
                        akademik. Peluncuran Produk Siap Komersial pada puncak DIES NATALIS UNS ke-45
                        tahun 2021 ini, sangat relevan dengan semangat otonomi kampus PTN-BH UNS.
                    </p>
                    <hr class="invis">

                </div><!-- end module -->
                
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="custom-module">
                </div>
                <div class="custom-module">
                    <img style="height:500px;object-fit:cover;margin-top: 1rem;" src="{{asset('images/penelitian.jpg')}}" alt="download-ebook" class="img-responsive wow slideInLeft">
                </div><!-- end module -->
            </div><!-- end col -->
            <div class="col-md-12 text-center">
                <div class="btn-wrapper">
                    <a href="{{route('produk-komersial')}}" class="readmore btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
{{-- 
<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
            <h3>BERITA</h3>
        </div><!-- end title -->
        <!-- <div class="row">
            <div class="col-md-12 text-right">
                <ul class="pagination ">
                    <li class="active"><a href="javascript:void(0)">&laquo;</a></li>
                    <li class="active"><a href="javascript:void(0)">&raquo;</a></li>
                </ul>
            </div>
        </div> -->
      <div id="owl-01" class="owl-carousel owl-theme owl-theme-01">
            @foreach($post as $p)
            <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img style="height:200px;object-fit:cover;" src="{{asset('upload/post/'.$p->thumbnail)}}" alt="" class="img-responsive">
                        <div class="magnifier">
                            <a href="{{route('detail-post',['slug'=>str_replace(' ', '-', $p->title)])}}" title=""><p>Selengkapnya</p></a>
                        </div>
                    </div><!-- end image-wrap -->
                    <div  class="course-details">
                        <div style="">
                            <h4>
                                <small><i class="fa fa-clock-o"></i> {{date("d M Y", strtotime($p->published_at)) }}</small>
                                <a href="{{route('detail-post',['slug'=>str_replace(' ', '-', $p->title)])}}" title="">{{$p->title}}</a>
                            </h4>
                        </div>
                        
                        <div style="height:120px;">
                            <div class="clamp">{{$p->overview}}</div>
                        </div><br>
                        <a href="{{route('detail-post',['slug'=>str_replace(' ', '-', $p->title)])}}" class="readmore">Selengkapnya</a>
                    </div><!-- end details -->
                    
                   
                </div><!-- end box -->
            </div><!-- end col -->
            @endforeach

        </div><!-- end row -->

        <hr class="invis">

        <div class="section-button text-center">
            <a href="{{route('berita-terkini')}}" class="btn btn-primary">Lihat Berita Lainnya</a>
        </div>
    </div><!-- end container -->
</section>

<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message text-center">
                    <!-- <h3>Howdy, we are Edulogy, we have brought together the best quality services, offers, projects for you!</h3> -->
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->
--}}
<!-- 
<section class="section db">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="stat-count">
                    <h4 class="stat-timer">1230</h4>
                    <h3><i class="flaticon-black-graduation-cap-tool-of-university-student-for-head"></i> Happy Students</h3>
                    <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="stat-count">
                    <h4 class="stat-timer">331</h4>
                    <h3><i class="flaticon-online-course"></i> Course Done</h3>
                    <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="stat-count">
                    <h4 class="stat-timer">8901</h4>
                    <h3><i class="flaticon-coffee-cup"></i> Ordered Coffe's</h3>
                    <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. </p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Gallery</h3>        </div><!-- end title -->
        <div class="row">
            <div class="col-md-12 text-right">
                <ul class="pagination" id="container-pagination">
                   
                </ul>
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="boxed boxedp4">
            <div class="row blog-grid" id="container-gallery">
                
                
            </div>

            <hr class="invis">
            <!-- <div class="section-button text-center">
                <a href="#" class="btn btn-primary">Lihat Gallery</a>
            </div> -->

        </div><!-- end boxed -->
    </div><!-- end container -->
</section>
<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
        <h3>Gallery Video</h3>        </div><!-- end title -->
        <div class="boxed">
            <div style="display:grid;grid-template-columns:50px 1fr 50px;">
                <div style="position:relative;width:50px; display:flex; justiify-content:center; align-items:center;">
                    <div onclick="prevSliderVid()" style="height:50px;width:100%;margin-bottom:30px;background-color:#d0e2e2;cursor:pointer;display:flex;justify-content:center;align-items:center;margin-right:1em;"><i class="fa fa-arrow-left"></i></div>
                </div>
                <div class="wrapper" id="container-slider-video"></div>
                <div style="position:relative;width:50px; display:flex; justiify-content:center; align-items:center;">
                    <div onclick="nextSliderVid()" style="height:50px;width:100%;margin-bottom:30px;background-color:#d0e2e2;cursor:pointer;display:flex;justify-content:center;align-items:center;margin-right:1em;"><i class="fa fa-arrow-right"></i></div>
                </div>
            </div>
        </div><!-- end boxed -->
    </div><!-- end container -->
</section>

 <!--you can copy the below code to your htm 
page-----------------------------begin--->
<!--change the width and height value as you want.--> 
<!-- Do change "index.htm" to your real html name of the flippingbook--> 
<section class="section gb">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12 boxed ">
                <div class="section-title text-center">
                    <h3>Riset Inovasi Dalam Angka</h3>        
                </div><!-- end title -->
                <div class="tagline-message text-center">
                    <iframe class="responsive-iframe" src="https://online.flipbuilder.com/pbnwt/tfxo/index.html"  
                    seamless="seamless" scrolling="no" frameborder="0" 
                    allowtransparency="true" allowfullscreen="true"></iframe>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->

<!--you can copy the above code to your htm 
page-----------------------------end--->  

<div onclick="modalClose()" id="myModal" class="modal-img">
    <img class="modal-img-content" id="img01">
</div>

@endsection

@section('js')
<script>
    /**
     * VIDEO DI JUMBOTRON
     */
    // const yt_link =

    //Gallery
    let dataGallery = {!! json_encode($gallery) !!}
    let showedGallery = 6
    let maxGroup = Math.floor(dataGallery.length/showedGallery)
    let groupGallery = Array.from(Array(maxGroup + 1), () => new Array())
    let ind = 0
    let currGroupInd = 0
    dataGallery.map(v =>{
        if(ind === showedGallery){
            ind = 0
        } 
        groupGallery[currGroupInd].push(v)
        if(ind === showedGallery - 1) currGroupInd ++
        ind ++

    })
    let currIndex = 0
    let renderPagination = (currIndex) => {
        let container = document.querySelector('#container-pagination')
        if(maxGroup > 0){
            if(currIndex === 0){
                container.innerHTML = `
                    <li class="active"><a style="cursor:pointer" onclick="nextGallery(${currIndex + 1})" href="javascript:void(0)">&raquo;</a></li>
                `
            }else if(currIndex === maxGroup){
                container.innerHTML = `
                    <li class="active"><a style="cursor:pointer" onclick="prevGallery(${currIndex - 1})" href="javascript:void(0)">&laquo;</a></li>
                `
            }else{
                container.innerHTML = `
                    <li class="active"><a style="cursor:pointer" onclick="prevGallery(${currIndex - 1})" href="javascript:void(0)">&laquo;</a></li>
                    <li class="active"><a style="cursor:pointer" onclick="nextGallery(${currIndex + 1})" href="javascript:void(0)">&raquo;</a></li>
                `
            }
        }else{
            container.innerHTML = ''
        }
    }
    let renderGallery = (index) =>{
        let container = document.querySelector('#container-gallery')
        let temp = JSON.parse(JSON.stringify(groupGallery))
        let res = ''
        let data = temp[index].map(v => {
            res = res + `
                <div class="col-md-4">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img style="height:200px;object-fit:cover;" src="public/upload/post/${v}" alt="" class="img-responsive">
                            <div class="magnifier">
                                <a onclick="showModal('public/upload/post/${v}')" href="javascript:void(0)" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            `
        })
        container.innerHTML = res
    }
    let prevGallery = (index) => {
        renderGallery(index)
        renderPagination(index)
    }
    let nextGallery = (index) => {
        renderGallery(index)
        renderPagination(index)
    }
    let goToPost = (title) => {
        title = title.split(' ').join('-')
        window.location.href = `post/${title}`
    }
    renderGallery(currIndex)
    renderPagination(currIndex)

    ///MODAL
    let showModal = (imgUrl) =>{ 
        // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
        
        modal.style.display = "block";
        modalImg.src = imgUrl;
        captionText.innerHTML = this.alt;
    }
    // When the user clicks on <span> (x), close the modal
    let modalClose = () =>{
        var modal = document.getElementById("myModal");
        modal.style.display = "none"
    }

    //Slider Post
    let dataSlider = {!! json_encode($allPost) !!}
    let indexSlider = 0
    let totalDisplay = 3
    let dataLength = dataSlider.length
    let groupLength = Math.ceil(dataLength/totalDisplay)

    let renderSlider = (indexSlider) =>{
        let container = document.querySelector("#container-slider")
        let temp = JSON.parse(JSON.stringify(dataSlider))
        let res = ''
        let arrDisplay = []
        let tempIndex = indexSlider
        tempIndex = (tempIndex%dataLength)
        // let startDisplay = totalDisplay*tempIndex - 3 
        arrDisplay.push(temp[tempIndex])
        // arrDisplay.push(temp[startDisplay + 1])
        // arrDisplay.push(temp[startDisplay + 2])
        // let data = arrDisplay.map(v => {
        //     res = res + `
        //         <div class="content blog-list boxed" style="padding:1em;height:300px;margin-bottom:0px;">
        //             <div class="blog-wrapper clearfix">
        //                 <div style="height:200px;overflow:hidden;display:flex;align-items:center;" class="blog-media">
        //                     <a href="post/${v.title.split(" ").join("-")}" style="width:100%;" title=""><img style="height:200px;object-fit:cover;" src="public/upload/post/${v.thumbnail}" alt="gambar" class="img-responsive img-rounded"></a>
        //                 </div><!-- end media -->
        //                 <div class="blog-meta">
        //                     <h4><a href="post/${v.title.split(" ").join("-")}" title="">${v.title}</a></h4>
        //                 </div><!-- end blog-meta -->
        //             </div><!-- end blog -->
        //         </div><!-- end content -->
        //     `
        // })
        let data = arrDisplay.map(v => {
            res = res + `
                <div class="content blog-list">
                    <div class="blog-wrapper clearfix">
                        <div class="blog-meta">
                            <!-- <small><a href="#">Berita Terkini</a></small> -->
                            <h3><a href="post/${v.title.split(" ").join("-")}" title="">${v.title}</a></h3>
                            <ul class="list-inline">
                                <li>${v.published_at}</li>
                            </ul>
                        </div><!-- end blog-meta -->

                        <div class="blog-media">
                            <img src="public/upload/post/${v.thumbnail}" alt="" class="img-responsive img-rounded">
                        </div><!-- end media -->

                        <div class="blog-desc-big">
                            <p >${v.overview}</p>
                            <a href="post/${v.title.split(" ").join("-")}" class="btn btn-primary">Read More</a>
                        </div><!-- end desc -->
                    </div><!-- end blog -->
                </div><!-- end content -->
                <div class="section-button text-center">
                    <a href="berita-terkini" class="btn btn-primary">Lihat Berita Lainnya</a>
                </div>
            `
        })
        container.innerHTML = res
        
        
    }
    let nextSlider = () =>{
        indexSlider = indexSlider + 1
        renderSlider(indexSlider);
        console.log(indexSlider, "next")
    }
    let prevSlider = () =>{
        indexSlider = indexSlider - 1
        if(indexSlider === 0){
            indexSlider = groupLength
        }
        renderSlider(indexSlider);
        console.log(indexSlider, "prev")
    }
    renderSlider(0);

    //sliderVideo
    // let dataSliderVid = {!! json_encode($allVideo) !!}
    // dataSliderVid = dataSliderVid.filter(v => v !== "")
    // let indexSliderVid = 0
    // // let totalDisplay = 3
    // let dataLengthVid = dataSliderVid.length
    // // let groupLength = Math.ceil(dataLengthVid/totalDisplay)
	// console.log(dataSliderVid, "anu")
    // let renderSliderVid = (indexSliderVid) =>{
    //     let container = document.querySelector("#container-slider-video")
    //     let temp = JSON.parse(JSON.stringify(dataSliderVid))
    //     let res = ''
    //     let arrDisplay = []
    //     let tempIndex = indexSliderVid
    //     tempIndex = (tempIndex%dataLengthVid)
    //     // let startDisplay = totalDisplay*tempIndex - 3 
    //     arrDisplay.push(temp[tempIndex])
    //     // arrDisplay.push(temp[startDisplay + 1])
    //     // arrDisplay.push(temp[startDisplay + 2])
    //     // let data = arrDisplay.map(v => {
    //     //     res = res + `
    //     //         <div class="content blog-list boxed" style="padding:1em;height:300px;margin-bottom:0px;">
    //     //             <div class="blog-wrapper clearfix">
    //     //                 <div style="height:200px;overflow:hidden;display:flex;align-items:center;" class="blog-media">
    //     //                     <a href="post/${v.title.split(" ").join("-")}" style="width:100%;" title=""><img style="height:200px;object-fit:cover;" src="public/upload/post/${v.thumbnail}" alt="gambar" class="img-responsive img-rounded"></a>
    //     //                 </div><!-- end media -->
    //     //                 <div class="blog-meta">
    //     //                     <h4><a href="post/${v.title.split(" ").join("-")}" title="">${v.title}</a></h4>
    //     //                 </div><!-- end blog-meta -->
    //     //             </div><!-- end blog -->
    //     //         </div><!-- end content -->
    //     //     `
    //     // })
    //     let data = arrDisplay.map(v => {
    //         res = res + `
    //             <div class="h_iframe">
    //                 <!-- a transparent image is preferable -->
    //                 <img class="ratio" src="public/images/16x9.png"/>
    //                 <iframe src="${v}" frameborder="0" allowfullscreen></iframe>
    //             </div>
    //         `
    //     })
    //     container.innerHTML = res
        
        
    }
    let nextSliderVid = () =>{
        indexSliderVid = indexSliderVid + 1
        renderSliderVid(indexSliderVid);
        console.log(indexSliderVid, "next")
    }
    let prevSliderVid = () =>{
        indexSliderVid = indexSliderVid - 1
        if(indexSliderVid === 0){
            indexSliderVid = groupLength
        }
        renderSliderVid(indexSliderVid);
        console.log(indexSliderVid, "prev")
    }
    renderSliderVid(0);
</script>

@endsection