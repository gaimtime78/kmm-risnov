<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News and Update</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<link rel="stylesheet" href="css/slider.min.css">

<div class="article mx-auto p-5">
    <div class="container">
        <div class="title text-center">
            <h3 class="h3">Latest News</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="article-slider" class="owl-carousel">
                    <div class="post-slide2">
                        <div class="post-img">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-1.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                            </p>
                            <ul class="post-bar">
                                <li><i class="fa fa-calendar"></i> June 5, 2016</li>
                                <li>
                                    <i class="fa fa-folder"></i>
                                    <a href="#">Mockup</a>
                                    <a href="#">Graphics</a>
                                    <a href="#">Flayers</a>
                                </li>
                            </ul>
                            <a href="#" class="read-more">read more</a>
                        </div>
                    </div>
 
                    <div class="post-slide2">
                        <div class="post-img">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-2.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                            </p>
                            <ul class="post-bar">
                                <li><i class="fa fa-calendar"></i> June 7, 2016</li>
                                <li>
                                    <i class="fa fa-folder"></i>
                                    <a href="#">Mockup</a>
                                    <a href="#">Graphics</a>
                                    <a href="#">Flayers</a>
                                </li>
                            </ul>
                            <a href="#" class="read-more">read more</a>
                        </div>
                    </div>
                    <div class="post-slide2">
                        <div class="post-img">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-3.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                            </p>
                            <ul class="post-bar">
                                <li><i class="fa fa-calendar"></i> June 5, 2016</li>
                                <li>
                                    <i class="fa fa-folder"></i>
                                    <a href="#">Mockup</a>
                                    <a href="#">Graphics</a>
                                    <a href="#">Flayers</a>
                                </li>
                            </ul>
                            <a href="#" class="read-more">read more</a>
                        </div>
                    </div>
                    
                    <div class="post-slide2">
                        <div class="post-img">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo33/images/img-4.jpg" alt=""></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">Latest News Post</a></h3>
                            <p class="post-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec elementum mauris. Praesent vehicula gravida dolor, ac efficitur sem sagittis.
                            </p>
                            <ul class="post-bar">
                                <li><i class="fa fa-calendar"></i> June 5, 2016</li>
                                <li>
                                    <i class="fa fa-folder"></i>
                                    <a href="#">Mockup</a>
                                    <a href="#">Graphics</a>
                                    <a href="#">Flayers</a>
                                </li>
                            </ul>
                            <a href="#" class="read-more">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script>
$(document).ready(function() {
    $("#article-slider").owlCarousel({
        items:3,
        itemsDesktop:[1199,2],
        itemsDesktopSmall:[980,2],
        itemsMobile:[600,1],
        pagination:true,
        navigationText:false,
        autoPlay:true
    });
});
</script>
</body>
</html>