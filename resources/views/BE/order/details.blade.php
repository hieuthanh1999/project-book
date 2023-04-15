@extends('BE.layout_theme')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h5> Chi tiết đơn hàng số {{$orders->id}}</h5>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel-body">
                                <div class="row" style="margin-bottom: 15px;">
                                    <div class="col-lg-4">
                                        <h4>Tên khách hàng: {{$orders->nameReceiver}}</h4>
                                    </div>
                                    <div class="col-lg-8">
                                        <h4>Số điện thoại: {{$orders->phoneReceiver}}</h4>
                                    </div>


                                </div>
                                <div class="row" style="margin-bottom: 30px;">

                                    <div class="col-lg-12">
                                        <h4>Địa chỉ: {{$orders->shipping_address}}</h4>
                                    </div>



                                </div>
                                <div class="row" style="margin-bottom: 15px;">

                                    <div class="col-lg-4">
                                        <h4>Mã hóa đơn: {{$orders->id}}</h4>
                                    </div>
                                    <div class="col-lg-8">
                                        <h4>Trạng thái: {{config('app.order_status.'.$orders->order_status)}}</h4>
                                    </div>



                                </div>
                                <div class="row" style="margin-bottom: 15px;">

                                    <div class="col-lg-4">
                                        <h4>Phương thức thanh toán: {{$orders->payment->type}}</h4>
                                    </div>
                                    <div class="col-lg-8">
                                        <h4>Thời gian tạo: {{$orders->created_at}}</h4>
                                    </div>



                                </div>
                                <div class="panel panel-default">
                                    <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
                                        <thead>
                                            <tr>
                                                <th data-breakpoints="xs">Mã sản phẩm</th>
                                                <th>Tên sản phâm</th>
                                                <th>Hình ảnh</th>
                                                <th>Giá tiền</th>
                                                <th>Số lượng</th>
                                                <th>Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $total = 0.0;
                                            @endphp
                                            @foreach($order_detail as $order_details)
                                            <tr data-expanded="true">
                                                <td>{{$order_details->id}}</td>
                                                <td>{{$order_details->name}}</td>
                                                <td> <span class="text-ellipsis"><img
                                                            src="{{URL::asset('image/product/'.$order_details->image)}}"
                                                            style="object-fit: contain;" height="200"
                                                            width="200"></span></td>
                                                <td>{{ number_format( $order_details->price).' '.'VND' }}</td>
                                                <td>{{$order_details->quality	}}</td>
                                                <td>{{ number_format( $order_details->quality * $order_details->price).' '.'VND'}}
                                                </td>
                                                @php
                                                $total += ($order_details->quality * $order_details->price);
                                                @endphp
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-lg-6">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-4">
                                            <h4>Thành tiền SP:</h4>
                                        </div>
                                        <div class="col-lg-4">
                                            <span>{{number_format($total).' '.'VND' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-lg-6">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-4">
                                            @php
                                            $totals = $orders->subtotal;
                                            $totals += ($orders->shipping->price);
                                            @endphp

                                            <h4>Phí vẩn chuyển<span
                                                    style="font-size: 10px">({{$orders->shipping->name}})</span>:
                                            </h4>
                                        </div>
                                        <div class="col-lg-4">
                                            <span>{{number_format($orders->shipping->price).' '.'VND' }}</span>
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-lg-6">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-4">
                                            <h4>Giảm giá:</h4>
                                        </div>
                                        <div class="col-lg-4">
                                            <span>{{$orders->coupons}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-lg-6">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-4">
                                            <h4>Tổng tiền sản phẩm:</h4>
                                        </div>
                                        <div class="col-lg-4">
                                            <span>{{number_format($totals).' '.'VND' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-lg-6">
                                    </div>
                                    <div class="col-lg-6" style="display: flex; align-items: center;">
                                        <div class="col-lg-4">
                                            <h4>Xác nhận đơn hàng:</h4>
                                        </div>

                                        <div class="col-lg-4">
                                            <form action="/admin/order/update/{{$orders->id}}" method="post">
                                                @csrf
                                                <select onchange='this.form.submit()' name="order_status"
                                                    class="form-control m-bot15" @if($orders->order_status == 3 ||
                                                    $orders->order_status
                                                    == 4 ) disabled="disabled" @endif>
                                                    <option value="{{$orders->order_status}}">
                                                        {{config('app.order_status.'.$orders->order_status)}}</option>
                                                    @foreach (config('app.order_status') as $key => $value)
                                                    @if($orders->order_status != $key)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

</div>
@endsection