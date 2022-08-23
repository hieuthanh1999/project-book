@extends('BE.layout_theme')
@section('content')
<!-- page start-->
<!-- page start-->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <!-- <div class="title_left">
                <h3>Thêm banner</h3>
            </div> -->


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm Khách Hàng</h2>
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
                        <form role="form" action="{{ route('admin.product.create') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Khách
                                    Hàng</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control p-3 itemName ">

                                    </select>
                                </div>
                            </div>

                            <div id="info_json" style="display: none">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên
                                        khách hàng
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input disabled type="text" id='name' name="name" class="form-control"
                                            id="exampleInputEmail1" value="">
                                        <!-- <input type="text" id="first-name" name="name" class="form-control "> -->

                                    </div>

                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email
                                        khách hàng
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input disabled type="text" id='email' name="email" class="form-control"
                                            id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Số điện
                                        thoại
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input disabled type="text" id='phone' name="phone" class="form-control"
                                            id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Địa Chỉ
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input disabled id='address' type="text" name="address" class="form-control"
                                            id="exampleInputEmail1">

                                    </div>

                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Sản
                                    Phẩm</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control p-3 product ">

                                    </select>
                                </div>
                            </div>
                            <div id="product_list" style="display: none">
                                <div class="item form-group">
                                    <div class=" card-box table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Mã</th>
                                                    <th>Tên</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Giá</th>
                                                    <th>Số lượng</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                </div>



                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" class="btn btn-success">Tạo Mới</button>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('.itemName').select2({
        placeholder: 'Select an item',
        ajax: {
            url: '/select2-autocomplete-ajax',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name + ' -- ' + item.email,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }

    });
    $('.itemName').change(function() {
        $.ajax({
            url: "/get-info",
            data: {
                id_user: $(this).val()
            },
            success: function(result) {
                $('#info_json').css('display', 'block');
                $('#name').val(result[0]['name']);
                $('#email').val(result[0]['email']);
                $('#phone').val(result[0]['phone']);
                $('#address').val(result[0]['address'] + "," + result[0]['district_id'] +
                    "," + result[0]['province_id']);

            }
        });
    });
    $('.product').select2({
        placeholder: 'Select an item',
        ajax: {
            url: '/search-product',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }

    });
    $('.product').change(function() {
        $.ajax({
            url: "/get-product",
            data: {
                id_product: $(this).val()
            },
            success: function(result) {
                result = result[0];
                $('#product_list').css('display', 'block');
                let html = "<tr><td>"+result['code'] +"</td><td>"+result['name'] +"</td><td><img id='hinhanh' src="+result['image'] +" class='image_popup' ></td><td>"+result['price'] +"</td><td>"+result['quantity'] +"</td>";
                $('#list').append(html);
            }
        });
    });

});
</script>
@endsection