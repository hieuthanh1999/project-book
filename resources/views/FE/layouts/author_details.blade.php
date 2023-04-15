@extends('FE.layout_theme')
@section('content')
<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-authordetail">
                    <figure class="tg-authorimg">
                        <img src="{{URL::asset('image/author/'.$author_details['author_image'])}}" style="    object-fit: contain;
    width: 300px;
    height: 200px;" alt="image description">
                    </figure>
                    <div class="tg-authorcontentdetail">
                        <div class="tg-sectionhead">
                            <h2><span>{{$count_book}} tác phẩm</span>{{$author_details['name']}}</h2>
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
                        <div class="tg-description">
                            <p>{{$author_details['description']}}</p>
                        </div>
                        <div class="tg-booksfromauthor">
                            <div class="tg-sectionhead">
                                <h2>Tác phẩm</h2>
                            </div>
                            <div class="row">
                                @foreach ($list_product as $value)
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                    <div class="tg-postbook">
                                        <figure class="tg-featureimg">
                                            <div class="tg-bookimg">
                                                <div class="tg-frontcover"><img
                                                        src="{{URL::asset('image/product/'.$value['image'])}}"
                                                        alt="image description"></div>
                                                <div class="tg-backcover"><img
                                                        src="{{URL::asset('image/product/'.$value['image'])}}"
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
                                                <li><a href="/the-loai-{{$category['id']}}">{{$category['name']}}</a>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                            <!-- <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div> -->
                                            <div class="tg-booktitle">
                                                <h3><a href="/chi-tiet-sach-{{$value['id']}}">{{$value['name']}}</a>
                                                </h3>
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

                                            <a href="/sign-in" class="tg-btn tg-btnstyletwo">
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
        </div>
    </div>
</div>
@endsection