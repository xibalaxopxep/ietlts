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
                        <span>C???u h??nh website</span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ ((Route::currentRouteName() == 'admin.user.index') || (Route::currentRouteName() == 'admin.role.index') ) ? 'active' : '' }}"><i class="icon-user-tie"></i> <span>Ng?????i d??ng h??? th???ng</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">

                        <li class="nav-item">
                            <a href="{{route('admin.user.index')}}" class="nav-link">
                                <span>Th??nh vi??n h??? th???ng</span>         
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.role.index')}}" class="nav-link">
                                <span>Quy???n</span>         
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                 <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.menu.index') || (Route::currentRouteName() == 'admin.block.index') || (Route::currentRouteName() == 'admin.slide.index')  || (Route::currentRouteName() == 'admin.template_setting.index') ||  (Route::currentRouteName() == 'admin.banner.index')) ? 'active' : '' }}"><i class="icon-check"></i> <span>Giao di???n</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Giao di???n">
                            <li class="nav-item"><a href="{{route('admin.menu.index')}}" class="nav-link">Menu</a></li>
                            <li class="nav-item"><a href="{{route('admin.about.index')}}" class="nav-link">Gi???i thi???u</a></li>
                           <!--  <li class="nav-item"><a href="{{route('admin.slide.index')}}" class="nav-link">Slide</a></li> -->
                            <li class="nav-item"><a href="{{route('admin.template_setting.index')}}" class="nav-link">T???i sao n??n ch???n pasal</a></li>
                            <li class="nav-item"><a href="{{route('admin.banner.index')}}" class="nav-link">Banner</a></li>
                            <li class="nav-item"><a href="{{route('admin.block.index')}}" class="nav-link">Kh???i</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ ( (Route::currentRouteName() == 'admin.news.index') ) ? 'active' : '' }}"><i class="icon-newspaper2"></i> <span>Tin t???c</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('admin.category.index', \App\Category::TYPE_NEWS)}}" class="nav-link">Danh m???c</a></li>
                        <li class="nav-item"><a href="{{route('admin.news.index')}}" class="nav-link">B??i vi???t</a></li>
                    </ul>
                </li>
                
                 
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ ((Route::currentRouteName() == 'admin.video.index') ) ? 'active' : '' }}"><i class="icon-video-camera"></i> <span>Ph????ng ph??p h???c</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('admin.method.edit',1)}}" class="nav-link">Block</a></li>
                         <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link {{ ((Route::currentRouteName() == 'admin.video.index') ) ? 'active' : '' }}"><i class="icon-video-camera"></i> <span>Video</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                <li class="nav-item"><a href="{{route('admin.category.index', \App\Category::TYPE_VIDEO)}}" class="nav-link">Danh m???c</a></li>
                                <li class="nav-item"><a href="{{route('admin.video.index')}}" class="nav-link">Video</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ ((Route::currentRouteName() == 'admin.gallery.index') ) ? 'active' : '' }}"><i class="icon-camera"></i> <span>H??nh ???nh</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{route('admin.category.index', \App\Category::TYPE_GALLERY)}}" class="nav-link">Danh m???c</a></li>
                        <li class="nav-item"><a href="{{route('admin.gallery.index')}}" class="nav-link">H??nh ???nh</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.test.index') || (Route::currentRouteName() == 'admin.section.index')  || (Route::currentRouteName() == 'admin.quizz.index') ) ? 'active' : '' }}"><i class="icon-check"></i> <span>B??i test</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="b??i test">
                        <!-- <li class="nav-item"><a href="{{route('admin.category.index', \App\Category::TYPE_TEST)}}" class="nav-link">Danh m???c</a></li>
                        <li class="nav-item"><a href="{{route('admin.test.index')}}" class="nav-link">B??i t</a></li> -->
                        <li class="nav-item"><a href="{{route('admin.section.index')}}" class="nav-link">Test</a></li>
                        <li class="nav-item"><a href="{{route('admin.quizz.index')}}" class="nav-link">B??i t???p v?? c??u h???i</a></li>
                        <li class="nav-item"><a href="{{route('admin.rule.index')}}" class="nav-link">Rule</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.course.index')) ? 'active' : '' }}"><i class="icon-check"></i> <span>Kho?? h???c</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="b??i test">
                        <li class="nav-item"><a href="{{route('admin.course.index')}}" class="nav-link">Kho?? h???c l???</a></li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.course.index')) ? 'active' : '' }}"> <span>L??? tr??nh ProIelts</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="b??i test">
                                <li class="nav-item"><a href="{{route('admin.route.index')}}" class="nav-link">Block</a></li>
                                 <li class="nav-item"><a href="{{route('admin.route_course.index')}}" class="nav-link">Danh s??ch kho?? h???c</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.course.index')) ? 'active' : '' }}"><span>Kho?? h???c Online</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="b??i test">
                                <li class="nav-item"><a href="{{route('admin.route_online.index')}}" class="nav-link">Block</a></li>
                                 <li class="nav-item"><a href="{{route('admin.online_course.index')}}" class="nav-link">Danh s??ch kho?? h???c</a></li>
                            </ul>
                        </li>
                    </ul>

                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link  "><i class="icon-check"></i> <span>L???ch h???c</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="b??i test">
                        <li class="nav-item"><a href="{{route('admin.schedule.index')}}" class="nav-link">L???ch khai gi???ng offline</a></li>
                        <li class="nav-item"><a href="{{route('admin.schedule_online.index')}}" class="nav-link">L???ch khai gi???ng online</a></li>
                    </ul>
                </li>
  
                    <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.contact_address.index')  ) ? 'active' : '' }}"><i class="icon-copy"></i> <span>Li??n h???</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="b??i test">
                        <li class="nav-item"><a href="{{route('admin.contact_address.index')}}" class="nav-link">Danh s??ch c?? s???</a></li>
                
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.teacher.index') ) ? 'active' : '' }}"><i class="icon-check"></i> <span>?????i ng?? gi???ng vi??n</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="b??i test">
                        <li class="nav-item"><a href="{{route('admin.teacher.index')}}" class="nav-link">Danh s??ch gi???ng vi??n</a></li>
                    </ul>
                </li>
                
                  <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.best.index') ) ? 'active' : '' }}"><i class="fa fa-comments-o" aria-hidden="true"></i><span>H???c vi??n</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="b??i test">
                        <li class="nav-item"><a href="{{route('admin.best.index')}}" class="nav-link">B???ng v??ng th??nh t??ch</a></li>
                         <li class="nav-item"><a href="{{route('admin.study.index')}}" class="nav-link">H???c vi??n ti??u bi???u</a></li>
                             <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link  {{ ((Route::currentRouteName() == 'admin.feedback.index') ) ? 'active' : '' }}"><span>C???m nh???n c???a h???c vi??n</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="b??i test">
                                <li class="nav-item"><a href="{{route('admin.feedback.index',1)}}" class="nav-link">Video</a></li>
                                   <li class="nav-item"><a href="{{route('admin.feedback.index',2)}}" class="nav-link">???nh</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            
             
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link {{ ((Route::currentRouteName() == 'admin.subscriber.index')  || (Route::currentRouteName() == 'admin.member.index') ) ? 'active' : '' }}"><i class="icon-users"></i> <span>Kh??ch h??ng</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Kh??ch h??ng">
                       
                        <li class="nav-item"><a href="{{route('admin.contact.index',1)}}" class="nav-link">Kh??ch h??ng ????ng k?? t?? v???n</a></li>
                        <li class="nav-item"><a href="{{route('admin.contact.index',2)}}" class="nav-link">Kh??ch h??ng ????ng k?? h???c</a></li>
                        <li class="nav-item"><a href="{{route('admin.contact.index',3)}}" class="nav-link">Kh??ch h??ng ????ng k?? test</a></li>

                    </ul>
                </li>
                
       


            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>