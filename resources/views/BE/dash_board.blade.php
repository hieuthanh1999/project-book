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
        <div class="col-md-4 col-sm-4">
            <div class="x_panel tile fixed_height_520">
                <div class="x_title">
                    <h2>Được quan tâm</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h4>Sản phẩm được quan tâm nhiều nhất</h4>
                    @foreach($list_product_view as $item)
                    <div>
                        <p>{{$item->name}} <small class="text-danger">({{$item->view_count}} lượt xem)</small></p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_520">
                <div class="x_title">
                    <h2>Thống kê thể loại</h2>
                    <div class="clearfix"></div>
                </div>
                {!! $cateChart->container() !!}
                {!! $cateChart->script() !!}
            </div>
        </div>


        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_520">
                <div class="x_title">
                    <h2>Thống kê đơn hàng</h2>
                    <div class="clearfix"></div>
                    {!! $orderSttChart->container() !!}
                    {!! $orderSttChart->script() !!}
                </div>

            </div>
        </div>

    </div>
</div>
<style type="text/css">
.text_center {
    text-align: center;
}
</style>
<script type="text/javascript">
$(function() {
    $('#datetimepicker').datetimepicker();
});
</script>
@endsection