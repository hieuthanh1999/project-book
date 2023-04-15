<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/images/favico.ico') }}" type="image/ico" />

    <title>Trang quản trị | </title>
    <base href="{{ asset('') }}">
    <!-- Bootstrap -->
    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">

    <link href="{{ asset('./assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('./assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('./assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('./assets/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>



    <!-- bootstrap-progressbar -->
    <link href="{{ asset('./assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('./assets/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('./assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="{{ asset('./assets/build/css/custom.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/" class="site_title">TRANG QUẢN TRỊ</a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <!-- <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin chào,</span>
                <h2>Nguyên Dương</h2>
              </div>
            </div> -->
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                        @if(Auth::check())
                        <h3>Xin Chào: {{Auth::user()->name}}</h3>
                        @endif
                           
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Trang chủ <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('admin.index') }}">Thống kê</a></li>
                                        <li><a href="{{ route('admin.doanhthu') }}">Thống kê doanh thu</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-image"></i> Quản lý banner <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('admin.banner.create') }}">Thêm banner mới</a></li>
                                        <li><a href="{{ route('admin.banner.list') }}">Liệt kê banner</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-navicon"></i>Danh mục & Thể loại<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('admin.category.create') }}">Thêm danh mục</a></li>
                                        <li><a href="{{ route('admin.category.list') }}">Liệt kê danh mục</a></li>
                                        <li><a href="{{ route('admin.subcategory.create') }}">Thêm thể loại</a></li>
                                        <li><a href="{{ route('admin.subcategory.list') }}">Liệt kê thể loại</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-user"></i> Tác giả và Nhà XB <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('admin.author.createView') }}">Thêm tác giả</a></li>
                                        <li><a href="{{ route('admin.author.list') }}">Liệt kê tác giả</a></li>
                                        <li><a href="{{ route('admin.publisher.createView') }}">Thêm NXB</a></li>
                                        <li><a href="{{ route('admin.publisher.list') }}">Liệt kê NXB</a></li>
                                    </ul>

                                </li>
                                <li><a><i class="fa fa-laptop"></i> Quản lý sản phẩm <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('admin.product.createView') }}">Thêm sản phẩm</a></li>
                                        <li><a href="{{ route('admin.product.list') }}">Liệt kê sản phẩm</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-money"></i> Đơn hàng <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!-- <li><a href="{{ route('admin.order.createView') }}">Tạo đơn hàng</a></li> -->
                                        <li><a href="{{ route('admin.order.list') }}">Xem đơn hàng</a></li>
                                        <li><a href="{{ route('admin.shipping.list') }}">Phí vận chuyển</a></li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-money"></i> Mã giảm giá <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('admin.coupons.create') }}">Thêm mã</a></li>
                                        <li><a href="{{ route('admin.coupons.list') }}">Liệt kê mã</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-user"></i> Quản lý khách hàng <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!-- <li><a href="{{ route('admin.user.createView') }}">Tạo khách hàng</a></li> -->
                                        <li><a href="{{ route('admin.user.list') }}">Xem khách hàng</a></li>
                                    </ul>
                                </li>
                                <!-- <li><a><i class="fa fa-bar-chart"></i> Thống kê <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="banner.html">Thống kê hoàng hóa</a></li>
                                        <li><a href="banner.html">Thống kê đơn hàng</a></li>
                                        <li><a href="banner.html">Thống kê khách hàng</a></li>
                                    </ul>
                                </li> -->
                                <li><a href="/"><i class="fa fa-backward"></i> Về trang chủ </a>

                                </li>


                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a> -->
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                              
                            </li>

                            <li role="presentation" class="nav-item dropdown open">
                                <!-- <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a> -->
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu"
                                    aria-labelledby="navbarDropdown1">
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->

            <!-- /top tiles -->

            @yield('content')
            <!-- /page content -->

            <!-- footer content -->
            <footer>

            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <script src="{{ asset('./assets/ckeditor4/ckeditor.js') }}"></script>
    <script>
    $(document).ready(function() {
        CKEDITOR.replace('description');
        // CKEDITOR.replace('ckeditor1');
        CKEDITOR.replace('ckeditor2');
        CKEDITOR.replace('short_description');
        CKEDITOR.replace('long_description');

        CKEDITOR.editorConfig = function(config) {
            config.language = 'es';
            config.uiColor = '#F7B42C';
            config.height = 300;
            config.toolbarCanCollapse = true;
        };
    });
    </script>


    <!-- jQuery -->
    <script src="{{ asset('./assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('./assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('./assets/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('./assets/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('./assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('./assets/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('./assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('./assets/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('./assets/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('./assets/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('./assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('./assets/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('./assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('./assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('./assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('./assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('./assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('./assets/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('./assets/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('./assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('./assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('./assets/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('./assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('./assets/build/js/custom.min.js') }}"></script>
    <script src="{{ asset('./assets/js/anhphu.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#country_id').change(function() {
            var $city = $('#state_id');
            if ($(this).val() == 0) {
                $('#city').css('display', 'none');
                $('#address').css('display', 'none');
            } else {
                $.ajax({
                    url: "{{ route('cities.index') }}",
                    data: {
                        country_id: $(this).val()
                    },
                    success: function(data) {
                        var obj = JSON.parse(data);
                        $("#state_id option").remove();
                        $.each(obj, function(id, value) {
                            $city.append('<option value="' + id + '">' + value +
                                '</option>');
                        });
                        $('#city').show(150);
                        $('#address').show(150);
                    }
                });
            }

        });

    });
    </script>
</body>

</html>