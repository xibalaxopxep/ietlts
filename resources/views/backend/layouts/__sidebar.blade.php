<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="{!!Auth::user()->avatar!!}" width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{!!Auth::user()->full_name!!}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;Kalzen media
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link active">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                @if (\Auth::user()->role_id == \App\User::ROLE_ADMINISTRATOR)
                <li class="nav-item">
                    <a href="{{route('admin.config.index')}}" class="nav-link">
                        <i class="icon-cog"></i> 
                        <span>Cấu hình website</span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-user-tie"></i> <span>Người dùng hệ thống</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">

                        <li class="nav-item">
                            <a href="{{route('admin.user.index')}}" class="nav-link">
                                <span>Thành viên hệ thống</span>         
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.role.index')}}" class="nav-link">
                                <span>Quyền</span>         
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-video-camera"></i> <span>Menu</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('admin.menu.index')}}" class="nav-link">Menu</a></li>
                    </ul>
                </li>
                  <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-video-camera"></i> <span>Slide</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('admin.slide.index')}}" class="nav-link">Slide</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-newspaper2"></i> <span>Tin tức</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('admin.category.index', \App\Category::TYPE_NEWS)}}" class="nav-link">Danh mục</a></li>
                        <li class="nav-item"><a href="{{route('admin.news.index')}}" class="nav-link">Bài viết</a></li>
                    </ul>
                </li>
                
                @if (\Auth::user()->role_id == \App\User::ROLE_ADMINISTRATOR)
                 
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-video-camera"></i> <span>Video</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('admin.category.index', \App\Category::TYPE_VIDEO)}}" class="nav-link">Danh mục</a></li>
                        <li class="nav-item"><a href="{{route('admin.video.index')}}" class="nav-link">Video</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-camera"></i> <span>Hình ảnh</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('admin.category.index', \App\Category::TYPE_GALLERY)}}" class="nav-link">Danh mục</a></li>
                        <li class="nav-item"><a href="{{route('admin.gallery.index')}}" class="nav-link">Hình ảnh</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Bài test</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="bài test">
                        <li class="nav-item"><a href="{{route('admin.category.index', \App\Category::TYPE_TEST)}}" class="nav-link">Danh mục</a></li>
                        <li class="nav-item"><a href="{{route('admin.test.index')}}" class="nav-link">Bài test</a></li>
                        <li class="nav-item"><a href="{{route('admin.section.index')}}" class="nav-link">Section</a></li>
                        <li class="nav-item"><a href="{{route('admin.quizz.index')}}" class="nav-link">Câu hỏi</a></li>

                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Khoá học</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="bài test">
                        <li class="nav-item"><a href="{{route('admin.course.index')}}" class="nav-link">Danh sách khoá học</a></li>
                         <li class="nav-item"><a href="{{route('admin.schedule.index')}}" class="nav-link">Lịch học</a></li>

                    </ul>
                </li>

                    <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Liên hệ</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="bài test">
                        <li class="nav-item"><a href="{{route('admin.contact_address.index')}}" class="nav-link">Địa chỉ liên hệ</a></li>
                        <li class="nav-item"><a href="{{route('admin.contact.index')}}" class="nav-link">Danh sách liên hệ</a></li>
                    </ul>
                </li>

                  <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Đội ngũ giảng viên</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="bài test">
                        <li class="nav-item"><a href="{{route('admin.teacher.index')}}" class="nav-link">Danh sách giảng viên</a></li>

                    </ul>
                </li>
             
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-users"></i> <span>Khách hàng</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Khách hàng">
                        <li class="nav-item"><a href="{{route('admin.subscriber.index')}}" class="nav-link">Người đăng kí</a></li>
                        <li class="nav-item"><a href="{{route('admin.contact.index')}}" class="nav-link">Liên hệ</a></li>
                        <li class="nav-item"><a href="{{route('admin.member.index')}}" class="nav-link">Thành viên</a></li>
                        <!-- <li class="nav-item"><a href="{{route('admin.order.index')}}" class="nav-link">Đơn hàng</a></li> -->
                    </ul>
                </li>
                <!-- <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Tiếp thị liên kết</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('admin.marketing.index')}}" class="nav-link">Tài khoản</a></li>
                        <li class="nav-item"><a href="{{route('admin.rank.index')}}" class="nav-link">Danh mục cấp bậc</a></li>
                    </ul>
                </li> -->
                @endif


            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>