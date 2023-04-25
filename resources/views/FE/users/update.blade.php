@extends('FE.layout_account')
@section('content')
    @php
        if (Auth::guest()) {
            $name = '';
            $phone = '';
            $address = '';
            $province_id = '';
            $district_id = '';
        } else {
            $name = Auth::user()->name;
            $phone = Auth::user()->phone;
            $address = Auth::user()->address;
            $province_id = Auth::user()->province_id;
            $district_id = Auth::user()->district_id;
        }
    @endphp
    <div class="container">
        <div class="row" style="margin-bottom: 20px;
    margin-top: 20px;">
            <div class="col-12">
                <div class="vertical-tab" role="tabpanel" style="width: 100%">
                    <!-- Nav tabs -->
                    <!-- <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab"
                                        data-toggle="tab">Thông tin tài khoản</a></li>
                                <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Yêu
                                        thích ({{ Auth::user()->wishlist->count() }})</a></li>
                                <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab"
                                        data-toggle="tab">Hóa đơn</a></li>
                            </ul> -->
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                            <div class="row">

                                <h3 class="col-sm-12 col-md-4 col-lg-4">Cập nhật tài khoản</h3>
                            </div>
                            <div class="card">
                                <form role="form" action="{{ route('user-update', $wish->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="card-body">
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <div style="margin: 10px 0">
                                            <h4 class="card-title">Tên: </h4>
                                            <input style="width: 100%;" class="card-title" type="text" name="name"
                                                value="{{ $wish->name }}">
                                        </div>
                                        <div style="margin: 10px 0">
                                            <h4 class="card-title">Tỉnh/Thành Phố: </h4>
                                            <select style="width: 100%;" class="card-title" id="country_id"
                                                name="province_id">
                                                <option value="{{ $province_id }}">{{ Auth::user()->province->name }}
                                                </option>
                                                @foreach ($countries as $country)
                                                    @if ($country->provinceid != null && $country->provinceid != $province_id)
                                                        <option value="{{ $country->provinceid }}">{{ $country->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="margin: 10px 0">
                                            <h4 class="card-title">Quận/Huyện: </h4>
                                            <select style="width: 100%;" class="card-title" id="state_id"
                                                name="district_id">
                                                <option value="{{ $district_id }}">{{ Auth::user()->district->name }}
                                                </option>
                                                @foreach ($states as $country)
                                                    @if ($country->districtid != null && $country->districtid != $province_id)
                                                        <option value="{{ $country->districtid }}">{{ $country->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="margin: 10px 0">
                                            <h4 class="card-title">Địa chỉ: </h4>
                                            <input style="width: 100%;" class="card-title" type="text" name="address"
                                                value="{{ $wish->address }}">

                                        </div>
                                        <button href="#" class="btn btn-info">Cập nhật</button>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <div style="margin: 10px 0">
                                            <h4 class="card-title">Email: </h4>
                                            <input style="width: 100%;" class="card-title" type="text" name="email"
                                                value="{{ $wish->email }}">
                                        </div>
                                        <div style="margin: 10px 0">
                                            <h4 class="card-title">Điện thoại: </h4>
                                            <input style="width: 100%;" class="card-title" type="number" name="phone"
                                                value="{{ $wish->phone }}">
                                        </div>


                                        {{-- <h4 class="card-subtitle mb-2 text-muted">Email: {{ $wish->email }}</h4>
                                        <h4 class="card-subtitle mb-2 text-muted">Số điện thoại: {{ $wish->phone }}</h4> --}}


                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">



                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                        <!-- <div role="tabpanel" class="tab-pane fade" id="Section2">
                                    <h3 style="text-align: center;">Yêu thích </h3>
                                    @if ($wish->wishlist->count() > 0)
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
                                            @foreach ($wish->wishlist as $pro)
    <tr>
                                                <th scope="row">{{ $i++ }}</th>
                                                <td>{{ $pro->product->name }}</td>
                                                <td><img style="width: 150px; height: auto; object-fit: contain;"
                                                        src="{{ URL::asset('image/product/' . $pro->product->image) }}" alt=""></td>
                                                <td>{{ number_format($pro->product->price) . ' ' . 'VND' }}</td>
                                                <td>
                                                    <form action="{{ route('deleteWish', $pro->wish_id) }}" method="post">
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
                                    @if ($wish->order->count() > 0)
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
                                            @foreach ($wish->order as $value)
    <tr>
                                                <th scope="row">{{ $i++ }}</th>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->payment->type }}</td>

                                                <td><span
                                                        class="badge badge-warning">{{ config('app.order_status.' . $value->order_status) }}</span>
                                                </td>
                                                <td>{{ $value->created_at }}</td>
                                                <td>details</td>
                                            </tr>
    @endforeach
                                        </tbody>
                                    </table>
@else
    <h4 style="text-align: center;">Chưa có hóa đơn!</h4>
    @endif
                                </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#country_id').change(function() {
                var $city = $('#state_id');
                if ($(this).val() == 0) {
                    $('#city').css('display', 'none');
                    $('#address').css('display', 'none');
                } else {
                    $.ajax({
                        url: "{{ route('cities.index') }}",
                        data: {
                            country_id: $(this).val()
                        },
                        success: function(data) {
                            var obj = JSON.parse(data);
                            $("#state_id option").remove();
                            $.each(obj, function(id, value) {
                                $city.append('<option value="' + id + '">' + value +
                                    '</option>');
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
