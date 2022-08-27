@extends('FE.layout_cart')
@section('content')
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
                                        <a href="">{{ $item->name }}</a><br>
                                    </div>

                                    <div>
                                        <span>số lượng: {{ $item->qty }}</span>
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
                        <p class="prices__total text-center justify-content-center">
                            <span
                                class="prices__value prices__value--final">{{number_format(Cart::subTotal()).' '.'VND'}}
                                <!-- <i style="margin:0 auto">(@lang('main.cart.vated'))</i> -->
                            </span>
                        </p>

                    </div>
                </div>
            </div>
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