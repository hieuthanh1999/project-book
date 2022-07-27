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
                                <form action="{{ route('addWish') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $value['id'] }}">
                                <button class="tg-btnaddtowishlist" type="submit" >
                                    <i class="icon-heart"></i>
                                    <span>Yêu thích</span>
                                </button>
                            </form>
                               
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
                                <form action="{{ route('addCart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="id" value="{{ $value['id'] }}">
                                    <button type="submit" class="tg-btn tg-btnstyletwo" >
                                    <i class="fa fa-shopping-basket"></i>
                                    <em>Thêm vào giỏ</em>
                                    </button>
                                </form>
                                <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                   
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>