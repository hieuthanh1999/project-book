@extends('BE.layout_theme')
@section('content')
<div class="table-agile-info">
    <section class="panel">
        <header class="panel-heading">
            Chi tiết đơn hàng số {{$orders->id}}
        </header>
        <div class="panel-body">
            <div class="row" style="margin-bottom: 15px;">
                <section class="panel">
                    <div class="col-lg-4">
                        <h5>Tên khách hàng: {{$orders->nameReceiver}}</h5>
                    </div>
                    <div class="col-lg-8">
                        <h5>Số điện thoại: {{$orders->phoneReceiver}}</h5>
                    </div>
                </section>

            </div>
            <div class="row" style="margin-bottom: 30px;">
                <section class="panel">
                    <div class="col-lg-12">
                        <h5>Địa chỉ: {{$orders->shipping_address}}</h5>
                    </div>
                </section>

            </div>
            <div class="row" style="margin-bottom: 15px;">
                <section class="panel">
                    <div class="col-lg-4">
                        <h5>Mã hóa đơn: {{$orders->id}}</h5>
                    </div>
                    <div class="col-lg-8">
                        <h5>Trạng thái: {{config('app.order_status.'.$orders->order_status)}}</h5>
                    </div>
                </section>

            </div>
            <div class="row" style="margin-bottom: 15px;">
                <section class="panel">
                    <div class="col-lg-4">
                        <h5>Phương thức thanh toán: {{$orders->payment->type}}</h5>
                    </div>
                    <div class="col-lg-8">
                        <h5>Thời gian tạo: {{$orders->created_at}}</h5>
                    </div>
                </section>

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
                        @foreach($orders->orderDetails as $order_details)
                        <tr data-expanded="true">
                            <td>{{$order_details->id}}</td>
                            <td>{{$order_details->product->name}}</td>
                            <td> <span class="text-ellipsis"><img
                                        src="{{URL::asset('image/product/'.$order_details->product->image)}}"
                                        style="object-fit: contain;" height="200" width="200"></span></td>
                            <td>{{ number_format( $order_details->price).' '.'VND' }}</td>
                            <td>{{$order_details->quality	}}</td>
                            <td>{{ number_format( $order_details->quality * $order_details->price).' '.'VND'}}</td>
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
                        @php
                        $total += ($orders->shipping->price);
                        @endphp
                        <h5>Phí vẩn chuyển<span
                                style="font-size: 10px">({{$orders->shipping->name}})</span>:</h5>
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
                        <h5>Tổng tiền sản phẩm:</h5>
                    </div>
                    <div class="col-lg-4">
                        <span>{{number_format($total).' '.'VND' }}</span>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6" style="display: flex; align-items: center;">
                    <div class="col-lg-4">
                        <h5>Xác nhận đơn hàng:</h5>
                    </div>
  
                    <div class="col-lg-4">
                        <form action="/admin/order/update/{{$orders->id}}" method="post">
                            @csrf
                            <select onchange='this.form.submit()' name="order_status" class="form-control m-bot15" @if($orders->order_status == 3 || $orders->order_status
                                == 4 ) disabled="disabled" @endif>
                                <option value="{{$orders->order_status}}">{{config('app.order_status.'.$orders->order_status)}}</option>
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
</section>
</div>
@endsection