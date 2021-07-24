@extends('frontend.layouts.master')
@section('content')
      <div class="container">
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
            <div class=col-md-3>
              <div class="item">
                <div class="icon">
                  <img src="{{asset('assets_pasal/img/why-1.png')}}" alt="pasal" />
                </div>
                <div class="info mt-2">
                  <span>Phương pháp</span>
                  <h4>Độc quyền <br>Simon IELTS</h4>
                  <a class="btn bg-main">Xem tiếp</a>
                  <div class="description">
                    As a society, we spend hundreds of billions of dollars measuring the return on our financial assets_pasal
                  </div>
                </div>
              </div>              
            </div>
            <div class=col-md-3>
              <div class="item">
                <div class="icon">
                  <img src="assets_pasal/img/why-2.png" alt="pasal" />
                </div>
                <div class="info mt-2">
                  <span>Tài liệu học</span>
                  <h4>Độc quyền </br>từ Simon</h4>
                  <a class="btn bg-main">Xem tiếp</a>
                  <div class="description">
                    As a society, we spend hundreds of billions of dollars measuring the return on our financial assets_pasal
                  </div>
                </div>
              </div>              
            </div>
            <div class=col-md-3>
              <div class="item">
                <div class="icon">
                  <img src="assets_pasal/img/why-3.png" alt="pasal" />
                </div>
                <div class="info mt-2">
                  <span>ㅤ</span>
                  <h4>Giảng viên </br>chuyên nghiệp</h4>
                  <a class="btn bg-main">Xem tiếp</a>
                  <div class="description">
                    As a society, we spend hundreds of billions of dollars measuring the return on our financial assets_pasal
                  </div>
                </div>
              </div>              
            </div>
            <div class=col-md-3>
              <div class="item">
                <div class="icon">
                  <img src="assets_pasal/img/why-4.png" alt="pasal" />
                </div>
                <div class="info mt-2">
                  <span>Dịch vụ</span>
                  <h4>Đặc quyền </br>cho học viên</h4>
                  <a class="btn bg-main">Xem tiếp</a>
                  <div class="description">
                    As a society, we spend hundreds of billions of dollars measuring the return on our financial assets_pasal
                  </div>
                </div>
              </div>              
            </div>
          </div>
          <a class="btn btn-submary">ĐĂNG KÝ NHẬN LỘ TRÌNH HỌC NGAY</a>
        </div>
      </section>
      <section class="course">
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
            @foreach($teachers as $teacher)
            <div class="col-md-3">
              <div class="item" style="background: url({{asset($teacher->avatar)}}) no-repeat;">
                <h4>{{$teacher->name}}</h4>
                <p>{{$teacher->summary}}</p>
              </div>
            </div>
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
      </section>
      <section id="form" style="background: url(assets_pasal/img/background/pattern-2.png) var(--main-color) no-repeat;background-size: cover;">
        <img id="pattern-1" src="assets_pasal/img/background/pattern-1.png" alt="pattern" />
        <div class="container">
          <div class="row">
            <div class="form-wrapper">
              <div class="col-md-6 simon">
                <img src="assets_pasal/img/simon.png" alt="simon ielts">
              </div>
              <div class="form-content">
                <div class="col-md-6 offset-md-6">
                  <form>
                    <h4><b>ĐĂNG KÝ TƯ VẤN</b> LỘ TRÌNH HỌC IELTS</h4>
                    <p>Pasal cam kết giúp bạn chinh phục mục tiêu IELTS với lộ trình học tinh gọn - hiệu quả - tối ưu chi phí !</p>
                    <div class="form-group">
                      <img class="icon" src="assets_pasal/icon/user.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Nhập họ tên của bạn*"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="assets_pasal/icon/phone.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Số điện thoại của bạn*"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="assets_pasal/icon/mail.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Email của bạn*"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="assets_pasal/icon/course.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Bạn quan tâm đến khóa học nào?"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="assets_pasal/icon/location.png" alt="icon" />
                      <select name="location">
                        <option value="" disabled selected>Chọn cơ sở Pasal gần bạn nhất*</option>
                        @foreach($contact_address as $add)
                        <option value="">{{$add->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <button class="button-form btn-gradient w-100">ĐĂNG KÝ NGAY</button>
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
                  <img class="img-fluid" src="{{asset($news_ielt->images)}}" alt="tiêu đề bài viết">
                </div>
                <div class="info d-flex">
                  <div class="calendar">
                    <p>APR</p>
                    <b>07</b>
                  </div>
                  <h4>{{$news_ielt->title}}</h4>
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
                  <img class="img-fluid" src="{{asset($news_hot->images)}}" alt="tiêu đề bài viết">
                </div>
                <div class="info d-flex">
                  <div class="calendar">
                    <p>APR</p>
                    <b>07</b>
                  </div>
                  <h4>{{$news_hot->title}}</h4>
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
    
   

