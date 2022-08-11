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
                    <div class="tg-userlogin tg-addnav">
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
                            <a id="navbarDropdown" class="dropdown-item" href="thong-tin-{{Auth::user()->id}}"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                v-pre>
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
                        <form class="tg-formtheme tg-formsearch">
                            <fieldset>
                                <input type="text" name="search" class="typeahead form-control"
                                    placeholder="Search by title, author, keyword, ISBN...">
                                <button type="submit" class="tg-btn">Tìm kiếm</button>
                            </fieldset>
                        </form>
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
                                    <li class="menu-item-has-children">
                                        <a href="danh-sach-tac-gia">Tác giả</a>

                                    </li>

                                    @foreach ($categorys as $category)
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
                                    @endforeach

                                </ul>
                            </div>
                        </nav>
                        <div class="tg-wishlistandcart">
                            <!-- <div class="dropdown tg-themedropdown tg-wishlistdropdown">
                                @if(Auth::check())
                                <a href="{{ route('showWish') }}" id="tg-wishlisst" class="tg-btnthemedropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="tg-themebadge">{{ Auth::user()->wishlist->count() }}</span>
                                    <i class="icon-heart"></i>
                                </a>
                                @endif

                               

                            </div> -->
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