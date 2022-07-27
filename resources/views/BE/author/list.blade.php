@extends('BE.layout_theme')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt Kê tác giả
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
                @if(session()->has('save'))
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
                @endif 
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên</th>
                        <th>Hình ảnh</th>
                        <th>Trạng thái</th>
                     
                        <th>Ngày tạo</th>
                        <th>Chức năng</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($values as $value )
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$value['name']}}</td>
                        <td> <span class="text-ellipsis"><img src="{{URL::asset('image/author/'.$value['author_image'])}}"  style="object-fit: contain;" height="200"width="200"></span></td>
                        <td><span class="text-ellipsis">
                            @if($value['status']>0)
                            <a href="/admin/author/disable_status/{{$value['id']}}"><span
                                    class="fa-thumb-styling-up fa fa-eye"></span></a>
                            @else
                            <a href="/admin/author/enable_status/{{$value['id']}}"><span
                                    class="fa-thumb-styling-down fa fa-eye-slash"></span></a>
                            @endif
                            </span></td>
                       
                        <td><span class="text-ellipsis">{{$value['created_at']}}</span></td>
                        <td>
                            <a href="/admin/author/update/{{$value['id']}}" class="active x" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>


                            <a onclick="return confirm('Xác nhận xóa?')" href="/admin/author/delete/{{$value['id']}}"
                                class="active y" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <span>{!! $values->links() !!}</span>
</div>
@endsection