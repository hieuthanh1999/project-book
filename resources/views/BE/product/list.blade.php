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
                            <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
   
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li> -->
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
                                            <tr style="text-align: center;">
                                                <th>Mã</th>
                                                <th>Tên</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Hình ảnh</th>
                                                <th>Trạng thái</th>
                                                <th colspan="3" class="text-center">
                                                    <a href="{{ route('admin.product.createView') }}"
                                                        class="btn btn-outline-success">Tạo mới</a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;">
                                            @foreach($values as $value)
                                            <tr>
                                                <td>{{ $value->code }}</td>

                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->quantity }}</td>
                                                <td> <span
                                                        class="text-ellipsis">{{number_format($value['price']).' '.'VND'}}</span>
                                                </td>
                                                <td>
                                                    <img src="{{URL::asset('image/product/'.$value['image'])}}"
                                                        style="object-fit: contain;" height="200" width="200">
                                                </td>

                                                <td> @if($value['status']>0)
                                                    <a href="/admin/product/disable_status/{{$value['id']}}"><span
                                                            class="fa-thumb-styling-up fa fa-eye"></span></a>
                                                    @else
                                                    <a href="/admin/product/enable_status/{{$value['id']}}"><span
                                                            class="fa-thumb-styling-down fa fa-eye-slash"></span></a>
                                                    @endif
                                                </td>
                                                <td class="text-center"><a data-id="{{$value->id}}" id="mediumButton"
                                                        class="btn btn-outline-info btn-xs"><i class="fa fa-eye"></i>
                                                        chi tiết </a>





                                                </td>
                                                <td class="text-center"><a
                                                        href="{{ route('admin.product.update', $value->id) }}"
                                                        class="btn btn-outline-info btn-xs"><i class="fa fa-pencil"></i>
                                                        sửa </a></td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.product.delete', $value->id) }}"
                                                        class="btn btn-outline-danger"><i
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
    <!-- medium modal -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 1200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Chi Tiết Sách</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <div class="col-md-12">
                                            <div class="item form-group col-md-6">
                                                <label for="middle-name"
                                                    class="col-form-label col-md-3 col-sm-3 label-align customx">Thể
                                                    loại:</label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                    <span id="theloai"></span>
                                                </div>
                                            </div>
                                            <div class="item form-group col-md-6">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align customx">Mã:
                                                </label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                    <span id="ma"></span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="item form-group col-md-6">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align customx">Tên:
                                                </label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                    <span id="ten"></span>
                                                </div>

                                            </div>
                                            <div class="item form-group col-md-6">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align customx">Giá:
                                                </label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                    <span id="gia"></span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="item form-group col-md-6">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align customx">Số
                                                    lượng:
                                                </label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                    <span id="soluong"></span>
                                                </div>

                                            </div>
                                            <div class="item form-group col-md-6">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align customx">Khối
                                                    lượng:
                                                </label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                    <span id="trongluong"></span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="item form-group col-md-6">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align customx">Kích
                                                    thước:
                                                </label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                    <span id="kichthuoc"></span>
                                                </div>

                                            </div>
                                            <div>
                                                <div class="item form-group col-md-6">
                                                    <label
                                                        class="col-form-label col-md-3 col-sm-3 label-align customx">Số
                                                        trang:
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 custom_text">
                                                        <span id="sotrang"></span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="item form-group col-md-6">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align customx">Hình
                                                    ảnh:</label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                  
                                                    <img id="hinhanh"
                                                        src=""
                                                        class="image_popup" alt="thumnail"
                                                        >
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="item form-group col-md-6">
                                                <label for="middle-name"
                                                    class="col-form-label col-md-3 col-sm-3 label-align customx">Tác
                                                    giả:</label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                    <span id="tacgia"></span>
                                                </div>
                                            </div>
                                            <div class="item form-group col-md-6">
                                                <label for="middle-name"
                                                    class="col-form-label col-md-3 col-sm-3 label-align customx">Nhà
                                                    xuất
                                                    bản:</label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                    <span id="nhaxuatban"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="item form-group col-md-6">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align customx">Giảm
                                                    giá (%):</label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                    <span id="giamgia"></span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="item form-group col-md-6">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align customx">Mô
                                                    tả
                                                    ngắn:
                                                </label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                    <span id="motangan" class=" custom_text"></span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12 ">
                                            <div class="item form-group col-md-6">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align customx">Mô
                                                    tả
                                                    dài:
                                                   
                                                </label>
                                                <div class="col-md-6 col-sm-6 custom_text">
                                                <span id="motadai" class=" custom_text"></span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// display a modal (medium modal)
$(document).on('click', '#mediumButton', function(event) {
    event.preventDefault();

    let id = $(this).attr('data-id');
    $.ajax({
        url: "{{ route('productDetails') }}",
        data: {
            id: id
        },
        success: function(result) {
            console.log(result[0])
            $('#theloai').html(result[0]['sub_category_id']);
            $('#ten').html(result[0]['name']);
            $('#ma').html(result[0]['code']);
            $('#gia').html(result[0]['price']);
            $('#soluong').html(result[0]['quantity']);
            $('#trongluong').html(result[0]['weight']);
            $('#kichthuoc').html(result[0]['size']);
            $('#sotrang').html(result[0]['quantity_page']);
            $('#hinhanh').attr('src',result[0]['image']);
            $('#tacgia').html(result[0]['author_id']);
            $('#nhaxuatban').html(result[0]['publisher_id']);
            $('#giamgia').html(result[0]['sale']);
            $('#motangan').html(result[0]['short_description']);
            $('#motadai').html(result[0]['long_description']);
            $('#mediumModal').modal("show");
        },
        error: function(jqXHR, testStatus, error) {
            console.log(error);
        },
        timeout: 8000
    })
});
</script>
@endsection