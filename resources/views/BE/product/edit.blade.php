@extends('BE.layout_theme')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhập sách
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="/admin/product/update/{{$values['id']}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thể loại</label>
                            <select name="sub_category_id" class="form-control input-sm m-bot15">
                                @foreach($sub_categories as $value)
                                   @if($values['sub_category_id'] == $value['id'])
                                        <option selected value="{{$value['id']}}">{{$value['name']}}</option>
                                    @else
                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span>
                                @if($errors->has('sub_category_id'))
                                <div class="alert alert-danger">
                                    {{$errors->first('sub_category_id')}}
                                </div>
                                @endif
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã</label>
                            <input type="text" name="code" class="form-control" id=""
                                placeholder="Nhập mã sản phẩm" value="{{$values['code']}}">
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
                            <input type="text" name="name" class="form-control" id=""
                                placeholder="Nhập tên sản phẩm" value="{{$values['name']}}">
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
                            <input type="text" name="price" class="form-control" id=""
                                placeholder="Nhập giá sản phẩm" value="{{$values['price']}}">
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
                            <input type="text" name="weight" class="form-control" id=""
                                placeholder="Nhập khối lượng" value="{{$values['weight']}}">
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
                                placeholder="Nhập tên sản phẩm" value="{{$values['quantity_page']}}">
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
                                placeholder="Nhập tên sản phẩm" value="{{$values['quantity']}}">
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
                            <input type="file" id="exampleInputFile" name="image" value="{{$values['image']}}"/>
                            <img style="margin-top: 10px; object-fit: contain;"  height="300" width="300" src="{{asset('image/product/'.$values['image'])}}" alt="" />
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
                                placeholder="Mô tả ">{{$values['short_description']}}</textarea >

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả chi tiết</label>
                            <textarea style="resize: none" rows="6" name="long_description" class="form-control" id=""
                                placeholder="Mô tả">{{$values['long_description']}}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tác giả</label>
                            <select name="author_id" class="form-control input-sm m-bot15">
                                @foreach($author as $value)
                                    @if($values['sub_category_id'] == $value['id'])
                                        <option selected value="{{$value['id']}}">{{$value['name']}}</option>
                                    @else
                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                    @endif
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
                                    @if($values['sub_category_id'] == $value['id'])
                                        <option selected value="{{$value['id']}}">{{$value['name']}}</option>
                                    @else
                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                    @endif
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
                                    @if($values['sub_category_id'] == $value['id'])
                                        <option selected value="{{$value['id']}}">{{$value['name']}}</option>
                                    @else
                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                    @endif
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
                            <label for="exampleInputPassword1">Mã giảm giá</label>
                            <select name="discount_id" class="form-control input-sm m-bot15">
                                @foreach($discount as $value)
                                    @if($values['sub_category_id'] == $value['id'])
                                        <option selected value="{{$value['id']}}">{{$value['name']}}</option>
                                    @else
                                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>

                        <button type="submit" class="btn btn-info">Cập Nhập</button>
                    </form>
                    <br>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection