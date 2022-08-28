<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead">
                    <h2><span>New</span>Sách mới</h2>
                    <!-- <a class="tg-btn" href="javascript:void(0);">View All</a> -->
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
                    @foreach ($list_product_new as $value)
                    <div class="item">
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


                            </figure>
                            <div class="tg-postbookcontent">
                                <ul class="tg-bookscategories" style=" display: flex;
    justify-content: space-between; align-items: center;">
                                    @foreach($sub_categorys as $category)
                                    @if($value['sub_category_id'] == $category['id'])
                                    <li><a href="/the-loai-{{$category['id']}}">{{$category['name']}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                    <li>
                                        @guest

                                        @else
                                        @if($value->checkWishList($value['id'], Auth::user()->id))
                                        <span style="display:none"> {{$id_wish = $value->getIdWishList($value['id'], Auth::user()->id)}}</span>
                                       
                                        <a href="{{route('deleteWish', $id_wish)}}" onclick="event.preventDefault();
                                                     document.getElementById('remove_wishlist').submit();"
                                            style="cursor: pointer;"><i style="font-size: 18px; color: red" class="fa fa-heart" aria-hidden="true"></i></a>
                                        <form id="remove_wishlist" action="{{route('deleteWish', $id_wish)}}"
                                            method="post">
                                            @csrf


                                        </form>
                                        @else

                                        <a href="{{ route('addWish') }}" style="cursor: pointer;"
                                            onclick="event.preventDefault();document.getElementById('add_wishlist').submit();">
                                            <i style="font-size: 18px; "
                                                class="icon-heart"></i>
                                        </a>
                                        <form action="{{ route('addWish') }}" method="post" id="add_wishlist"
                                            class="d-none">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $value['id'] }}">

                                            </button>
                                        </form>
                                        @endif

                                        @endguest

                                    </li>
                                </ul>

                                <div class="tg-themetagbox">
                                    @if($value->sale)<span class="tg-themetag">Giảm tới
                                        {{$value->sale}}%</span>
                                    @endif</div>

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
                                <!-- <div class="tg-ratingbox">
                                    <div class="ratings">
                                        <div class="empty-stars"></div>
                                        <div class="full-stars" style="width:{{ $value->reviews->avg('rate') * 20 }}%">
                                        </div>
                                    </div>
                                </div> -->
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