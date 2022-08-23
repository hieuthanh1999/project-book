@extends('BE.layout_theme')
@section('content')
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block; width:100%;">
        <div class="tile_count">
            <div class="col-md-4 col-sm-4 tile_stats_count text_center ">
                <span class="count_top"><i class="fa fa-user"></i> Khách Hàng</span>
                <div class="count">{{$count_user}}</div>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count text_center ">
                <span class="count_top"><i class="fa fa-laptop"></i> Sản Phẩm</span>
                <div class="count">{{$count_product}}</div>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count text_center ">
                <span class="count_top"><i class="fa fa-money"></i> Đơn Hàng</span>
                <div class="count green">{{$count_order}}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">
                <div class="col-md-6 col-sm-6 bg-white">
                    <div class="x_title">
                        <h2>Sản phẩm được quan tâm nhiều nhất</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        @foreach($list_product_view as $item)
                        <div>
                            <p>{{$item->name}} <small class="text-danger">{{$item->view_count}} lượt xem</small></p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-sm-6  bg-white">
                    <div class="x_title">
                        <h2>Sản phẩm được mua nhiều nhất</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        @foreach($list_product_buy as $item)
                        <div>
                            <p>{{$item->name}} <small class="text-danger">{{$item->view_count}} lượt mua</small></p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>
<style type="text/css">
.text_center {
    text-align: center;
}
</style>
@endsection