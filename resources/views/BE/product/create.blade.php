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
                        <h2>Thêm Sách</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <br />
                        <form role="form" action="{{ route('admin.product.create') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Thể
                                    loại</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="sub_category_id" class="form-control input-sm m-bot15">
                                        
                                        @foreach($sub_categories as $value)
                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Mã 
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="code" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập mã ..." value="{{ old('code') }}">
                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('code'))
                                        {{ $errors->first('code')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên 
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập tên ..." value="{{ old('name') }}">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Giá 
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="price" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập giá ..." value="{{ old('price') }}">
                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('price'))
                                        {{ $errors->first('price')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Số lượng 
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="quantity" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập số lượng ..." value="{{ old('quantity') }}">
                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('quantity'))
                                        {{ $errors->first('quantity')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Khối lượng 
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="weight" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập khối lượng ..." value="{{ old('weight') }}">
                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('weight'))
                                        {{ $errors->first('weight')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kích thước 
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="size" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập kích thước ..." value="{{ old('size') }}">
                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('size'))
                                        {{ $errors->first('size')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Số trang 
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="quantity_page" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập số trang ..." value="{{ old('quantity_page') }}">
                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('quantity_page'))
                                        {{ $errors->first('quantity_page')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                           
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hình
                                    ảnh</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" name="image" id="avatarfile" class="form-control file-upload" />
                                    <img id="avatars" src="{{URL::asset('basic-image.jpg')}}" class="avatars img-thumbnail" alt="thumnail"
                                        style="max-width: 500px; margin-top: 10px;">
                                    <div>
                                        @if ($errors->any())
                                        @if ($errors->has('image'))
                                        {{ $errors->first('image')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                           
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Tác giả</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="author_id" class="form-control input-sm m-bot15">
                                        @foreach($author as $value)
                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nhà xuất bản</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="publisher_id" class="form-control input-sm m-bot15">
                                        @foreach($publisher as $value)
                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Giảm giá(%)</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="sale" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập % ..." value="{{ old('sale') }}">
                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('sale'))
                                        {{ $errors->first('sale')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Mô tả ngắn
                                
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" id="short_description" name="short_description" rows="3">
                                    {{ old('short_description') }}
                                </textarea>

                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('short_description'))
                                        {{ $errors->first('short_description')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Mô tả dài
                                
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" id="long_description" name="long_description" rows="3">
                                    {{ old('long_description') }}
                                </textarea>

                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('long_description'))
                                        {{ $errors->first('long_description')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Trạng
                                    thái</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control cars" name="status" id="">
                                        <option selected value="1">hiển thị
                                        </option>
                                        <option selected value="0">ẩn
                                        </option>
                                    </select>
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