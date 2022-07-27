@extends('BE.layout_theme')
@section('content')
<!-- page start-->
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm mã giảm giá
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên mã</label>
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
                            <label for="exampleInputEmail1">Giá tiền</label>
                            <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Nhập gía tiền">
                            <span>
                                @if($errors->has('price'))
                                <div class="alert alert-danger">
                                    {{$errors->first('price')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize: none" rows="6" name="description" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục sản phẩm"></textarea>
                        </div>
                        <div class="form-group" style="    width: 10%;">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>

                        <button type="submit" name="admin/discount/create" class="btn btn-info">Thêm</button>
                    </form>
                    <br>
                </div>

            </div>
        </section>
    </div>
</div>

@endsection