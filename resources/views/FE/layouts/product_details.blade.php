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
                        <input type="text" class="result" value="1" id="quantity1" name="quantity" min="1"
                            max="{{$product_details['quantity']}}">
                        <em class="plus">+</em>
                    </div>

                    @if (Auth::check())
                    @if ($product_details['quantity'] > 0)
                    <form action="{{ route('addCart') }}" method="post">
                        @csrf
                        <input type="hidden" id="qty_cart" name="quantity" value="1">
                        <input type="hidden" name="id" value="{{ $product_details['id'] }}">
                        <button type="submit" class="tg-btn tg-active tg-btn-lg">
                            <i class="fa fa-shopping-basket"></i>
                            Thêm vào giỏ
                        </button>
                    </form>
                    @else
                    <button class="tg-btn tg-active tg-btn-lg">Đã hết hàng</button>
                    @endif
                    @else
                    <a href="/login" class="tg-btn tg-active tg-btn-lg">
                        <i class="fa fa-shopping-basket"></i>
                        <em>Thêm vào giỏ</em>
                    </a>
                    @endif



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

                            {{$product_details['size']}}

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
                    <li role="presentation"><a href="#review" data-toggle="tab">Đánh gía</a></li>
                </ul>
                <div class="tg-tab-content tab-content">
                    <div role="tabpanel" class="tg-tab-pane tab-pane active" id="description">
                        <div class="tg-description">
                            {!!$product_details['long_description']!!}

                        </div>
                    </div>
                    <div role="tabpanel" class="tg-tab-pane tab-pane" id="review">
                        <div class="tg-description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="container-product">
                                        <form action="{{ route('reviewStore') }}" method="post">
                                            @csrf
                                            <div class="review-rating__inner">
                                                <div class="review-rating__summary">
                                                    <div>
                                                        <h3 class="mt-5">Đánh giá</h3>
                                                    </div>
                                                    <div
                                                        class="review-rating__point text-center justtify-content-center">
                                                        <span
                                                            class="point_span">{{ round($product_details->reviews->avg('rate'), 1, PHP_ROUND_HALF_UP) }}</span><br>
                                                        <div class="ratings">
                                                            <div class="empty-stars"></div>
                                                            <div class="full-stars"
                                                                style="width:{{ $product_details->reviews->avg('rate') * 20 }}%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="review-rating__total">
                                                        {{ $product_details->reviews->count() }} ĐÁNH GIÁ</div>
                                                </div>
                                                <!-- số đánh giá -->
                                                <div class="review-rating__detail">
                                                    <div class="review-rating__level mt-5">
                                                        @if(Auth::check())
                                                        <div class="stars" style="width: 100%">
                                                            <input value="5" class="star star-5" id="star-5"
                                                                type="radio" name="rate" />
                                                            <label class="star star-5" for="star-5"></label>
                                                            <input value="4" class="star star-4" id="star-4"
                                                                type="radio" name="rate" />
                                                            <label class="star star-4" for="star-4"></label>
                                                            <input value="3" class="star star-3" id="star-3"
                                                                type="radio" name="rate" />
                                                            <label class="star star-3" for="star-3"></label>
                                                            <input value="2" class="star star-2" id="star-2"
                                                                type="radio" name="rate" />
                                                            <label class="star star-2" for="star-2"></label>
                                                            <input value="1" class="star star-1" id="star-1"
                                                                type="radio" name="rate" />
                                                            <label class="star star-1" for="star-1"></label>
                                                        </div>
                                                        @else
                                                        <div class="star">
                                                            <h4><i class="text-secondary">Vui lòng đăng nhập để được
                                                                    đánh giá</i>
                                                            </h4>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- chi tiết số đánh giá -->
                                            </div>
                                            <!-- đây là phần số liệu đánh giá -->
                                            @foreach ($product_details->reviews as $rev)
                                            <div class="review-comment__avatar" style="margin: 20px 0">

                                                <div class="review-comment-content ml-4"
                                                    style="display: flex;     justify-content: space-between;">
                                                    <div class="col-lg-9">
                                                        <span style="font-weight: bold;">
                                                            <i class="fa fa-user"></i> {{ $rev->user->name }}:</span>
                                                        <span> {{ $rev->comment }}</span>

                                                    </div>
                                                    <span class="col-lg-4" style="font-size: 12px">
                                                        <div class="ratings">
                                                            <div class="empty-stars"></div>
                                                            <div class="full-stars"
                                                                style="width:{{ $rev->rate * 20 }}%">
                                                            </div>
                                                        </div> ({{ $rev->created_at}})
                                                    </span>
                                                </div>
                                            </div>
                                            @endforeach
                                            @if(Auth::check())
                                            <div class="form-cmt ">
                                                <input class="" id="xxx" type="text" name="comment"
                                                    placeholder="Nhập bình luận tại đây" required>
                                                <input id="last-name1" type="hidden" value="{{ $product_details->id }}"
                                                    name="product_id">
                                                <p class="err_cmt text-danger"></p>
                                                <button id="submit" type="submit">Gửi bình luận và đánh giá</button>
                                            </div>
                                            @else
                                            <div class="form-cmt text-center justify-content-center">
                                                <i class="text-center text-secondary justify-content-center">Đăng
                                                    nhập để bình luận</i>
                                            </div>
                                            @endif
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-3 qc-right">

                            </div>
                        </div>
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
                    <img src="{{URL::asset('image/author/'.$authors['author_image'])}}" alt="image description" style="object-fit: contain;    width: 130px;
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
                                <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a>
                                </li>
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
    {{-- @if($list_product->count() >0)
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
                            @if (Auth::check())
                            @if ($value['quantity'] > 0)
                            <form action="{{ route('addCart') }}" method="post">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="id" value="{{ $value['id'] }}">
                                <button type="submit" class="tg-btn tg-btnstyletwo">
                                    <i class="fa fa-shopping-basket"></i>
                                    <em>Thêm vào giỏ</em>
                                </button>
                            </form>
                            @else
                            <button class="tg-btn tg-btnstyletwo">Đã hết hàng</button>
                            @endif
                            @else

                            <a href="/login" class="tg-btn tg-btnstyletwo">
                                <i class="fa fa-shopping-basket"></i>
                                <em>Thêm vào giỏ</em>
                            </a>
                            @endif

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif --}}
    <div class="tg-relatedproducts">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="tg-sectionhead">
                <h2>Sản phẩm tương tự theo tỉ lệ %</h2>
                <!-- <a class="tg-btn" href="javascript:void(0);">View All</a> -->
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="tg-relatedproductslider" class="tg-relatedproductslider tg-relatedbooks owl-carousel">

                @foreach ($products as $value)
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
                                <h5 class="card-title">Tỉ lệ: {{ round($value['similarity'] * 100, 1) }}%</h5>
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
                            @if (Auth::check())
                            @if ($value['quantity'] > 0)
                            <form action="{{ route('addCart') }}" method="post">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="id" value="{{ $value['id'] }}">
                                <button type="submit" class="tg-btn tg-btnstyletwo">
                                    <i class="fa fa-shopping-basket"></i>
                                    <em>Thêm vào giỏ</em>
                                </button>
                            </form>
                            @else
                            <button class="tg-btn tg-btnstyletwo">Đã hết hàng</button>
                            @endif
                            @else

                            <a href="/login" class="tg-btn tg-btnstyletwo">
                                <i class="fa fa-shopping-basket"></i>
                                <em>Thêm vào giỏ</em>
                            </a>
                            @endif

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

@endsection