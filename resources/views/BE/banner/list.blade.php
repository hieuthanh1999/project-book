@extends('BE.layout_theme')
@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Danh sách banner</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh sách banner</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div> --}}
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">


                                @if(session()->has('delete'))
                                <div class=" text-success custom" style="text-shadow: 0 0 1px black;">
                        {{session()->get('delete')}}
                    </div>
                @endif
                @if(session()->has('save'))
                    <div  class=" text-success custom" style="text-shadow: 0 0 1px black;">
                        {{session()->get('save')}}
                    </div>
                @endif
                @if(session()->has('update'))
                    <div class=" text-success custom" style="text-shadow: 0 0 1px black;">
                        {{session()->get('update')}}
                    </div>
                @endif
                @if(session()->has('disable_status'))
                    <div class=" text-success custom" style="text-shadow: 0 0 1px black;">
                        {{session()->get('disable_status')}}
                    </div>
                @endif
                @if(session()->has('enable_status'))
                    <div class=" text-success custom" style="text-shadow: 0 0 1px black;">
                        {{session()->get('enable_status')}}
                    </div>
                @endif 

                                <div class=" card-box table-responsive">

                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Mã</th>
                                                <th>Hình ảnh</th>
                                                <th>Tên</th>
                                                <th colspan="2" class="text-center">
                                                    <a href="{{ route('admin.banner.create') }}"
                                                        class="btn btn-outline-success">Tạo mới</a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($values as $banner)
                                            <tr>
                                                <td>{{ $banner->id }}</td>
                                                <td>
                                                    @if ($banner->image == null)
                                                    <img class="" style="width: 100px; height:100px;"
                                                        src="https://logos.textgiraffe.com/logos/logo-name/Cate-designstyle-smoothie-m.png"
                                                        alt="">
                                                    @else
                                                    <img class="" style="object-fit: contain;" height="200" width="500"
                                                        style="width: 100px; height:100px;"
                                                        src="{{URL::asset('image/banner/'.$banner['image'])}}" alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $banner->name }}</td>
                                                <td class="text-center"><a href="{{ route('admin.banner.update', $banner->id) }}"
                                                        class="btn btn-outline-info btn-xs"><i class="fa fa-pencil"></i>
                                                        sửa </a></td>
                                                <td class="text-center">
                                                        <a href="{{ route('admin.banner.delete', $banner->id) }}" class="btn btn-outline-danger"><i
                                                                class="fa fa-trash-o"></i> Xóa</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $values->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection