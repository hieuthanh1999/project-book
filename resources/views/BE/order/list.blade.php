@extends('BE.layout_theme')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách đơn hàng
        </div>
        <!-- <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div> -->
        <div class="table-responsive">
            @if(session()->has('delete'))
            <div class="alert alert-success">
                {{session()->get('delete')}}
            </div>
            @endif
            <!-- @if(session()->has('save'))
                    <div class="alert alert-success">
                        {{session()->get('save')}}
                    </div>
                @endif
                @if(session()->has('update'))
                    <div class="alert alert-success">
                        {{session()->get('update')}}
                    </div>
                @endif
                @if(session()->has('disable_status'))
                    <div class="alert alert-success">
                        {{session()->get('disable_status')}}
                    </div>
                @endif
                @if(session()->has('enable_status'))
                    <div class="alert alert-success">
                        {{session()->get('enable_status')}}
                    </div>
                @endif  -->
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Mã hoá đơn</th>
                        <th>Khách hàng</th>
                        <th>Phương thúc</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th><a href=""><i class="fa fa-plus-square fa-lg"></i></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $value )
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$value->id}}</td>
                        <td>{{$value->user->name}}</td>
                        <td>{{$value->payment->type}}</td>
                        <td>
                        {{config('app.order_status.'.$value->order_status)}}
                        </td>
                        <td>{{$value->created_at}}</td>
                        <td> <a href="{{ route('detailOrder', $value->id )}}"><i
                                    class="fa fa-eye text-dark fa-lg"></i></a>
                        <td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <span>{!! $order->links() !!}</span>
</div>
@endsection