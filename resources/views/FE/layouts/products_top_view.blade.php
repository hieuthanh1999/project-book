<!--************************************
					Picked By Author Start
			*************************************-->
@if($product_top_view)

<section class="tg-sectionspace tg-haslayout">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead">
                    <h2><span>Những cuốn sách có</span>Lượt xem cao nhất</h2>
                    <!-- <a class="tg-btn" href="javascript:void(0);">View All</a> -->
                </div>
            </div>
            <div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
                @foreach($product_top_view as $value)
                <div class="item">
                    <div class="tg-postbook">
                        <figure class="tg-featureimg">
                            <div class="tg-bookimg">
                                <div class="tg-frontcover"><img src="{{URL::asset('image/product/'.$value['image'])}}"
                                        alt="image description"></div>
                            </div>
                            <div class="tg-hovercontent">
                                <div class="tg-description">
                                    <p>
                                    {!!$value->short_description!!}
                                    </p>
                                </div>
                                <strong class="tg-bookpage">Số trang: {{$value->quantity_page}}</strong>
                                <strong class="tg-bookcategory">Thể loại: {{$value->subCategory->name}}</strong>
                                <strong class="tg-bookprice">Giá: {{number_format($value['price']).' '.'VND'}}</strong>
                                <div class="tg-ratingbox">
                                    <div class="ratings">
                                        <div class="empty-stars"></div>
                                        <div class="full-stars" style="width:{{ $value->reviews->avg('rate') * 20 }}%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </figure>
                        <div class="tg-postbookcontent">
                            <div class="tg-booktitle">
                                <h3><a href="/chi-tiet-sach-{{$value['id']}}">{{$value->name}}</a></h3>
                            </div>
                            <span class="tg-bookwriter">Tác giả:
                                <a href="/tac-gia-{{$value->author->id}}">{{$value->author->name}}</a>
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

                            <button onclick="alert('Bạn phải đăng nhập')" class="tg-btn tg-btnstyletwo">
                                <i class="fa fa-shopping-basket"></i>
                                <em>Thêm vào giỏ</em>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

@endif
<!--************************************
					Picked By Author End
			*************************************-->