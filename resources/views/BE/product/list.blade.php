@extends('BE.layout_theme')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt Kê Sách
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
        </div> -->
    </div>

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
                    <th>Mã</th>
                    <th>Thể loại</th>
                    <th>Tác giả</th>
                    <th>Nhà xuất bản</th>
                    <th>Tên</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Kích cỡ</th>
                    <th>Số trang</th>
                    <th>Khối lượng</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                    <th style="width:30px;"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($values as $value )
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td> <span class="text-ellipsis">{{$value['code']}}</span></td>
                        <td>
                            @foreach($sub_categorys as $item)
                                @if($value['sub_category_id'] == $item['id'])
                                <span class="text-ellipsis">{{$item['name']}}</span>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($author as $item)
                                @if($value['author_id'] == $item['id'])
                                <span class="text-ellipsis">{{$item['name']}}</span>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($publisher as $item)
                                @if($value['publisher_id'] == $item['id'])
                                <span class="text-ellipsis">{{$item['name']}}</span>
                                @endif
                            @endforeach
                        </td>
                        <td> <span class="text-ellipsis">{{$value['name']}}</span></td>
                        <td> <span class="text-ellipsis">{{$value['quantity']}}</span></td>
                        <td> <span class="text-ellipsis">{{number_format($value['price']).' '.'VND'}}</span></td>
                        <td> <span class="text-ellipsis"><img src="{{URL::asset('image/product/'.$value['image'])}}"  style="object-fit: contain;" height="200"width="200"></span></td>
                        <td>
                            @foreach($size as $item)
                                @if($value['size_id'] == $item['id'])
                                <span class="text-ellipsis">{{$item['name']}}</span>
                                @endif
                            @endforeach
                        </td>
                        <td> <span class="text-ellipsis">{{$value['quantity_page']}}</span></td>
                        <td> <span class="text-ellipsis">{{$value['weight']}}</span></td>
                        <td><span class="text-ellipsis">
                            @if($value['status']>0)
                            <a href="/admin/product/disable_status/{{$value['id']}}"><span
                                    class="fa-thumb-styling-up fa fa-eye"></span></a>
                            @else
                            <a href="/admin/product/enable_status/{{$value['id']}}"><span
                                    class="fa-thumb-styling-down fa fa-eye-slash"></span></a>
                            @endif
                            </span></td>
                        <td>
                            <a href="/admin/product/update/{{$value['id']}}" class="active x" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <a onclick="return confirm('Xác nhận xóa?')" href="/admin/product/delete/{{$value['id']}}"
                                class="active y" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection