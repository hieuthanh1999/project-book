@extends('FE.layout2')
@section('content')
<div class="tg-productdetail">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="tg-postbook">
                <figure class="tg-featureimg"><img src="{{URL::asset('image/product/'.$product_details['image'])}}"
                        alt="image description"></figure>
                <div class="tg-postbookcontent">
                    <span class="tg-bookprice">
                        <ins>{{number_format($product_details['price']).' '.'VND'}}</ins>
                        <!-- <del>$27.20</del> -->
                    </span>
                    <!-- <span class="tg-bookwriter">You save $4.02</span> -->
                    <ul class="tg-delevrystock">
                        <!-- <li><i class="icon-rocket"></i><span>Free delivery worldwide</span></li>
                        <li><i class="icon-checkmark-circle"></i><span>Dispatch from the USA in 2 working days </span>
                        </li> -->
                        <li><i class="icon-store"></i><span>Tình trạng:
                                @if($product_details['quantity'] > 0)
                                <em>Còn ({{$product_details['quantity']}})</em></span></li>
                        @else
                        <em>Hết hàng</em></span></li>
                        @endif
                    </ul>
                    <div class="tg-quantityholder">
                        <em class="minus">-</em>
                        <input type="text" class="result" value="1" id="quantity1" name="quantity" min="1">
                        <em class="plus">+</em>
                    </div>
                    @if($product_details['quantity'] > 0)
                    <a class="tg-btn tg-active tg-btn-lg" href="javascript:void(0);">Thêm vào giỏ</a>
                    @endif

                    <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                        <span>Yêu thích</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="    margin-bottom: 100px;">
            <div class="tg-productcontent">

                <ul class="tg-bookscategories">
                    @foreach($sub_categorys as $sub_category)
                    @if($product_details['sub_category_id'] == $sub_category['id'])

                    <li><a href="/the-loai-{{$sub_category['id']}}"> {{$sub_category['name']}}</a></li>
                    @endif
                    @endforeach

                </ul>
                <span class="tg-bookwriter">Mã: {{$product_details['code']}}</span>
                <!-- <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div> -->
                <div class="tg-booktitle">
                    <h3> {{$product_details['name']}}</h3>
                </div>
                <span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">

                        {{$authors['name']}}

                    </a></span>
                <!-- <span class="tg-stars"><span></span></span> -->
                <!-- <span class="tg-addreviews"><a href="javascript:void(0);">Add Your Review</a></span> -->
                <div class="tg-share">
                    <span>Chia sẻ:</span>
                    <ul class="tg-socialicons">
                        <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                        <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                        <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                        <li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
                <div class="tg-description">
                    <p>{{$sub_category['short_description']}}</p>
                </div>
                <div class="tg-sectionhead">
                    <h2>Giới thiệu sách:</h2>
                </div>
                <ul class="tg-productinfo">
                    <li><span>Nhà xuất bản:</span><span>

                            {{$publishers['name']}}

                        </span></li>
                    <li><span>Kích cỡ:</span><span>

                            {{$sizes['name']}}

                        </span></li>
                    <li><span>Số trang:</span><span> {{$product_details['quantity_page']}}</span></li>
                    <li><span>Trọng lượng:</span><span> {{$product_details['weight']}}</span>
                    </li>
                </ul>

            </div>
        </div>
        <div class="tg-productdescription">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead">
                    <h2>Nội Dung</h2>
                </div>
                <ul class="tg-themetabs" role="tablist">
                    <li role="presentation" class="active"><a href="#description" data-toggle="tab">Nội Dung</a></li>
                    <li role="presentation"><a href="#review" data-toggle="tab">Reviews</a></li>
                </ul>
                <div class="tg-tab-content tab-content">
                    <div role="tabpanel" class="tg-tab-pane tab-pane active" id="description">
                        <div class="tg-description">
                            {{$product_details['long_description']}}
                        </div>
                    </div>
                    <div role="tabpanel" class="tg-tab-pane tab-pane" id="review">
                        <div class="tg-description">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tg-aboutauthor">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead">
                    <h2>Tác giả</h2>
                </div>
                <div class="tg-authorbox">
                    <figure class="tg-authorimg">
                        <img src="{{URL::asset('image/author/'.$authors['author_image'])}}" alt="image description"
                            style="object-fit: contain;    width: 130px;
    height: 130px;">
                    </figure>
                    <div class="tg-authorinfo">
                        <div class="tg-authorhead">
                            <div class="tg-leftarea">
                                <div class="tg-authorname">
                                    <h2>{{$authors['name']}}</h2>
                                    <!-- <span>Author Since: June 27, 2017</span> -->
                                </div>
                            </div>
                            <div class="tg-rightarea">
                                <ul class="tg-socialicons">
                                    <li class="tg-facebook"><a href="javascript:void(0);"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li class="tg-twitter"><a href="javascript:void(0);"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li class="tg-linkedin"><a href="javascript:void(0);"><i
                                                class="fa fa-linkedin"></i></a></li>
                                    <li class="tg-googleplus"><a href="javascript:void(0);"><i
                                                class="fa fa-google-plus"></i></a></li>
                                    <li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tg-description">
                            <p>{{$authors['description']}}</p>
                        </div>
                        <a class="tg-btn tg-active" href="/tac-gia-{{$authors['id']}}">Tất cả sách</a>
                    </div>
                </div>
            </div>
        </div>
        @if($list_product)
        <div class="tg-relatedproducts">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead">
                    <h2>SÁCH CÙNG TÁC GIẢ</h2>
                    <!-- <a class="tg-btn" href="javascript:void(0);">View All</a> -->
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="tg-relatedproductslider" class="tg-relatedproductslider tg-relatedbooks owl-carousel">

                    @foreach ($list_product as $value)
                    <div class="item">
                        <div class="tg-postbook">
                            <figure class="tg-featureimg">
                                <div class="tg-bookimg">
                                    <div class="tg-frontcover"><img src="{{URL::asset('image/product/'.$value['image'])}}"
                                            alt="image description"></div>
                                    <div class="tg-backcover"><img src="{{URL::asset('image/product/'.$value['image'])}}"
                                            alt="image description"></div>
                                </div>
                                <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                    <i class="icon-heart"></i>
                                    <span>Yêu thích</span>
                                </a>
                            </figure>
                            <div class="tg-postbookcontent">
                                <ul class="tg-bookscategories">
        
                                    @foreach($sub_categorys as $category)
                                    @if($value['sub_category_id'] == $category['id'])
                                    <li><a href="/the-loai-{{$category['id']}}">{{$category['name']}}</a></li>
                                    @endif
                                    @endforeach
                                </ul>
                                <!-- <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div> -->
                                <div class="tg-booktitle">
                                    <h3><a href="/chi-tiet-sach-{{$value['id']}}">{{$value['name']}}</a></h3>
                                </div>
                                <span class="tg-bookwriter">Tác giả:

                                    @foreach($authors_all as $author)
                                        @if($value['author_id'] == $author['id'])
                                        <a href="/tac-gia-{{$author['id']}}">{{$author['name']}}</a>
                                        @endif
                                    @endforeach
                                    
                                    </span>
                                <!-- <span class="tg-stars"><span></span></span> -->
                                <span class="tg-bookprice">
                                <ins>{{number_format($value['price']).' '.'VND'}}</ins>
                                    <!-- <del>$27.20</del> -->
                                </span>
                                <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                    <i class="fa fa-shopping-basket"></i>
                                    <em>Thêm vào giỏ</em>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection