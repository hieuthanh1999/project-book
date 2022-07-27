@extends('BE.layout_theme')
@section('content')
    <!-- page start-->
    <!-- page start-->
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cap nhap
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="/admin/banner/update/{{$value['id']}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input type="text" name="name" class="form-control" value="{{$value['name']}}"id="exampleInputEmail1" placeholder="Nhập tên danh mục sản phẩm">
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
                            <input type="file" id="exampleInputFile" name="image" value="{{$value['image']}}"/>
                            <img style="object-fit: contain;" height="200"width="500" src="{{asset('image/banner/'.$value['image'])}}" alt="" />
                            <span>
                                @if($errors->has('image'))
                                <div class="alert alert-danger">
                                    {{$errors->first('image')}}
                                </div>
                                @endif
                            </span>
                        </div>
                    
                        <button type="submit" name="" class="btn btn-info">Cap nhap</button>
                    </form>
                    <br>
                </div>

            </div>
        </section>
    </div>
</div>

@endsection