@extends('layouts.site')

@section('content')



    <div class="body-content outer-top-vs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-10 col-sm-10 col-md-10 " style="margin-right: 80px;">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                            <div class="item" style="background-image: url(./assets/front/assets/images/sliders/03.png);">

                            </div>


                            <div class="item" style="background-image: url(./assets/front/assets/images/sliders/02.png);">

                            </div>

                            <div class="item" style="background-image: url(./assets/front/assets/images/sliders/01.png);">

                            </div>
                        </div>
                        <!-- /.owl-carousel -->
                    </div>

                    <!-- ========================================= SECTION – HERO : END ========================================= -->

                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">الأكثر مبيعاً</h3>
                            <!-- /.nav-tabs -->
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                                        @foreach($products as $product)
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="#">
                                                                <img src='{{$product->img}}' alt="">
                                                                <img src='{{$product->img}}'  alt="" class="hover-image">
                                                            </a>
                                                        </div>
                                                        <!-- /.image -->

{{--                                                        <div class="tag new"><span>new</span></div>--}}
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="#">{{$product->name}}</a></h3>
{{--                                                        <div class="rating rateit-small"></div>--}}
                                                        <div class="description"></div>
                                                        <div class="product-price"> <span class="price"> {{$product->price}} LE </span> <span class="price-before-discount">{{$product->old_price}} LE</span> </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button  class="btn btn-primary icon" type="button" title="Add Cart"> <a href="{{ route('add.to.cart', $product->id) }}" ><i class="fa fa-shopping-cart"></i></a> </button>
{{--                                                                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>--}}
                                                                </li>
                                                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.item -->
                                        @endforeach

                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->

                        </div>
{{--                    @endforeach--}}
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.scroll-tabs -->



                </div>
                <!-- ============================================== CONTENT : END ============================================== -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider">
                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="./assets/front/assets/images/brands/brand1.png" src="./assets/front/assets/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="./assets/front/assets/images/brands/brand2.png" src="./assets/front/assets/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img data-echo="./assets/front/assets/images/brands/brand3.png" src="./assets/front/assets/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img data-echo="./assets/front/assets/images/brands/brand4.png" src="./assets/front/assets/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img data-echo="./assets/front/assets/images/brands/brand5.png" src="./assets/front/assets/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img data-echo="./assets/front/assets/images/brands/brand6.png" src="./assets/front/assets/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img data-echo="./assets/front/assets/images/brands/brand2.png" src="./assets/front/assets/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img data-echo="./assets/front/assets/images/brands/brand4.png" src="./assets/front/assets/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img data-echo="./assets/front/assets/images/brands/brand1.png" src="./assets/front/assets/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img data-echo="./assets/front/assets/images/brands/brand5.png" src="./assets/front/assets/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->
                    </div>
                    <!-- /.owl-carousel #logo-slider -->
                </div>
                <!-- /.logo-slider-inner -->

            </div>
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->

    <!-- ============================================== INFO BOXES ============================================== -->
    <div class="row our-features-box">
        <div class="container">
            <ul>
                <li>
                    <div class="feature-box">
                        <div class="icon-truck"></div>
                        <div class="content-blocks">We ship worldwide</div>
                    </div>
                </li>
                <li>
                    <div class="feature-box">
                        <div class="icon-support"></div>
                        <div class="content-blocks">call
                            +1 800 789 0000</div>
                    </div>
                </li>
                <li>
                    <div class="feature-box">
                        <div class="icon-money"></div>
                        <div class="content-blocks">Money Back Guarantee</div>
                    </div>
                </li>
                <li>
                    <div class="feature-box">
                        <div class="icon-return"></div>
                        <div class="content">30 days return</div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <!-- /.info-boxes -->
    <!-- ============================================== INFO BOXES : END ============================================== -->

@endsection
