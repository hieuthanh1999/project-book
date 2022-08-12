  <!--sidebar start-->
  <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{URL::to('/admin')}}">
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
                                <span>Danh mục & thể loại</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('admin/category/create')}}">Thêm danh mục</a></li>
                                <li><a href="{{URL::to('admin/category/list')}}">Liệt kê danh mục</a></li>
                                <li><a href="{{URL::to('admin/sub-category/create')}}">Thêm thể loại</a></li>
                                <li><a href="{{URL::to('admin/sub-category/list')}}">Liệt kê thể loại</a></li>
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
                                <span>Tác giả & Nhà sản xuất</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ route('createAuthor') }}">Thêm tác giả</a></li>
                                <li><a href="{{URL::to('admin/author/list')}}">Liệt kê tác giả</a></li>
                                <li><a href="{{URL::to('admin/publisher/create')}}">Thêm nhà xuất bản</a></li>
                                <li><a href="{{URL::to('admin/publisher/list')}}">Liệt kê nhà xuất bản</a></li>
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
                                <span>Khuyến mãi & Phí Vận Chuyển</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('admin/discount/create')}}">Thêm khuyến mãi</a></li>
                                <li><a href="{{URL::to('admin/discount/list')}}">Liệt kê khuyến mãi</a></li>
                                <li><a href="{{URL::to('admin/shipping-fee/list')}}">Liệt kê phí vận chuyển</a></l>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Hóa Đơn</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('')}}">Thêm hóa đơn</a></li>
                                <li><a href="{{URL::to('admin/order/list')}}">Liệt kê hóa đơn</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Khách hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('admin/users/list')}}">Liệt kê khách hàng</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->