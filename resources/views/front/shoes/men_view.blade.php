@extends('layouts.site')

@section('content')


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#"></a></li>

                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>


                <div class='col-xs-12 col-sm-12 col-md-9 rht-col' style="margin-right: 90px;">
                    <div class="detail-block">
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">
                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="Gallery" href="{{$products->photo}}">
                                                <img class="img-responsive" alt="" src="{{$products->photo}}" data-echo="{{$products->photo}}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->





                                    </div><!-- /.single-product-slider -->




                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->

                            <div class='col-sm-12 col-md-8 col-lg-8 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name text-left" >{{$products->name}}</h1>


                                    <div class="price-container info-container m-t-30">
                                        <div class="row">


                                            <div class="col-sm-6 col-xs-6 text-left">
                                                <div class="price-box">
                                                    <span class="price">{{$products->price}} LE</span>
                                                    <span class="price-strike">{{$products->old_price}} LE</span>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-xs-6 ">
                                                <div class="favorite-button m-t-5">
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>

                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <div class="quantity-container info-container ">
                                        <div class="row ">

                                            <div class="qty ">
                                                <span class="label">Qty :</span>
                                            </div>

                                            <div class="qty-count">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="text" value="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="add-btn ">

                                                <a href="{{ route('add.to.cart', $products->id) }}" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            </div>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->

                                    <div class="description-container m-t-20 text-left">
                                        <dl>

                                            <dd><b>  منتجات عالية الجودة</b> <i class="fa fa-check"></i></dd>
                                            <dd><b>دعم فني 24/7 </b><i class="fa fa-check"></i></dd>
                                            <dd><b> استبدال واسترجاع خلال 14 يوم </b><i class="fa fa-check"></i></dd>
                                        </dl>


                                    </div>




                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->


</div><!-- /.row -->
</div>

<div class="product-tabs inner-bottom-xs">
<div class="row">
    <div class="col-sm-3 col-md-3 ">
        <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
            <li class="active text-center"><a data-toggle="tab" href=""> <b>الوصف</b></a></li>


        </ul><!-- /.nav-tabs #product-tabs -->
    </div>
    <div class="col-sm-9 col-md-9 col-lg-12" >

        <div class="tab-content">

            <div id="description" class="tab-pane in active">
                <div class="product-tab text-left">
                        <p class="text"><b>{!! nl2br(e($products->desc))!!}</b></p>

                </div>
            </div><!-- /.tab-pane -->


        </div><!-- /.tab-content -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div>


</div>


                <div class="col-xs-12 col-sm-12 col-md-9 rht-col" style="margin-right: 90px;">
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach($products_new as $product)
                                            <div class="col-sm-6 col-sm-3">
                                                <div class="item">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    <a href="{{route('men_shoes_view',$product->id)}}">
                                                                        <img src="{{$product->photo}}" alt="">
                                                                        <img src="{{$product->photo}}" alt="" class="hover-image">
                                                                    </a>
                                                                </div>
                                                                <!-- /.image -->

                                                                {{--                                                            <div class="tag new"><span>new</span></div>--}}
                                                            </div>
                                                            <!-- /.product-image -->

                                                            <div class="product-info text-left">
                                                                <h3 class="name"><a href="">{{$product->name}}</a></h3>
                                                                {{--                                                            <div class="rating rateit-small"></div>--}}
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
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>

<div class="clearfix"></div>
</div>

<div id="brands-carousel" class="logo-slider">

<div class="logo-slider-inner">
<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
<div class="item m-t-15">
    <a href="#" class="image">
        <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
    </a>
</div>

</div>
</div>

</div>
    </div>



@endsection
