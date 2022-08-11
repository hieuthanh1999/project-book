@extends('FE.layout_cart')
@section('content')
<div class="container">
    <div class="row justify-content-center" style="display: block">
        <div class="   text-center p-0 mt-3 mb-2">
            <div class="card-c px-0 pt-4 pb-0 mt-3 mb-3">
                <div class="check-logo">
                    <p class="text-logo" style="margin: 20px 0">Đặt hàng cùng Kim Đồng ngay hôm nay để nhận được nhiều khuyến mãi hấp dẫn</p>
                </div>
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>Thông tin thanh toán</strong></li>
                        <li class="active" id="payment"><strong>Thanh toán & đặt mua</strong></li>
                        <li class="active" id="confirm"><strong>Hoàn thành</strong></li>
                    </ul>
                    <fieldset>
                        <div class="form-card">
                            <br><br>
                            <h2 class="purple-text text-center"><strong>Cám ơn bạn đã đặt hàng tại Kim Đồng !</strong>
                            </h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img
                                        src="https://icon-library.com/images/complete-icon-png/complete-icon-png-6.jpg"
                                        class="fit-image"> </div>
                            </div> <br>

                            <div class="row">
                                <div class="col-7">
                                    <!-- <h4 class=" text-center">Xem đơn hàng của bạn <a href=""
                                            style="color: rgb(243, 54, 54);">Tại đây</a></h4> -->
                                    <h4 class="purple-text"><a href="/"><i class="fa fa-arrow-left"></i> Tiếp tục mua sắm</a></h4>
                                </div>
                            </div>
                        </div>
                    </fieldset>
            </div>
        </div>
    </div>
</div>
@endsection