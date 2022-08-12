@extends('BE.layout_theme')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sách
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thể loại</label>
                            <select name="sub_category_id" class="form-control input-sm m-bot15">
                                @foreach($sub_categories as $value)
                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã</label>
                            <input type="text" name="code" class="form-control" id="" placeholder="Nhập tên sản phẩm">
                            <span>
                                @if($errors->has('code'))
                                <div class="alert alert-danger">
                                    {{$errors->first('code')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Nhập tên sản phẩm">
                            <span>
                                @if($errors->has('name'))
                                <div class="alert alert-danger">
                                    {{$errors->first('name')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" name="price" class="form-control" id="" placeholder="Nhập giá sản phẩm">
                            <span>
                                @if($errors->has('price'))
                                <div class="alert alert-danger">
                                    {{$errors->first('price')}}
                                </div>
                                @endif
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Khối lượng</label>
                            <input type="text" name="weight" class="form-control" id="" placeholder="Nhập khối lượng">
                            <span>
                                @if($errors->has('weight'))
                                <div class="alert alert-danger">
                                    {{$errors->first('weight')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số trang</label>
                            <input type="text" name="quantity_page" class="form-control" id=""
                                placeholder="Nhập tên sản phẩm">
                            <span>
                                @if($errors->has('quantity_page'))
                                <div class="alert alert-danger">
                                    {{$errors->first('quantity_page')}}
                                </div>
                                @endif
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="text" name="quantity" class="form-control" id=""
                                placeholder="Nhập tên sản phẩm">
                            <span>
                                @if($errors->has('quantity'))
                                <div class="alert alert-danger">
                                    {{$errors->first('quantity')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <input type="file" name="image" id="avatarfile" class="form-control file-upload" />
                            <img id="avatar" src="#" class="avatar img-thumbnail" alt="thumnail"
                                style="max-width: 200px; margin-top: 2px;">
                            <span>
                                @if($errors->has('image'))
                                <div class="alert alert-danger">
                                    {{$errors->first('image')}}
                                </div>
                                @endif
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả ngắn</label>
                            <textarea style="resize: none" rows="6" name="short_description" class="form-control" id=""
                                placeholder="Mô tả "></textarea>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả chi tiết</label>
                            <textarea style="resize: none" rows="6" name="long_description" class="form-control" id=""
                                placeholder="Mô tả"></textarea>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tác giả</label>
                            <select name="author_id" class="form-control input-sm m-bot15">
                                @foreach($author as $value)
                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                            <span>
                                @if($errors->has('author_id'))
                                <div class="alert alert-danger">
                                    {{$errors->first('author_id')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nhà xuất bản</label>
                            <select name="publisher_id" class="form-control input-sm m-bot15">
                                @foreach($publisher as $value)
                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                            <span>
                                @if($errors->has('publisher_id'))
                                <div class="alert alert-danger">
                                    {{$errors->first('publisher_id')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kích thước</label>
                            <select name="size_id" class="form-control input-sm m-bot15">
                                @foreach($size as $value)
                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                            <span>
                                @if($errors->has('size_id'))
                                <div class="alert alert-danger">
                                    {{$errors->first('size_id')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giảm giá (%)</label>
                            <input type="text" name="sale" class="form-control" id="" placeholder="Nhập %">
                            <span>
                                @if($errors->has('sale'))
                                <div class="alert alert-danger">
                                    {{$errors->first('sale')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng Thái</label>
                            <select name="status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>

                        <button type="submit" name="admin/product/create" class="btn btn-info">Thêm</button>
                    </form>
                    <br>
                </div>

            </div>
        </section>
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