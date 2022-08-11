@extends('FE.layout2')
@section('content')
<div class="tg-products">
    <div class="tg-sectionhead">
        <h2>{{$sub_category_details['name']}}</h2>
    </div>

    <div class="tg-productgrid">
        <div class="tg-productgrid">
            <!-- <div class="tg-refinesearch">
                <span>showing 1 to 8 of 20 total</span>
                <form class="tg-formtheme tg-formsortshoitems">
                    <fieldset>
                        <div class="form-group">
                            <label>sort by:</label>
                            <span class="tg-select">
                                <select>
                                    <option>name</option>
                                    <option>name</option>
                                    <option>name</option>
                                </select>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>show:</label>
                            <span class="tg-select">
                                <select>
                                    <option>8</option>
                                    <option>16</option>
                                    <option>20</option>
                                </select>
                            </span>
                        </div>
                    </fieldset>
                </form>
            </div> -->
            @foreach ($products as $value)
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                <div class="tg-postbook">
                    <figure class="tg-featureimg">
                        <div class="tg-bookimg">
                            <div class="tg-frontcover"><img src="{{URL::asset('image/product/'.$value['image'])}}"
                                    alt="image description">
                            </div>
                            <div class="tg-backcover"><img src="{{URL::asset('image/product/'.$value['image'])}}"
                                    alt="image description">
                            </div>
                        </div>
                        @guest

                        @else
                        <form action="{{ route('addWish') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $value['id'] }}">
                            <button class="tg-btnaddtowishlist" type="submit">
                                <i class="icon-heart"></i>
                                <span>Yêu thích</span>
                            </button>
                        </form>
                        @endguest
                    </figure>
                    <div class="tg-postbookcontent">
                        <ul class="tg-bookscategories">
                            <li><a href="javascript:void(0);">{{$sub_category_details['name']}}</a></li>
                        </ul>
                        <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                        <div class="tg-booktitle">
                            <h3><a href="/chi-tiet-sach-{{$value['id']}}">{{$value['name']}}</a></h3>
                        </div>
                        <span class="tg-bookwriter">Tác giả: <a href="javascript:void(0);">
                                @foreach($authors as $author)
                                @if($value['author_id'] == $author['id'])
                                {{$author['name']}}
                                @endif
                                @endforeach
                            </a></span>
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
@endsection