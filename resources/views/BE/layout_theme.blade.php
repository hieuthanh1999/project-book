<!DOCTYPE html>
<head>
    <title>ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{URL::asset('BE/css/bootstrap.min.css')}}" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{URL::asset('BE/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{URL::asset('BE/css/style-responsive.css')}}" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{URL::asset('BE/css/font.css')}}" type="text/css"/>
    <link href="{{URL::asset('BE/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('BE/css/morris.css')}}" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="{{URL::asset('BE/css/monthly.css')}}">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="{{URL::asset('BE/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{URL::asset('BE/js/raphael-min.js')}}"></script>
    <script src="{{URL::asset('BE/js/morris.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
</head>
<body>
<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="index.html" class="logo">
                ADMIN
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->

        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder=" Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{URL::asset('BE/images/thanh.jpg')}}">
                        <span class="username">
                            Admin
                        </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Thông tin</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> cài đặt</a></li>
                        <li><a href="{{URL::to('logout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="active" href="{{URL::to('')}}">
                            <i class="fa fa-dashboard"></i>
                            <span>Tổng Quan</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Ảnh bìa quảng cáo</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('admin/banner/create')}}">Thêm ảnh bìa</a></li>
                            <li><a href="{{URL::to('admin/banner/list')}}">Liệt kê ảnh bìa</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Danh mục</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('admin/category/create')}}">Thêm danh mục</a></li>
                            <li><a href="{{URL::to('admin/category/list')}}">Liệt kê danh mục</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Thể loại</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('admin/sub-category/create')}}">Thêm thể loại</a></li>
                            <li><a href="{{URL::to('admin/sub-category/list')}}">Liệt kê thể loại</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>nhà xuất bản</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('admin/publisher/create')}}">Thêm nhà xuất bản</a></li>
                            <li><a href="{{URL::to('admin/publisher/list')}}">Liệt kê nhà xuất bản</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Sách</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('admin/product/create')}}">Thêm sách</a></li>
                            <li><a href="{{URL::to('admin/product/list')}}">Liệt kê sách</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Tác giả</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('admin/author/create')}}">Thêm tác giả</a></li>
                            <li><a href="{{URL::to('admin/author/list')}}">Liệt tác giả</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Kích thước</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('admin/size/create')}}">Thêm kích thước</a></li>
                            <li><a href="{{URL::to('admin/size/list')}}">Liệt kích thước</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Khuyến mãi</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('admin/discount/create')}}">Thêm khuyến mãi</a></li>
                            <li><a href="{{URL::to('admin/discount/list')}}">Liệt khuyến mãi</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Hóa Đơn</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('')}}">Thêm hóa đơn</a></li>
                            <li><a href="{{URL::to('')}}">Liệt kê hóa đơn</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Phí Vận Chuyển</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('admin/shipping-fee/create')}}">Thêm</a></li>
                            <li><a href="{{URL::to('admin/shipping-fee/list')}}">Liệt kê phí</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Khách hàng</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('')}}">Thêm khách hàng</a></li>
                            <li><a href="{{URL::to('')}}">Liệt kê khách hàng</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content" >
        <section class="wrapper">
                @yield('content')
        </section>
        <!-- footer -->
        <div class="footer" style="
    width: 100%;
    bottom: 0;"
    >
            <div class="wthree-copyright">
                <p>© 2022</p>
            </div>
        </div>
        <!-- / footer -->
    </section>
    <!--main content end-->
</section>
<script src="{{URL::asset('BE/js/bootstrap.js')}}"></script>
<script src="{{URL::asset('BE/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{URL::asset('BE/js/scripts.js')}}"></script>
<script src="{{URL::asset('BE/js/jquery.slimscroll.js')}}"></script>
<script src="{{URL::asset('BE/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{URL::asset('BE/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->
<script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth:true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity:0.85,
            data: [
                {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

            ],
            lineColors:['#eb6f6f','#926383','#eb6f6f'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });


    });
</script>
<!-- calendar -->
<script type="text/javascript" src="{{URL::asset('BE/js/monthly.js')}}"></script>
<script type="text/javascript">
    $(window).load( function() {

        $('#mycalendar').monthly({
            mode: 'event',

        });

        $('#mycalendar2').monthly({
            mode: 'picker',
            target: '#mytarget',
            setWidth: '250px',
            startHidden: true,
            showTrigger: '#mytarget',
            stylePast: true,
            disablePast: true
        });

        switch(window.location.protocol) {
            case 'http:':
            case 'https:':
                // running on a server, should be good.
                break;
            case 'file:':
                alert('Just a heads-up, events will not work when run locally.');
        }

    });
</script>
<script>
ClassicEditor
.create( document.querySelector( '#body' ) )
.catch( error => {
console.error( error );
} );
</script>
<!-- //calendar -->
</body>
</html>
