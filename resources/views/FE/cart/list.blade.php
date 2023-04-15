@extends('FE.layout_cart')
@section('content')
<?php

   session_start();

?>
<div class="container">
    <div class="sp-cart mt-5">
        <div class="row">
            <div class="col-9">
                <div class="cart-right">
                    <div class="cart-title">Giỏ Hàng</div>
                    <div class="cart-content">
                        @if(session()->has('het'))
                        <div class=" text-success custom" style="text-shadow: 0 0 1px black;">
                            {{session()->get('het')}}
                        </div>
                        @endif
                        @foreach (Cart::content() as $item)
                        <div class="cart-main">
                            <div class="row ">
                                <div class="col-2">
                                    <div class="cart-p-img">
                                        <img src="{{URL::asset('image/product/'. $item->options->image )}}" alt="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="cart-p-name">
                                        <a  style="font-size: 20px" href="">{{ $item->name }}</a><br>
                                    </div>

                                    <div>
                                        <span style="font-size: 18px">số lượng: {{ $item->qty }}</span>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="cart-p-price" style="margin: 12px 0 0 0;">
                                        <p>{{ number_format($item->price).' '.'VND'}}</p>

                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="cart-qty">
                                        <form action="{{ route('updateCart', $item->rowId) }}" method="post">
                                            @csrf
                                            <input style="width: 50%;" name="update_qty" type="number" class="qty-input"
                                                value="{{ $item->qty }}" min="1">
                                            <button type="submit" class="btn">Cập nhập</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div>
                                        <a href="{{ route('deleteCart', $item->rowId) }}" class="text-danger">Xóa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="cart-total">

                    <div class="prices">
                        <div class="cart-title">Tổng tiền</div>
                        <div style="display: flex;
                        align-items: center;">
                            <div style="font-size: 16px; font-weight: bold">
                                Tổng giá sách:
                            </div>
                            <div>
                                <p class="prices__total text-center justify-content-center">
                                    <span style="font-size: 16px"
                                        class="prices__value prices__value--final">{{number_format(Cart::subTotal()).' '.'VND'}}
                                        <!-- <i style="margin:0 auto">(@lang('main.cart.vated'))</i> -->
                                    </span>
                                </p>
        
                            </div>
                        </div>
                        <div style="display: flex;
                        align-items: center;">
                            <div style="font-size: 16px; font-weight: bold">
                                Khuyến mãi:
                            </div>
                            <div>
                                <p class="prices__total text-center justify-content-center">
                                    <span id ="cart_coupon" style="font-size: 16px">
                                    </span>
                                    <input name="data_counpons" id="data_counpons" type="hidden" class="qty-input">
                                </p>
        
                            </div>
                        </div>
                        <div style="display: flex;
                        align-items: center;">
                            <div style="font-size: 16px; font-weight: bold">
                                Tổng giá tiền:
                            </div>
                            <div>
                                <p class="prices__total text-center justify-content-center">
                                    <span id ="total" style="font-size: 16px"
                                        class="prices__value prices__value--final">{{number_format(Cart::subTotal()).' '.'VND'}}
                                        <!-- <i style="margin:0 auto">(@lang('main.cart.vated'))</i> -->
                                    </span>
                                </p>
        
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if (Auth::check())

            @if (Session::get('cart') != null)
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="ht__coupon__code">
                        <h3>Mã Giảm Giá</h3>
                        <form>
                        @csrf
                        <div class="coupon__box" style="    align-items: center;
                        display: flex;">
                            <input type="text" name="coupon_code" placeholder="Mã giảm giá">
                            <button style="
                            width: 50%;
                        " id="check_coupon_cart" class="cart__submit" type="button">Áp Dụng</button>
                            <br>
                        </div>
                        <br>
                        <p class="text-success" style="font-size: 14px" id="cart_coupon_message"></p>
                        </form>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="htc__cart__total">
                        <h6>Tổng giỏ hàng tạm tính</h6>
                        <div class="cart__desk__list">
                            <ul class="cart__desc">
                                <li>Tổng giá sản phẩm</li>
                                <li>Giảm giá</li>
                            </ul>
                            <ul class="cart__price">
                                <li id="cart_total">{{number_format(Cart::subTotal())}} VNĐ</li>
                                <li id="cart_coupon">
                                    <span id="cart_coupon_status"></span>
                                    {{$coupon_cart}}
                                </li>
                            </ul>
                        </div>
                        <div class="cart__total">
                            <span>Tổng: </span>
                            <span id="cart_totals">{{number_format(Cart::subTotal())}} VNĐ</span>
                        </div>
                        <ul class="payment__btn">
                            <li class="active"><a href="/checkout">thanh toán</a></li>
                            
                        </ul>
                    </div>
                </div> --}}
            </div>
            @endif
            @else 
            <span class="text-danger">Bạn cần đăng nhập để thanh toán*</span>
            {{-- <a href="/customer"><button type="button" class="btn btn-primary"> ---Đăng nhập---</button></a> --}}
            @endif
        </div>
        @php
        if (Auth::guest()){
        $province_id ='';
        }else{
        $province_id = Auth::user()->province_id;
        }
        @endphp
        @if(Cart::count()>0)
        <form action="{{ route('viewOrder') }}" method="POST">
            @csrf
            <input name="province" type="hidden" value="{{$province_id}}" />
            <button type="submit" class="cart__submit">
                Thanh Toán
            </button>
        </form>
        @endif
    </div>

</div>
@endsection
@section('script')
@endsection