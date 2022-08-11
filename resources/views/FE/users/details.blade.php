@extends('FE.layout_account')
@section('content')
<div class="container">
    <div class="row" style="margin-bottom: 20px;
    margin-top: 20px;">
        <div class="col-12">
            <div class="vertical-tab" role="tabpanel" style="width: 100%">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab"
                            data-toggle="tab">Thông tin tài khoản</a></li>
                    <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Yêu
                            thích ({{ Auth::user()->wishlist->count() }})</a></li>
                    <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab"
                            data-toggle="tab">Hóa đơn</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                        <h3 style="text-align: center;">Thông tin tài khoản</h3>
                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title">Tên: {{$wish->name}}</h4>
                                <h6 class="card-subtitle mb-2 text-muted">Email: {{$wish->email}}</h6>
                                <h6 class="card-subtitle mb-2 text-muted">Số điện thoại: {{$wish->phone}}</h6>

                                @foreach($countries as $countrie)
                                @if($countrie->provinceid == $wish->province_id)
                                <h6 class="card-subtitle mb-2 text-muted">Tỉnh/Thành Phố: {{$countrie->name}}</h6>
                                @endif

                                @endforeach
                                @foreach($states as $state)
                                @if($state->districtid == $wish->district_id)
                                <h6 class="card-subtitle mb-2 text-muted">Quận/Huyện: {{$state->name}}</h6>
                                @endif

                                @endforeach
                                <h6 class="card-subtitle mb-2 text-muted">Địa chỉ: {{$wish->address}}</h6>
                                <a href="#" class="btn btn-info">Thay đổi tài khoản</a>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Section2">
                        <h3 style="text-align: center;">Yêu thích </h3>
                        @if($wish->wishlist->count() >0 )
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên Sách</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Giá Tiền</th>
                                    <th scope="col">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($wish->wishlist as $pro)
                                <tr>
                                    <th scope="row">{{$i++;}}</th>
                                    <td>{{$pro->product->name}}</td>
                                    <td><img style="width: 150px; height: auto; object-fit: contain;"
                                            src="{{URL::asset('image/product/'. $pro->product->image )}}" alt=""></td>
                                    <td>{{ number_format($pro->product->price).' '.'VND'}}</td>
                                    <td>
                                        <form action="{{route('deleteWish', $pro->wish_id)}}" method="post">
                                            @csrf
                                            <button type="submit"> <span class="glyphicon glyphicon-remove"></span> Xóa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <h4 style="text-align: center;">Chưa có sản phẩm yêu thích!</h4>
                        @endif

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Section3">
                        <h3 style="text-align: center;">Hóa đơn</h3>
                        @if($wish->order->count() >0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col-2">STT</th>
                                    <th scope="col-2">Mã đơn hàng</th>
                                    <th scope="col-2">Phương thức</th>
                                    <th scope="col-2">Trạng thái</th>
                                    <th scope="col-2">Ngày tạo</th>
                                    <th scope="col-2">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($wish->order as $value)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->payment->type}}</td>

                                    <td><span
                                            class="badge badge-warning">{{config('app.order_status.'.$value->order_status)}}</span>
                                    </td>
                                    <td>{{$value->created_at}}</td>
                                    <td>details</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <h4 style="text-align: center;">Chưa có hóa đơn!</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection