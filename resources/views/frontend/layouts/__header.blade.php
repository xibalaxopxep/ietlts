
    <body class="bg-grey homepage">
      <div id="header-top">
            <div class="container">
        <div class="row">
        <div class="text-right" style="text-align: right;">
        <a class="header-btn pull-right" href="#form">ĐĂNG KÝ NHẬN LỘ TRÌNH</a>
        </div>
          <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
          <!-- Menu Mobile -->
          <nav role="navigation" style="position: absolute; left: 0px;">
            <div id="menuToggle">
              <input class="" type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
           
        <ul class="menu-mobile d-sm-block d-md-none" id="menu">
         @foreach($menu as $key => $mn)
              <li class="item-menu-mobile "><a href="{{url($mn->link)}}" class="@if(count($menu[$key]->children)) mobile-link @endif" aria-current="page">{{$mn->title}}</a>
                   @if(count($menu[$key]->children))
                   <ul class="">
                    @foreach($menu[$key]->children as $val)
                     <li class="nav-item"><a href="{{url($val->link)}}" class="nav-link" aria-current="page">{{$val->title}}</a>
                    @endforeach
                  </ul>
                  @endif
              </li>

              @endforeach
        </ul>
        </div>
          </nav>
          <!--END  Menu Mobile -->
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
              <img class="logo" src="{{asset('assets_pasal/img/logo.png')}}" alt="logo">
            </a>
        <!--         <div class='countdown' data-date="2021-09-01" data-time="18:31"></div> -->
            <ul class="nav nav-pills menu d-md-flex d-none">

              @foreach($menu as $key => $mn)
              <li class="nav-item"><a href="{{url($mn->link)}}" class="nav-link" aria-current="page">{{$mn->title}}</a>
                   @if($mn->children != null)
                   <ul class="submenu box-shadow">
                    @foreach($menu[$key]->children as $val)
                     <li class="nav-item"><a href="{{url($val->link)}}" class="nav-link" aria-current="page">{{$val->title}}</a>
                    @endforeach
                  </ul>
                  @endif
              </li>

              @endforeach
            </ul>
            
          </header>
          
        </div>
      </div>

      </div>
        @if(Session::has('success'))
        <script type="text/javascript">
          swal("Thành công!", "{{ Session::get('success') }}", "success");
        </script>
         @elseif(Session::has('error'))
         <script type="text/javascript">
             swal("Không thành công!", "{{ Session::get('error') }}", "error");
         </script>
         @endif

        
     

