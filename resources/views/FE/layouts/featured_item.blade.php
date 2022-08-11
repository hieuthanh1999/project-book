			<!--************************************
					Featured Item Start
			*************************************-->
			@if($product_sale)
			<section class="tg-bglight tg-haslayout" style="margin: 80px 0 30px;">
			    <div class="container">
			        <div class="row">
			            <div class="tg-featureditm">
			                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
			                    <figure><img src="{{URL::asset('image/product/'.$product_sale->image)}}" alt="image description">
			                    </figure>
			                </div>
			                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			                    <div class="tg-featureditmcontent">
			                        <div class="tg-themetagbox"><span class="tg-themetag">Giảm tới
			                                {{$product_sale->sale}}%</span></div>
			                        <div class="tg-booktitle">
			                            <h3><a href="/chi-tiet-sach-{{$product_sale['id']}}">{{$product_sale->name}}</a></h3>
			                        </div>
			                        <span class="tg-bookwriter">Tác giả:
			                            <a href="/tac-gia-{{$product_sale->author->id}}">{{$product_sale->author->name}}</a>
			                        </span>
			                        <div class="ratings">
			                            <div class="empty-stars"></div>
			                            <div class="full-stars" style="width:{{ $product_sale->reviews->avg('rate') * 20 }}%">
			                            </div>
			                        </div>
			                        <div class="tg-priceandbtn">
			                            <span class="tg-bookprice">
			                                @php
			                                $sale = (100-$product_sale->sale)/100;
			                                @endphp
			                                <ins>{{number_format($product_sale->price * $sale).' '.'VND'}} </ins>

			                                <del>{{number_format($product_sale->price).' '.'VND'}}</del>
			                            </span>
			                            @if (Auth::check())
			                            @if ($product_sale['quantity'] > 0)
			                            <form action="{{ route('addCart') }}" method="post">
			                                @csrf
			                                <input type="hidden" name="quantity" value="1">
			                                <input type="hidden" name="id" value="{{ $product_sale['id'] }}">
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
			            </div>
			        </div>
			    </div>
			</section>
			@endif
			<!--************************************
					Featured Item End
			*************************************-->