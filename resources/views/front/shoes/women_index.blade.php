@extends('layouts.site')

@section('content')

    <div class="product-tabs inner-bottom-xs " style="background-color:#ddd">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-lg-12">
                <div class="tab-content">
                    <div id="description" class="tab-pane in active">
                        <div class="product-tab" >
                            <h1 class="text-center"><b>احذيه نسائيه</b></h1>
                        </div>
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.product-tabs -->
    <br>
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>

                <!-- /.sidebar -->


                <div class="col-xs-11 col-sm-11 col-md-11 " style="margin-right: 60px;">


                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach($products_women as $product)
                                        <div class="col-sm-6 col-sm-2">
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
                                                            <h3 class="name"><a href="detail.html">{{$product->name}}</a></h3>
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
{{--                Paginate--}}
                        <div class="clearfix filters-container bottom-row">
                            <div class="text-right">
                                {!! $products_women->render() !!}
                                 </div>
                        </div>


                    </div>
                    <!-- /.search-result-container -->
{{--                       @endif--}}
                </div>
                <!-- /.col -->
            </div>

         <div id="brands-carousel" class="logo-slider">
                <div class="logo-slider-inner">


                </div>

            </div>


    </div>



@endsection
