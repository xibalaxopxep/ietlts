@extends('frontend.layouts.master_index')
@section('content')
    <div class="banner">
        <img src="assets_pasal/img/banner-trangchu.jpg" class="img-fluid" alt="banner">
      </div>
    <div class="container">
        <img id="pattern-about-5" src="assets_pasal/img/pattern-4.png" alt="pattern" />
        <section class="about">
         
        <img id="pattern-about-1" src="assets_pasal/img/Anh-5.png" alt="pattern" />
          <img id="pattern-about-2" src="assets_pasal/img/pattern-1.png" alt="pattern" />
          <img id="pattern-about-3" src="assets_pasal/img/pattern-2.png" alt="pattern" />

          <div class="row">
            <h3>Tổ chức đào tạo tiếng Anh Pasal</h3>
            <span class="description">Pasal là tổ chức đào tạo tiếng Anh duy nhất tại Việt Nam hợp tác ĐỘC QUYỀN với chuyên gia Paul Gruber (hệ thống Pronunciation Workshop) & TS A.J Hoge (hệ thống Effortless English).</span>
            <span class="description">Tại Pasal, chúng tôi cam kết mang tới những giải pháp học uy tín và hiệu quả nhất thế giới - giúp bạn giao tiếp tiếng Anh trôi chảy từ 3-6 tháng</span>
          </div>
          <div class="row mt-5">
            <div class="col-md-5" style="position: relative;">
            
              <div id="pattern-about-4">
                <img src="assets_pasal/img/pattern-about.png" alt="pattern"  />
              </div>
              <div class="open-video-2" data-video="{{$block[0]->video_url}}">
              <img src="assets_pasal/img/about-1.png" alt="pasal simon" class="img-fluid" />
              </div>
            </div>
            <div class="col-md-7 info">
              <h3>HỆ THỐNG </br><b>LUYỆN THI <strong>IELTS ĐỘC QUYỀN</strong> TỪ SIMON CORCORAN</b></h3>
              <span>Hệ thống học tiếng Anh Effortless English được sáng lập bởi TS A.J Hoge sau nhiều năm giảng dạy. Hiện nay, phương pháp này đã được áp dụng thành công trên 54 quốc gia và giúp cho hàng triệu người trên thế giới cải thiện khả năng tiếng Anh của mình.</span>
              <a class="button-link" href="#form">ĐĂNG KÝ TƯ VẤN NGAY</a>
            </div>
          </div>
        </section>
      </div>
      <div class="container">
        <section class="why py-5">
          <h3>TẠI SAO NÊN LỰA CHỌN <b>PASAL IELTS?</b></h3>
          <div class="row">

          
            @foreach($template as $tem)
            <div class=col-md-3>
              <div class="item">
                <div class="icon">
                  <img src="{!!$tem->image!!}" alt="pasal" />
                </div>
                <div class="info mt-2">
                  @if($tem->type)
                  <span>{{$tem->type}}</span>
                  @else
                  <span><br></span>
                  @endif
                  <h4>{!!$tem->name!!}</h4>
                  <a href="{{url('$tem->link')}}"  class="btn bg-main">Xem tiếp</a>
                  <div class="description">
                    {!!$tem->description!!}
                  </div>
                </div>
              </div>              
            </div>
           @endforeach
          </div>
          <div class="w-100 text-center" style="margin-top: 40px;">
          <a class="btn btn-submary" href="#form">ĐĂNG KÝ NHẬN LỘ TRÌNH HỌC NGAY</a>
            </div>
      </section>
      </div>
      <section class="course">
      <img id="pattern-course-1" alt="pattern" src="assets_pasal/img/Anh-4.jpg">
      <img id="pattern-course-2" alt="pattern" src="assets_pasal/img/pattern-course.png">
        <h3>CÁC KHÓA HỌC <b>IELTS TẠI PASAL</b></h3>
        <span class="subtitle">Giải pháp luyện thi IELTS độc quyền từ Simon của Pasal, giúp học viên nắm vững bài thi - đọc vị giám khảo!</span>
        <div class="container">
          <div class="row">
            @foreach($courses  as $course)
            <div class="col-md-4">
              <div class="item-wrap">
                <div class="item">
                  <a class="thumbnail" href="{{route('course.detail',$course->alias)}}">
                    <img class="img-fluid" src="{{asset($course->image)}}" alt="khóa học" />
                  </a>
                  <div class="info">
                    <a class="title" href="{{route('course.detail',$course->alias)}}"><b>{{$course->title}}</b></a>
                    <span>{{$course->summary}}</span>
                    <div class="bottom">
                      <a class="view-more" href="{{route('course.detail',$course->alias)}}">Xem tiếp</a>
                      @if($course->level)
                      <p class="label">{{$course->level}}</p>
                      @else
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>   
            @endforeach 
          </div>
        </div>
      </section>

      <section class="teacher">
        <h3>ĐỘI NGŨ <b>GIẢNG VIÊN</b> IELTS TẠI PASAL</h3>
        <div class="container">
          <div class="row d-flex mt-30">
          <div class="owl-carousel owl-theme teacher-slide">
            @foreach($teachers as $key1 => $teacher)
            
              <div class="item" style="background: url({{asset($teacher->avatar)}}) no-repeat;">
                <h4>{{$teacher->name}}</h4>
                <p>{{$teacher->summary}}</p>
              </div>
            
            
            @endforeach
            </div>
          </div>
        </div>
      </section>
     
     <section class="testimonial">
        <h3 class="mb-30">HỌC VIÊN<b> TIÊU BIỂU</b></h3>
        <div class="container">
          <div class="row">
          <div class="owl-carousel owl-theme testimonial-slide">
            @foreach($best_member as $best)
            
              <div class="item">
                <img class="icon" alt="icon" src="assets_pasal/icon/testimonial.png" />
                <p class="content">{!!$best->content!!}</p>
                <img class="avatar" src="{{asset($best->avatar)}}" alt="avatar" />
                <h4>{{$best->name}} </h4>
                <p>{{$best->point}}</p>
                <p>{{$best->summary}}</p>
              </div>
        
            @endforeach
        </div>
          </div>
        </div>
        <img id="pattern-testimonial" src="assets_pasal/img/Anh-3.png" alt="pattern">
      </section>
     <section id="form" style="background: url(assets_pasal/img/background/pattern-2.png) var(--main-color) no-repeat;background-size: cover;">
        <img id="pattern-1" src="assets_pasal/img/background/pattern-1.png" alt="pattern" />
        <div class="container">
          <div class="row">
            <div class="form-wrapper">
              <div class="col-md-6 simon">
                <img src="{{asset('assets_pasal/img/simon.png')}}" alt="simon ielts">
              </div>
              <div class="form-content">
                <div class="col-md-6 offset-md-6">
                  <form action="{!!route('home.sign_up_advise')!!}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <h4><b>ĐĂNG KÝ TƯ VẤN</b> LỘ TRÌNH HỌC IELTS</h4>
                    <p>Pasal cam kết giúp bạn chinh phục mục tiêu IELTS với lộ trình học tinh gọn - hiệu quả - tối ưu chi phí !</p>
                    <div class="form-group">
                      <img class="icon" src="{{asset('assets_pasal/icon/user.png')}}" alt="icon" />
                      <input name="name" class="your_name" type="text" required="required" placeholder="Nhập họ tên của bạn*"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="{{asset('assets_pasal/icon/phone.png')}}" alt="icon" />
                      <input name="phone" class="your_sdt" type="tel" required="required" placeholder="Số điện thoại của bạn*"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="{{asset('assets_pasal/icon/mail.png')}}" alt="icon" />
                      <input name="email" class="your_email" type="email" required="required" placeholder="Email của bạn*"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="{{asset('assets_pasal/icon/course.png')}}" alt="icon" />
                      <select name="course_id" class="your_local">
                        <option value="" disabled selected>Bạn quan tâm đến khoá học nào?</option>
                        @foreach($course_shares as $course)
                        <option value="{{$course->id}}">{!!$course->title!!}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="{{asset('assets_pasal/icon/location.png')}}" alt="icon" />
                      <select name="contact_address_id" class="your_local">
                        <option value="" disabled selected>Chọn cơ sở Pasal gần bạn nhất*</option>
                        @foreach($contact_address as $add)
                        <option value="{{$add->id}}">{!!$add->name!!}</option>
                        @endforeach
                      </select>
                    </div>
                    <button  class="button-form btn-gradient w-100 ">ĐĂNG KÝ NGAY</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="recent-news">
        <h3 class=""><b>KIẾN THỨC </b>LUYỆN THI IELTS</h3>
        <div class="container">
          <div class="row">
          <div class="owl-carousel owl-theme news-slide">
           @foreach($news_ielts as $news_ielt)
            <div class="item">
              <div class="card-news">
                <div class="thumbnail">
                   <a  href="{{route('news.detail',$news_ielt->alias)}}"><img class="img-fluid" src="{{asset($news_ielt->images)}}" alt="tiêu đề bài viết"></a>
                </div>
                <div class="info d-flex">
                  <div class="calendar">
                    <p>{{date('M', strtotime($news_ielt->created_at))}}</p>
                    <b>{{date('d', strtotime($news_ielt->created_at))}}</b>
                  </div>
                  <h4><a style="color: #342b7a;" href="{{route('news.detail',$news_ielt->alias)}}">{{$news_ielt->title}}</a></h4>
                </div>
              </div>
            </div>
            @endforeach
            </div>
          </div>
        </div>
        <h3 class="mt-30">TIN TỨC SỰ KIỆN <b>NỔI BẬT</b></h3>
        <div class="container">
          <div class="row">
          <div class="owl-carousel owl-theme news-slide">
               @foreach($news_hots as $news_hot)
            <div class="item">
              <div class="card-news">
                <div class="thumbnail">
                  <a  href="{{route('news.detail',$news_hot->alias)}}"><img class="img-fluid" src="{{asset($news_hot->images)}}" alt="tiêu đề bài viết"></a>
                </div>
                <div class="info d-flex">
                  <div class="calendar">
                    <p>{{date('M', strtotime($news_hot->created_at))}}</p>
                    <b>{{date('d', strtotime($news_hot->created_at))}}</b>
                  </div>
                  <h4><a style="color: #342b7a;" href="{{route('news.detail',$news_hot->alias)}}">{{$news_hot->title}}</a></h4>
                </div>
              </div>
            </div>
            @endforeach
            </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    @stop   


