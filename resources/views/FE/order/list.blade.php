@extends('FE.layout_cart')
@section('content')
<div class="container">
    <div class="row justify-content-center" style="display: block">
        <div class="   text-center p-0 mt-3 mb-2">
            <div class="card-c px-0 pt-4 pb-0 mt-3 mb-3">
                <div class="check-logo">
                    <p class="text-logo" style="margin: 20px 0">Đặt hàng cùng Kim Đồng ngay hôm nay để nhận được nhiều
                        khuyến mãi hấp dẫn</p>
                </div>
                <form action="{{ route('storeOrder') }}" id="msform" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="fee_price" value="{{$fee_price['id']}}" />
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>Thông tin thanh toán</strong></li>
                        <li id="payment"><strong>Thanh toán & đặt mua</strong></li>
                        <li id="confirm"><strong>Hoàn thành</strong></li>
                    </ul>
                    <fieldset>
                        <div class="form-card">
                            @php
                            if (Auth::guest()){
                            $name='';
                            $phone='';
                            $address='';
                            $province_id ='';
                            $district_id ='';
                            }else{
                            $name = Auth::user()->name;
                            $phone = Auth::user()->phone;
                            $address = Auth::user()->address;
                            $province_id = Auth::user()->province_id;
                            $district_id = Auth::user()->district_id;
                            }
                            @endphp
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="fieldlabels col-3">Họ và tên:</label>
                                        <input id="huhu-name" name="order_name" type="text" class="col-8" placeholder=""
                                            value="{{$name}}" />
                                        {{--  tên  --}}

                                        <label class="fieldlabels col-3">Số điện thoại nhận hàng:</label>
                                        <input id="first-name" type="number" name="order_phone" value="{{$phone}}"
                                            class="col-8" placeholder="" />
                                        {{--  sđt nhận hàng  --}}

                                        <label class="fieldlabels col-3">Tỉnh/Thành phố:</label>

                                        <select class="col-8 form-control custom-control" 
                                            id="country_id" name="province_id">
                                            <option value="{{ $province_id }}">{{ Auth::user()->province->name }}
                                            </option>
                                            @foreach($countries as $country)
                                            @if ($country->provinceid != null && $country->provinceid != $province_id)
                                            <option value="{{ $country->provinceid }}">{{ $country->name }}</option>
                                            @endif

                                            @endforeach
                                        </select>


                                        <label class="fieldlabels col-3">Quận/Huyện: </label>
 

                                        <select class="col-8 form-control custom-control" 
                                            id="state_id" name="district_id">
                                            <option value="{{ $district_id }}">{{ Auth::user()->district->name }}
                                            </option>
                                            @foreach($states as $country)
                                            @if ($country->districtid != null && $country->districtid != $province_id)
                                            <option value="{{ $country->districtid }}">{{ $country->name }}</option>
                                            @endif

                                            @endforeach
                                        </select>

                                        <label class="fieldlabels col-3">Địa chỉ:</label>
                                        <input id="adress" type="text" name="order_address" value="{{$address}}"
                                            class="col-8" placeholder="" />
                                        {{--  địa chỉ  --}}
                                    </div>

                                </div>
                                <div class="col-md-3"></div>
                            </div>

                        </div> <input type="button" id="submit" name="next" class="next action-button"
                            value="Tiếp theo" />
                    </fieldset>

                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <div class="small-container  cart-page2 ">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <table style="text-align:center">
                                                    <tr>
                                                        <th style="text-align: center">Tên sản phẩm</th>
                                                        <th style="text-align: center">Hình ảnh</th>
                                                        <th style="text-align: center">Số lượng</th>
                                                        <th style="text-align: center">Giá</th>
                                                    </tr>
                                                    @foreach (Cart::content() as $item)
                                                    <tr>
                                                        <td style="text-align: center">
                                                            {{ $item->name }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            <div class="cart-info" style="justify-content: center">

                                                                <img style="height: 200px; width: 150px; object-fit: contain;"
                                                                    src="{{URL::asset('image/product/'. $item->options->image )}}"
                                                                    alt="">
                                                            </div>

                                                        </td style="text-align: center">

                                                        <td style="text-align: center">{{ $item->qty }}</td>

                                                        <td style="text-align: center">
                                                            {{ number_format($item->price).' '.'VND'}}</td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                                <div class="total-price2">
                                                    <table>
                                                        <tr>
                                                            <td>Tổng tiền</td>
                                                            <td style="text-align: center">
                                                                {{(number_format(Cart::subTotal())).' '.'VND'}}</td>
                                                              
                                                        </tr>
                                                        <tr>
                                                            <td>Khuyến mãi</td>
                                                            <td style="text-align: center">
                                                                {{$valuesCounpons}}</td>
                                                              
                                                        </tr>

                                                        <tr>
                                                            <td>Phí vận chuyển</td>
                                                            <td style="text-align: center">
                                                                {{number_format($fee_price['price']).' '.'VND' }}</td>
                                                        
                                                        </tr>
                                                        <tr>
                                                            <td>Thành tiền</td>
                                                            <td style="text-align: center">
                                                                {{number_format($total + $fee_price['price']).' '.'VND'}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                        <input type="button" name="previous" class="previous action-button-previous" value="Quay lại" />
                        <input type="submit" name="next" class="next action-button" value="Đặt hàng" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);

    $(".next").click(function() {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        console.log($("fieldset").index(next_fs));
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs) - 1).addClass("active");
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
        });
        setProgressBar(++current);
    });

    $(".previous").click(function() {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }


});
</script>
<style>
.custom-control {
    padding: 8px 15px 8px 15px;
    border: 1px solid rgb(204, 204, 204);
    border-radius: 4px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    outline: none;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px;
    margin: 0 0 15px 0;
}
</style>
<script>
    $(document).ready(function() {
        $('#country_id').change(function() {
            var $city = $('#state_id');
            if($(this).val() == 0){
                $('#city').css('display', 'none');
                $('#address').css('display', 'none');
            }else{
                $.ajax({
                url: "{{ route('cities.index') }}",
                data: {
                    country_id: $(this).val()
                },
                success: function(data) {
                    var obj = JSON.parse(data) ;
					$("#state_id option").remove();
                    $.each(obj, function(id, value) {
                    	$city.append('<option value="'+id+'">'+value+'</option>');
                    });
                    $('#city').show(150);
                    $('#address').show(150);
                }
            });
            }
            
        });

    });
</script>
@endsection