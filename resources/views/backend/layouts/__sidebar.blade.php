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
                    <a href="{{route('admin.index')}}" class="nav-link {{ ((Route::currentRouteName() == 'admin.index')  ) ? 'active' : '' }}">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                @if (\Auth::user()->role_id == \App\User::ROLE_ADMINISTRATOR)
                <li class="nav-item">
                    <a href="{{route('admin.config.index')}}" class="nav-link {{ ((Route::currentRouteName() == 'admin.config.index')  ) ? 'active' : '' }}">
                        <i class="icon-cog"></i> 
                        <span>Cấu hình website</span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ ((Route::currentRouteName() == 'admin.user.index') || (Route::currentRouteName() == 'admin.role.index') ) ? 'active' : '' }}"><i class="icon-user-tie"></i> <span>Người dùng hệ thống</span></a>
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
                        <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.menu.index') || (Route::currentRouteName() == 'admin.block.index') || (Route::currentRouteName() == 'admin.slide.index')  || (Route::currentRouteName() == 'admin.template_setting.index') ||  (Route::currentRouteName() == 'admin.banner.index')) ? 'active' : '' }}"><i class="icon-check"></i> <span>Giao diện</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Giao diện">
                            <li class="nav-item"><a href="{{route('admin.menu.index')}}" class="nav-link">Menu</a></li>
                            <li class="nav-item"><a href="{{route('admin.about.index')}}" class="nav-link">Giới thiệu</a></li>
                           <!--  <li class="nav-item"><a href="{{route('admin.slide.index')}}" class="nav-link">Slide</a></li> -->
                            <li class="nav-item"><a href="{{route('admin.template_setting.index')}}" class="nav-link">Tại sao nên chọn pasal</a></li>
                            <li class="nav-item"><a href="{{route('admin.banner.index')}}" class="nav-link">Banner</a></li>
                            <li class="nav-item"><a href="{{route('admin.block.index')}}" class="nav-link">Khối</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ ( (Route::currentRouteName() == 'admin.news.index') ) ? 'active' : '' }}"><i class="icon-newspaper2"></i> <span>Tin tức</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('admin.category.index', \App\Category::TYPE_NEWS)}}" class="nav-link">Danh mục</a></li>
                        <li class="nav-item"><a href="{{route('admin.news.index')}}" class="nav-link">Bài viết</a></li>
                    </ul>
                </li>
                
                 
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ ((Route::currentRouteName() == 'admin.video.index') ) ? 'active' : '' }}"><i class="icon-video-camera"></i> <span>Phương pháp học</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('admin.method.edit',1)}}" class="nav-link">Block</a></li>
                         <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link {{ ((Route::currentRouteName() == 'admin.video.index') ) ? 'active' : '' }}"><i class="icon-video-camera"></i> <span>Video</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                <li class="nav-item"><a href="{{route('admin.category.index', \App\Category::TYPE_VIDEO)}}" class="nav-link">Danh mục</a></li>
                                <li class="nav-item"><a href="{{route('admin.video.index')}}" class="nav-link">Video</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ ((Route::currentRouteName() == 'admin.gallery.index') ) ? 'active' : '' }}"><i class="icon-camera"></i> <span>Hình ảnh</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('admin.category.index', \App\Category::TYPE_GALLERY)}}" class="nav-link">Danh mục</a></li>
                        <li class="nav-item"><a href="{{route('admin.gallery.index')}}" class="nav-link">Hình ảnh</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.test.index') || (Route::currentRouteName() == 'admin.section.index')  || (Route::currentRouteName() == 'admin.quizz.index') ) ? 'active' : '' }}"><i class="icon-check"></i> <span>Bài test</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="bài test">
                        <!-- <li class="nav-item"><a href="{{route('admin.category.index', \App\Category::TYPE_TEST)}}" class="nav-link">Danh mục</a></li>
                        <li class="nav-item"><a href="{{route('admin.test.index')}}" class="nav-link">Bài t</a></li> -->
                        <li class="nav-item"><a href="{{route('admin.section.index')}}" class="nav-link">Test</a></li>
                        <li class="nav-item"><a href="{{route('admin.quizz.index')}}" class="nav-link">Bài tập và câu hỏi</a></li>
                        <li class="nav-item"><a href="{{route('admin.rule.index')}}" class="nav-link">Rule</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.course.index')) ? 'active' : '' }}"><i class="icon-check"></i> <span>Khoá học</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="bài test">
                        <li class="nav-item"><a href="{{route('admin.course.index')}}" class="nav-link">Khoá học lẻ</a></li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.course.index')) ? 'active' : '' }}"> <span>Lộ trình ProIelts</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="bài test">
                                <li class="nav-item"><a href="{{route('admin.route.index')}}" class="nav-link">Block</a></li>
                                 <li class="nav-item"><a href="{{route('admin.route_course.index')}}" class="nav-link">Danh sách khoá học</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.course.index')) ? 'active' : '' }}"><span>Khoá học Online</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="bài test">
                                <li class="nav-item"><a href="{{route('admin.route_online.index')}}" class="nav-link">Block</a></li>
                                 <li class="nav-item"><a href="{{route('admin.online_course.index')}}" class="nav-link">Danh sách khoá học</a></li>
                            </ul>
                        </li>
                    </ul>

                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link  "><i class="icon-check"></i> <span>Lịch học</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="bài test">
                        <li class="nav-item"><a href="{{route('admin.schedule.index')}}" class="nav-link">Lịch khai giảng offline</a></li>
                        <li class="nav-item"><a href="{{route('admin.schedule_online.index')}}" class="nav-link">Lịch khai giảng online</a></li>
                    </ul>
                </li>
  
                    <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.contact_address.index')  ) ? 'active' : '' }}"><i class="icon-copy"></i> <span>Liên hệ</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="bài test">
                        <li class="nav-item"><a href="{{route('admin.contact_address.index')}}" class="nav-link">Danh sách cơ sở</a></li>
                
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.teacher.index') ) ? 'active' : '' }}"><i class="icon-check"></i> <span>Đội ngũ giảng viên</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="bài test">
                        <li class="nav-item"><a href="{{route('admin.teacher.index')}}" class="nav-link">Danh sách giảng viên</a></li>
                    </ul>
                </li>
                
                  <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.best.index') ) ? 'active' : '' }}"><i class="fa fa-comments-o" aria-hidden="true"></i><span>Học viên</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="bài test">
                        <li class="nav-item"><a href="{{route('admin.best.index')}}" class="nav-link">Bảng vàng thành tích</a></li>
                         <li class="nav-item"><a href="{{route('admin.study.index')}}" class="nav-link">Học viên tiêu biểu</a></li>
                             <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.feedback.index') ) ? 'active' : '' }}"><span>Cảm nhận của học viên</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="bài test">
                                <li class="nav-item"><a href="{{route('admin.feedback.index',1)}}" class="nav-link">Video</a></li>
                                   <li class="nav-item"><a href="{{route('admin.feedback.index',2)}}" class="nav-link">Ảnh</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            
             
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ ((Route::currentRouteName() == 'admin.subscriber.index')  || (Route::currentRouteName() == 'admin.member.index') ) ? 'active' : '' }}"><i class="icon-users"></i> <span>Khách hàng</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Khách hàng">
                       
                        <li class="nav-item"><a href="{{route('admin.contact.index',1)}}" class="nav-link">Khách hàng đăng kí tư vấn</a></li>
                        <li class="nav-item"><a href="{{route('admin.contact.index',2)}}" class="nav-link">Khách hàng đăng kí học</a></li>
                        <li class="nav-item"><a href="{{route('admin.contact.index',3)}}" class="nav-link">Khách hàng đăng kí test</a></li>

                    </ul>
                </li>
                
       


            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>