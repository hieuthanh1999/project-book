@extends('BE.layout_theme')
@section('content')
<!-- page start-->
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <div class="agile-grid">
            <header class="panel-heading">
                Thêm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục sản phẩm">
                            <span>
                                @if($errors->has('name'))
                                <div class="alert alert-danger">
                                    {{$errors->first('name')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <!-- <input type="file" id="exampleInputFile" name="image"/> -->

                            <input type="file" name="image" id="avatarfile" class="form-control file-upload" />
                            <img id="avatar" src="#" class="avatar img-thumbnail" alt="thumnail"
                                style="max-width: 500px; margin-top: 2px;">
                            <span>
                                @if($errors->has('image'))
                                <div class="alert alert-danger">
                                    {{$errors->first('image')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group" style="    width: 10%;">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>

                        <button type="submit" name="admin/banner/create" class="btn btn-info">Thêm</button>
                    </form>
                    <br>
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
                    $('.avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function() {
            readURL(this);
        });

        $('#avatar').on('click', function() {
            $('#avatarfile').trigger('click');
        });
    });
    </script>
@endsection