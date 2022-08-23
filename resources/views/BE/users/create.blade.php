@extends('BE.layout_theme')
@section('content')
<!-- page start-->
<!-- page start-->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <!-- <div class="title_left">
                <h3>Thêm banner</h3>
            </div> -->


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm Khách Hàng</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                        <br />
                        @if ($errors->has('province_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('province_id') }}</strong>
                        </span>
                        @endif
                        <br />
                        @if ($errors->has('district_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('district_id') }}</strong>
                        </span>
                        @endif
                        <br />
                        <form role="form" action="{{ route('admin.user.create') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên khách
                                    hàng
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập tên ..." value="{{ old('code') }}">
                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('name'))
                                        {{ $errors->first('name')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email khách
                                    hàng
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập email ..." value="{{ old('email') }}">
                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('email'))
                                        {{ $errors->first('email')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Số điện
                                    thoại
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập số điện thoại ..." value="{{ old('email') }}">
                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('phone'))
                                        {{ $errors->first('phone')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Tỉnh/Thành</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control input-sm m-bot15" id="country_id" name="province_id">
                                        <option value="0" selected>Tỉnh/Thành</option>
                                        @foreach($countries as $country)

                                        <option value="{{ $country->provinceid }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" id="city" style="display: none">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Quận/Huyện</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control input-sm m-bot15 " id="state_id" name="district_id">

                                    </select>
                                </div>
                            </div>
                            <div class="item form-group" id="address" style="display: none">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Xã/Ngõ/Số
                                    nhà</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="address" id="address" class="form-control"
                                        value="{{ old('address') }}" />

                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Tạo Mới</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.avatars').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function() {

        readURL(this);
    });

    $('#avatars').on('click', function() {
        $('#avatarfile').trigger('click');
    });
});
</script>
@endsection