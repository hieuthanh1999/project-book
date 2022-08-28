@extends('BE.layout_theme')
@section('content')
<!-- page start-->
<!-- page start-->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <!-- <div class="title_left">
                <h3></h3>
            </div> -->


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Câp Nhập Phí Vận Chuyển</h2>
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
                        <form role="form" action="{{ route('admin.shipping.updateship', $value->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập tên ..." value="{{$value->name}}">
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
                            @if($value->province)
                                <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nội
                                    thành:</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="provinceid" class="form-control input-sm m-bot15">
                                        <option value="{{ $value->provinceid }}">{{ $value->province->name }}
                                        @foreach($province as $cate)
                                        @if ($cate->provinceid != $value->provinceid)
                                        <option value="{{ $cate->provinceid }}">{{ $cate->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif


                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Giá
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="price" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập gía ..." value="{{$value->price}}">
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

@endsection