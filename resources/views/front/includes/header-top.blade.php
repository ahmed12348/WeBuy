<header class="header-style-1">
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 logo-holder">

                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{route('home')}}"> <img src="{{asset('assets/front/assets/images/logo.png')}}" alt="logo"> </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= --> </div>

{{--                <div class="navbar-custom-menu">--}}
{{--                    <ul class="nav navbar-nav">--}}
{{--                        <li class="dropdown user user-menu">--}}

{{--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                                <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">--}}
{{--                                --}}{{--                            <span class="hidden-xs">{{ auth()->user()->name }}</span>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu">--}}

{{--                                --}}{{--<!-- User image -->--}}
{{--                                <li class="user-header">--}}
{{--                                    <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">--}}

{{--                                    <p>--}}
{{--                                        {{ auth()->user()->first_name }}--}}
{{--                                        <small>Member since 2 days</small>--}}
{{--                                    </p>--}}
{{--                                </li>--}}

{{--                                --}}{{--<!-- Menu Footer-->--}}
{{--                                <li class="user-footer">--}}


{{--                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();--}}
{{--                                                 document.getElementById('logout-form').submit();">@lang('site.logout')</a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}

{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <!-- /.logo-holder -->
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 top-search-holder">
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="#">Categories <b class="caret"></b></a>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#" ></a> </div>
                        </form>
                    </div>
                </div>
                <!-- /.top-search-holder -->
                <div class=" animate-dropdown top-cart-row">
                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach

                    <div class="dropdown dropdown-cart">
                        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <div class="basket-item-count"><span class="count">{{ count((array) session('cart')) }}</span></div>
                                    <div class="total-price-basket"> <span class="lbl">Shopping Cart</span> <span class="value">{{ $total }} LE</span> </div>
                                </div>
                            </div>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                <div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href=""><img src="{{ $details['photo'] }}" alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href=""> {{ $details['name'] }}</a></h3>
                                             <span class="count">  {{ $details['quantity'] }}: الكمية </span><br>
                                            <span class="price text-info"> {{ $details['price'] * $details['quantity'] }} LE</span>
                                        </div>
{{--                                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>--}}
{{--                                        <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a> </div>--}}
                                    </div>
                                </div>

                                @endforeach
                            @endif
                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>{{ $total }} LE</span> </div>
                                    <div class="clearfix"></div>
                                    <a href="{{ route('cart') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                    </div>

                    <!-- end here-->

                    <div class="dropdown dropdown-cart">
                        <a href="#" class="dropdown-toggle lnk-cart " data-toggle="dropdown" style="padding: 30px;">
                                    <span class="icon fa-stack fa-lg">
                                        <img src="{{asset('assets/front/assets/images/user2-160x160.jpg')}}" style="border-radius: 50%; float: right" alt="logo">
                                    </span>
                        </a>

                        <ul class="dropdown-menu">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown" >
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

{{--                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
{{--                                    </div>--}}
                                </li>
                            @endguest
                        </ul>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
{{--                                <li class="active dropdown"> <a href="{{route('home')}}">جميع المنتجات</a> </li>--}}

{{--                                <li class="dropdown"> <a href="{{route('men_shoes')}}">احذيه رجالي</a> </li>--}}
{{--                                <li class="dropdown"> <a href="{{route('women_shoes')}}">احذيه نسائيه</a> </li>--}}
{{--                                <li class="dropdown"> <a href="{{route('kids_shoes')}}">احذية أطفالي</a> </li>--}}
{{--                             @foreach($subcategory as $category)--}}
{{--                                    <li class="dropdown"> <a href="">{{$category->name}}</a> </li>--}}
{{--                              @endforeach--}}


                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>

</header>
@section('scripts')
    <script type="text/javascript">

        {{--$(".update-cart").change(function (e) {--}}
        {{--    e.preventDefault();--}}

        {{--    var ele = $(this);--}}

        {{--    $.ajax({--}}
        {{--        url: '{{ route('update.cart') }}',--}}
        {{--        method: "patch",--}}
        {{--        data: {--}}
        {{--            _token: '{{ csrf_token() }}',--}}
        {{--            id: ele.parents("tr").attr("data-id"),--}}
        {{--            quantity: ele.parents("tr").find(".quantity").val()--}}
        {{--        },--}}
        {{--        success: function (response) {--}}
        {{--            window.location.reload();--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>
@endsection
