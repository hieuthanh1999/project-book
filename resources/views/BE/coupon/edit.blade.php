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
         <form action="{{ route('admin.coupons.update', $data->coupon_id)}}" method="POST">
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Sửa Mã Giảm Giá</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tên Mã Giảm Giá<span class="text-danger">*</span></label>
                    <input type="text" name="coupon_name" value="{{$data->coupon_name}}" class="form-control">
                    @error('coupon_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Mã Giảm Giá<span class="text-danger">*</span></label>
                    <input type="text" name="coupon_code" value="{{$data->coupon_code}}" class="form-control">
                    @error('coupon_code')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Giá Trị<span class="text-danger">*</span></label>
                    <input type="text" name="coupon_value" value="{{$data->coupon_value}}" class="form-control">
                    @error('coupon_value')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Loại Mã Giảm Giá<span class="text-danger">*</span></label>
                    <select name="coupon_status" class="form-control">
                      <option value="1" 
                        @if ($data->coupon_status == 1)
                            {{'selected'}}
                        @endif
                      >Giảm Theo Phần Trăm</option>
                      <option value="2"
                        @if ($data->coupon_status == 2)
                            {{'selected'}}
                        @endif
                      >Giảm Theo Tiền</option>
                    </select>
                    @error('coupon_status')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Ngày Hết Hạn<span class="text-danger">*</span></label>
                    <input type="date" name="coupon_expiry" value="{{$data->coupon_expiry}}" class="form-control">
                    @error('coupon_expiry')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
          <button type="submit" class="btn btn-primary pull-right">Sửa Mã Giảm Giá</button>
        </form>
    </div>
</div>

@endsection