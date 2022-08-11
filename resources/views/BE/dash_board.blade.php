@extends('BE.layout_theme')
@section('content')
<section class="wrapper" style="margin-top: 30px;">
    <!-- //market-->
    <div class="market-updates">
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-2">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-book" style="font-size: 3em;
                        color: #fff;
                        text-align: left;">
                    </i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Sản phẩm</h4>
                    <h3>{{$count_product}}</h3>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-1">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-users"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Khách hàng</h4>
                    <h3>{{$count_user}}</h3>

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-3">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Sales</h4>
                    <h3>1,500</h3>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-4">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Đơn hàng</h4>
                    <h3>{{$count_order}}</h3>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!-- //market-->
   
    <div class="col-md-4 stats-info widget">
        <div class="stats-info-agileits">
            <div class="stats-title">
                <h4 class="title">Sản phảm xem nhiều</h4>
            </div>
            <div class="stats-body">
                <ul class="list-unstyled">
                    @foreach($list_product_view as $item)
                    <li>{{$item->name}}<span class="pull-right">{{$item->view_count}} lượt xem</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4 stats-info widget">
        <div class="stats-info-agileits">
            <div class="stats-title">
                <h4 class="title">Sản phảm</h4>
            </div>
            <div class="stats-body">
                <ul class="list-unstyled">
                    @foreach($list_product_buy as $item)
                    <li>{{$item->product->name}}<span class="pull-right">{{$item->getProductCount($item->product_id)}} lượt mua</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4 stats-info widget">
        <div class="stats-info-agileits">
            <div class="stats-title">
                <h4 class="title">Sản phảm</h4>
            </div>
            <div class="stats-body">
                <ul class="list-unstyled">
                    @foreach($list_product_buy as $item)
                    <li>{{$item->product->name}}<span class="pull-right">{{$item->getProductCount($item->product_id)}} lượt mua</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
    </div>
</section>

@endsection