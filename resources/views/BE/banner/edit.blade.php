@extends('BE.layout_theme')
@section('content')
<!-- page start-->
<!-- page start-->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Thêm banner</h3>
            </div>


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tạo banner</h2>
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
                        <form role="form" action="{{ route('admin.banner.update', $value->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hình
                                    ảnh</label>
                                <div class="col-md-6 col-sm-6 ">
                                   

                                    <input type="file" name="image" id="avatarfile" class="form-control file-upload" value="{{$value['image']}}" />
                                    <img id="avatars" src="{{URL::asset('image/banner/'.$value['image'])}}" class="avatars img-thumbnail" alt="thumnail"
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên banner
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập tên ..." value="{{ $value['name'] }}">
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
                           
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Cập Nhật</button>
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