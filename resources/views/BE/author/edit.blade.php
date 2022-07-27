@extends('BE.layout_theme')
@section('content')
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhập tác giả
                </header>
                <div class="panel-body">
                    <div class="position-center">

                        <form role="form" action="/admin/author/update/{{$value['id']}}" method="POST" enctype="multipart/form-data">   
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên tác giả</label>
                                <input type="text" name="name" class="form-control" value="{{$value['name']}}">
                                @if($errors->has('name'))
                                <div class="alert alert-danger">
                                    {{$errors->first('name')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <input type="file" id="exampleInputFile" name="author_image"/>
                            <span>
                                @if($errors->has('author_image'))
                                <div class="alert alert-danger">
                                    {{$errors->first('author_image')}}
                                </div>
                                @endif
                            </span>
                        </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả tác giả</label>
                                <textarea style="resize: none" rows="6" name="description" class="form-control">{{$value['description']}}</textarea>
                            </div>
            
                            <button type="submit" class="btn btn-info">Cập nhập</button>
                        </form>
                        <br>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection