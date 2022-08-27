@extends('BE.layout_theme')
@section('content')
<!-- page start-->
<!-- page start-->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Thêm tác giả</h3>
            </div>


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm tác giả</h2>
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
                        <form role="form" action="{{ route('admin.author.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên tác giả
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hình
                                    ảnh</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" name="author_image" id="avatarfile" class="form-control file-upload" />
                                    <img id="avatars" src="{{URL::asset('basic-image.jpg')}}" class="avatars img-thumbnail" alt="thumnail"
                                        style="max-width: 500px; margin-top: 10px;">
                                    <div>
                                        @if ($errors->any())
                                        @if ($errors->has('author_image'))
                                        {{ $errors->first('author_image')}}
                                        @endif
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Chi tiết
                                
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" id="description" name="description" rows="3">
                                    {{ old('description') }}
                                </textarea>

                                    <!-- <input type="text" id="first-name" name="name" class="form-control "> -->
                                    <div>
                                        @if ($errors->any())

                                        @if ($errors->has('description'))
                                        {{ $errors->first('description')}}
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