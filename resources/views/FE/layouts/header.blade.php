<header id="tg-header" class="tg-header tg-headervtwo tg-haslayout">
    <div class="tg-topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="tg-addnav">
                        <li>
                            <a href="javascript:void(0);">
                                <i class="icon-envelope"></i>
                                <em>{{$admin->email}}</em>
                            </a>
                        </li>

                    </ul>
                    <div class="tg-userlogin tg-addnav" style="padding: 10px 10px;">
                        @guest
                        @if (Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}">
                                <i class="fa fa-sign-in"></i>
                                <em>{{ __('Đăng nhập') }}</em>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li> -->
                        @endif

                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">
                                <i class="fa fa-user-plus"></i>
                                <em>{{ __('Đăng ký') }}</em>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> -->
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="dropdown-item nut_dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="noidung_dropdown">
                                <a href="thong-tin-{{Auth::user()->id}}">Thông tin</a>
                                <a href="hoa-don-{{Auth::user()->id}}">Hóa Đơn</a>
                                <a href="yeu-thich-{{Auth::user()->id}}">Yêu Thích
                                    ({{ Auth::user()->wishlist->count() }})</a>
                                @if(Auth::user()->level==2)
                                <a href="admin">Trang quản trị</a>
                                @endif
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Đăng xuất') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                        @endguest
                        <!-- <li>
                            <a href="/sign-in">
                                <i class="fa fa-sign-in"></i>
                                <em>Sign in</em>
                            </a>
                        </li>
                        <li>
                            <a href="/sign-up">
                                <i class="fa fa-user-plus"></i>
                                <em>Register</em>
                            </a>
                        </li> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-middlecontainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo"><a href="/"><img src="{{URL::asset('FE/images/logo.png')}}"
                                alt="company name here"></a></strong>
                    <div class="tg-searchbox">

                        <div class="form-group tg-formtheme tg-formsearch" style="">
                            <input style="position: relative;    width: 102%;" type="text" name="country_name"
                                id="country_name" class="typeahead form-control"
                                placeholder="Tìm kiếm sản phẩm" />
                            <i style="position: absolute; right: 15px; top: 19px;"  class="icon-magnifier"></i>
                            <div id="countryList" style="position: relative;"><br>
                            </div>
                        </div>
                        <!-- <button style="font-size: 18px;" type="submit" class="tg-btn">Tìm kiếm</button> -->
                        {{ csrf_field() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-navigationarea">
        <div class="container">
            <div class="row" style="margin-bottom: -10px">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-navigationholder">
                        <nav id="tg-nav" class="tg-nav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#tg-navigation" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                                <ul>
                                <li class="menu-item-has-children">
                                        <a href="/">Trang chủ</a>
                                        <!-- <ul class="sub-menu">
												<li><a href="index-2.html">Home V one</a></li>
												<li><a href="indexv2.html">Home V two</a></li>
												<li><a href="indexv3.html">Home V three</a></li>
											</ul> -->
                                    </li>
                                    <li class="menu-item-has-children menu-item-has-mega-menu">
                                        <a href="javascript:void(0);">Danh mục</a>
                                        <div class="mega-menu">



                                            <ul class="tg-themetabnav" role="tablist">
                                                @foreach ($categorys as $category)
                                                <li role="presentation" class="">
                                                    <a href="#cate{{$category['id']}}"
                                                        aria-controls="cate{{$category['id']}}" role="tab"
                                                        data-toggle="tab">{{$category['name']}}</a>
                                                </li>

                                                @endforeach
                                            </ul>
                                            <div class="tab-content tg-themetabcontent">
                                                @foreach ($categorys as $category)
                                                <div role="tabpanel" class="tab-pane" id="cate{{$category['id']}}">
                                                    <ul>
                                                        <li>
                                                            <ul>
                                                                @foreach ($sub_categorys as $sub_category)
                                                                @if($sub_category['category_id'] == $category['id'])
                                                                <li><a
                                                                        href="/the-loai-{{$sub_category['id']}}">{{$sub_category['name']}}</a>
                                                                </li>
                                                                @endif
                                                                @endforeach
                                                            </ul>
                                                        </li>


                                                    </ul>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                   
                                    <li class="menu-item-has-children">
                                        <a href="danh-sach-tac-gia">Tác giả</a>

                                    </li>

                                    <!-- @foreach ($categorys as $category)
                                    <li class="menu-item-has-children">
                                        <a href="javascript:void(0);">{{$category['name']}}</a>
                                        <ul class="sub-menu">

                                            @foreach ($sub_categorys as $sub_category)
                                            @if($sub_category['category_id'] == $category['id'])
                                            <li><a
                                                    href="/the-loai-{{$sub_category['id']}}">{{$sub_category['name']}}</a>
                                            </li>
                                            @endif

                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach -->

                                </ul>
                            </div>
                        </nav>
                        <div class="tg-wishlistandcart">
                            @if(Auth::check())
                            <div class="dropdown tg-themedropdown tg-wishlistdropdown">

                                <a href="yeu-thich-{{Auth::user()->id}}" id="tg-wishlisst" class="tg-btnthemedropdown">
                                    <span class="tg-themebadge">{{ Auth::user()->wishlist->count() }}</span>
                                    <i class="icon-heart"></i>
                                </a>
                            </div>
                            @endif
                            <div class="dropdown tg-themedropdown tg-minicartdropdown">
                                <a href="{{ route('showCart') }}" class="tg-btnthemedropdown">
                                    <span class="tg-themebadge">{{ Cart::content()->count() }}</span>
                                    <i class="icon-cart"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
$(document).ready(function() {

    $('#country_name').keyup(function() { //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
        var query = $(this).val(); //lấy gía trị ng dùng gõ
        if (query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
        {
            var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
            $.ajax({
                url: "{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                method: "POST", // phương thức gửi dữ liệu.
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) { //dữ liệu nhận về
                    $('#countryList').fadeIn();
                    $('#countryList').html(
                        data
                    ); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                }
            });
        }
    });

    // $(document).on('click', 'li', function() {
    //     $('#country_name').val($(this).text());
    //     $('#countryList').fadeOut();
    // });

});
</script>