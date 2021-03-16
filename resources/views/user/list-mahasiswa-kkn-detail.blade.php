@extends('layout.user')

@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 shop-media">
                <div class="row">
                    <div class="col-md-12">
                        <div class="image-wrap entry">
                            <img style="width:60%" src="{{asset('design/upload/course_03.jpg')}}" alt="" class="img-responsive">
                        </div><!-- end image-wrap -->
                    </div>
                </div><!-- end row -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="image-wrap entry">
                            <img src="upload/single_shop_02.jpg" alt="" class="img-responsive">
                            <div class="magnifier">
                                <a rel="prettyPhoto[inline]" href="upload/single_shop_02.jpg" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="image-wrap entry">
                            <img src="upload/single_shop_03.jpg" alt="" class="img-responsive">
                            <div class="magnifier">
                                <a rel="prettyPhoto[inline]" href="upload/single_shop_03.jpg" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="image-wrap entry">
                            <img src="upload/single_shop_04.jpg" alt="" class="img-responsive">
                            <div class="magnifier">
                                <a rel="prettyPhoto[inline]" href="upload/single_shop_04.jpg" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                    </div>
                </div><!-- end row -->
            </div><!-- end col -->

            <div class="col-md-6">
                <div class="shop-desc">
                    <h3>Brown leather bag</h3>
                    <small>$20.00</small>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis consequat condimentum. In a tincidunt purus. Curabitur facilisis luctus aliquet. Aenean a cursus erat, sit amet interdum arcu. Mauris aliquam magna turpis, lobortis pellentesque velit elementum et. Nulla scelerisque a lorem nec posuere. Nunc convallis posuere tincidunt. Pellentesque a aliquet odio. Integer euismod, enim id lacinia auctor, tortor turpis malesuada enim, in semper turpis magna quis enim.</p>
                    <div class="shop-meta">
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                        <ul class="list-inline">
                            <li> SKU: product-111</li>
                            <li>Categories: <a href="#">Bags</a>
                        </ul>
                    </div><!-- end shop meta -->
                </div><!-- end desc -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
</section>

@endsection

@section('js')

@endsection