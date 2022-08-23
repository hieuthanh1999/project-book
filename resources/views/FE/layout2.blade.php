<!doctype html>
<html class="no-js" lang="zxx">
@include('FE.layouts.head')

<body class="tg-home tg-homevtwo">

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Header Start
		*************************************-->
        @include('FE.layouts.header')
        <!--************************************
				Header End
		*************************************-->

        <!--************************************
				Main Start
		*************************************-->
        <main id="tg-main" class="tg-main tg-haslayout">
            <!--************************************
					News Grid Start
			*************************************-->
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div id="tg-twocolumns" class="tg-twocolumns" style="float: unset">
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                                <div id="tg-content" class="tg-content">
                                    @yield('content')
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
                                <aside id="tg-sidebar" class="tg-sidebar">
                                    <!-- <div class="tg-widget tg-widgetsearch">
                                        <form class="tg-formtheme tg-formsearch">
                                            <div class="form-group">
                                                <button type="submit"><i class="icon-magnifier"></i></button>
                                                <input type="search" name="search" class="form-group"
                                                    placeholder="Search by title, author, key...">
                                            </div>
                                        </form>
                                    </div> -->
                                    <div class="tg-widget tg-catagories">
                                        <div class="tg-widgettitle">
                                            <h3>Thể loại</h3>
                                        </div>
                                        <div class="tg-widgetcontent">
                                            <ul>

                                                @foreach ($categorys as $category)
                                                <li>
                                                    <h4>{{$category['name']}}</h4>
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
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--************************************
					News Grid End
			*************************************-->
        </main>
        <!--************************************
				Main End
		*************************************-->
        <!--************************************
				Footer Start
		*************************************-->
        @include('FE.layouts.footer')
        <!--************************************
				Footer End
		*************************************-->
    </div>
    <!--************************************
			Wrapper End
	*************************************-->

</body>

</html>