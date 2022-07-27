@extends('BE.layout_theme')
@section('content')
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhập Nhà xuất bản
                </header>
                <div class="panel-body">
                    <div class="position-center">

                        <form role="form" action="/admin/publisher/update/{{$value['id']}}" method="POST">   
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" name="name" class="form-control" value="{{$value['name']}}">
                                @if($errors->has('name'))
                                <div class="alert alert-danger">
                                    {{$errors->first('name')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
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