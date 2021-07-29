@extends('frontend.layouts.master_index')
@section('content')
    <div class="banner">
        <img src="assets_pasal/img/banner-trangchu.jpg" class="img-fluid" alt="banner">
      </div>
    <div class="container">
        <img id="pattern-about-5" src="assets_pasal/img/pattern-4.png" alt="pattern" />
        <section class="about">
         
        @foreach($block as $bl)
          @if($bl->position == "gioi-thieu")
          {!!$bl->content!!}
          @endif
        @endforeach
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
                  <img src="assets_pasal/img/why-1.png" alt="pasal" />
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
                  <div class="thumbnail">
                    <img class="img-fluid" src="{{asset($course->image)}}" alt="khóa học" />
                  </div>
                  <div class="info">
                    <a class="title">Khóa học <b>{{$course->title}}</b></a>
                    <span>{{$course->summary}}</span>
                    <div class="bottom">
                      <a class="view-more">Xem tiếp</a>
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
            @foreach($teachers as $key1 => $teacher)
            @if($key1 == 0)
            <div class="col-md-3">
              <div class="item" style="background: url({{asset($teacher->avatar)}}) no-repeat;">
                <h4>{{$teacher->name}}</h4>
                <p>{{$teacher->summary}}</p>
              </div>
            </div>
            @else
             <div class="col-md-3 offset-md-1">
              <div class="item" style="background: url({{asset($teacher->avatar)}}) no-repeat;">
                <h4>{{$teacher->name}}</h4>
                <p>{{$teacher->summary}}</p>
              </div>
            </div>
            @endif
            
            @endforeach
          </div>
        </div>
      </section>
     
     <section class="testimonial">
        <h3 class="mb-30">HỌC VIÊN<b> TIÊU BIỂU</b></h3>
        <div class="container">
          <div class="row">
            @foreach($best_member as $best)
            <div class="col-md-4">
              <div class="item">
                <img class="icon" alt="icon" src="assets_pasal/icon/testimonial.png" />
                <p class="content">{!!$best->content!!}</p>
                <img class="avatar" src="{{asset($best->avatar)}}" alt="avatar" />
                <h4>{{$best->name}} </h4>
                <p>{{$best->point}}</p>
                <p>{{$best->summary}}</p>
              </div>
            </div>
            @endforeach
      
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
           @foreach($news_ielts as $news_ielt)
            <div class="col-md-4">
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
        <h3 class="mt-30">TIN TỨC SỰ KIỆN <b>NỔI BẬT</b></h3>
        <div class="container">
          <div class="row">
               @foreach($news_hots as $news_hot)
            <div class="col-md-4">
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
      </section>
    </div>
    @stop   


