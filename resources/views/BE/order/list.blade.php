@extends('BE.layout_theme')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <!-- <div class="page-title">
            <div class="title_left">
                <h3>Danh sách thể loại</h3>
            </div>
        </div> -->

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh Sách Đơn Hàng</h2>
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
                                <div class=" text-success custom" style="text-shadow: 0 0 1px black;">
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
                                                <th>Mã hoá đơn</th>
                                                <th>Khách hàng</th>
                                                <th>Phương thúc</th>
                                                <th>Trạng thái</th>
                                                <th>Ngày tạo</th>
                                                <th class="text-center" colspan="2">
                                                    <!-- <a href="{{ route('admin.subcategory.create') }}"
                                                        class="btn btn-outline-success">Tạo mới</a> -->
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order as $value )
                                            <tr>

                                                <td>{{$value->id}}</td>
                                                <td>{{$value->user->name}}</td>
                                                <td>{{$value->payment->type}}</td>
                                                <td>
                                                    {{config('app.order_status.'.$value->order_status)}}
                                                </td>
                                                <td>{{$value->created_at}}</td>
                                                <td class="text-center"><a
                                                        href="{{ route('admin.order.detailOrder', $value->id) }}"
                                                        class="btn btn-outline-info btn-xs"><i class="fa fa-pencil"></i>
                                                        Chi tiết </a></td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.order.deleteOrder', $value->id) }}"
                                                        class="btn btn-outline-danger"><i
                                                            class="fa fa-trash-o"></i> Xóa</a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    {{ $order->links() }}
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