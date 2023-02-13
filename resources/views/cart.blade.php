@extends('layouts.site')

@section('content')

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row justify-content-around">
                <form class="register-form outer-top-xs" role="form" action="{{route('ab.store')}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                <div class="col-sm-6">
                    <div class="shopping-cart">
                        <div class="shopping-cart-table ">
                            <div class="table-responsive">
                                <table class="table">
                                    <div class=" create-new-account" >
                                        <h4 class="checkout-subtitle">Create a new account</h4>
                                        <p class="text title-tag-line">Create your new account.</p>

                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label class="info-title" style="float: right;" for="exampleInputEmail1">الاسم </label>
                                                    <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                                                </div>

                                                <label class="info-title" style="float: right;"  for="exampleInputEmail2"> العنوان بالتفصيل</label>
                                                <textarea  name="address"  class="form-control unicase-form-control text-input" id="exampleInputEmail2"></textarea>
{{--                                                <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >--}}
                                            </div>

                                            <div class="form-group">
                                                <label class="info-title" style="float: right;" for="exampleInputEmail1">رقم التليفون</label>
                                                <input type="text" name="mobile"  class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                                            </div>


                                    </div>
                                </table><!-- /table -->
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="shopping-cart">
                        <div class="shopping-cart-table ">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="cart-romove item">Remove</th>
                                        <th class="cart-description item">Image</th>
                                        <th class="cart-product-name item">Product Name</th>

                                        <th class="cart-qty item">Quantity</th>
                                        <th class="cart-sub-total item">Subtotal</th>

                                    </tr>
                                    </thead>

                                    <tbody>

                                    @php $total = 0 @endphp
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)

                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                            <tr data-id="{{ $id }}">
                                                <td class="actions" data-th="">
                                                    <button class=" btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                                </td>

                                                <td class="cart-image">
                                                    <a class="entry-thumbnail" href="">
                                                        <img name="p_photo"  src="{{ $details['photo'] }}" alt="">
                                                    </a>
                                                </td>
                                                <td class="cart-product-name-info">
                                                    <h4 class='cart-product-description'><a name="p_name" href="">{{ $details['name'] }}</a></h4>
                                                </td>


                                                <td data-th="Quantity">
                                                    <div class="quant-input">
                                                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                                    </div>
                                                </td>

                                                <td class="cart-product-grand-total"><span class="cart-grand-total-price">{{ $details['price'] * $details['quantity'] }} L.E</span></td>
                                            </tr>


                                        @endforeach
                                    @endif
                                    </tbody><!-- /tbody -->

                                    <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="shopping-cart-btn">
							<span class="">
								<a href="{{ route('home') }}" class="btn btn-upper btn-primary outer-right-xs">Continue Shopping</a>

							</span>
                                            </div>
                                        </td>
                                    </tr>

                                    </tfoot>
                                </table><!-- /table -->
                            </div>
                        </div>
                        <div class="col-md-4 cart-shopping-total">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="cart-grand-total">
                                            Total<span class="inner-left-md">{{ $total}} L.E</span>
                                        </div>
                                    </th>
                                </tr>
                                </thead><!-- /thead -->
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn pull-right">
                                            <button type="submit" class="btn btn-primary checkout-btn">
                                                <a href="">CHEKOUT</a>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        </div>


                        <br>
                    </div>
                </div>
                    <button type="submit" style="float: right;" class="btn-upper btn btn-primary checkout-page-button">checkout</button>
                </form>
            </div>

    </div>
    </div>
@endsection





