
    <body class="bg-grey homepage">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
            <div class="container">
        <div class="row">
        <div class="text-right" style="text-align: right;">
        <a class="header-btn pull-right" href="#form">ĐĂNG KÝ NHẬN LỘ TRÌNH</a>
        </div>
          <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
              <img class="logo" src="{{asset('assets_pasal/img/logo.png')}}" alt="logo">
            </a>
           
<!--         <div class='countdown' data-date="2021-09-01" data-time="18:31"></div> -->
            <ul class="nav nav-pills menu">

              @foreach($menu as $key => $mn)
              <li class="nav-item"><a href="{{url($mn->link)}}" class="nav-link" aria-current="page">{{$mn->title}}</a>
                   @if($mn->children != null)
                   <ul>
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

      </header>
        @if(Session::has('success'))
        <script type="text/javascript">
          swal("Thành công!", "{{ Session::get('success') }}", "success");
        </script>
         @elseif(Session::has('error'))
         <script type="text/javascript">
             swal("Không thành công!", "{{ Session::get('error') }}", "error");
         </script>
         @endif

        
     

