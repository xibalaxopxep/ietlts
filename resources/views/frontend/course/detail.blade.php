@extends('frontend.layouts.master_news')
@section('content')
 <div class="banner">
        <img src="{{asset('assets_pasal/img/banner-pp.png')}}" class="img-fluid" alt="banner"/>
      </div>
      <section class="about py-4">
        <div class="container">
          <div class="lotrinh-about box-shadow">       
            <div class="row">
             {!!$record->course_for!!}
            </div>
          </div>
        </div>
      </section>
      <section class="lotrinh-loiich py-40">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
              <h4>LỢI ÍCH CỦA KHÓA HỌC</br><b>{{$record->title}}</b></h4>
              <span class="description">Khoá học Pre-IELTS độc quyền từ Simon Corconan sẽ giúp bạn <b class="text-uppercase">chinh phục mục tiêu IELTS!</b></span>
              <img class="thumbnail" src="{{asset('assets_pasal/img/loi-ich-khoahoc.png?v=1.1')}}" alt="{{$record->title}}">
            </div>
            <div class="col-md-6 list-item">
                {!!$record->course_profit!!}
                <img alt="pattern" id="lotrinh-loiich-pattern-1" src="{{asset('assets_pasal/img/pattern-13.png')}}" /> <img alt="pattern" id="lotrinh-loiich-pattern-2" src="{{asset('assets_pasal/img/pattern-13.png')}}" />

            </div>
        </div>
             
        </div>
        <img alt="pattern" id="khoahoc-loiich-pattern-1" src="{{asset('assets_pasal/img/loi-ich-khoahoc-bg.png')}}" />
      </section>
      <section class="dangky-khoahoc py-4" style="background:url({{asset('assets_pasal/img/dangky-khoahoc.png')}})">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="thumbnail">
                <img src="{{asset('assets_pasal/img/about-1.png')}}" alt="đăng ký khóa học">
                <div id="pattern-about-4" class="bg-white">
                <img src="{{asset('assets_pasal/icon/play.png')}}" alt="pattern"  />
              </div>
              </div>
              
            </div>
            <div class="col-md-6">
              <div class="d-sm-none d-md-block py-40"></div>
              <div class="info">
                <p class="fs-22 m-0">Khoá học IELTS độc quyền từ Simon Corconan giúp bạn </p>
                <p class="fs-22 text-uppercase"><b>Nắm vững bài thi - Đọc vị giám khảo</b></p>
                <a href="#" class="btn-white w-100">ĐĂNG KÝ TƯ VẤN NGAY</a>
                <p>Hãy đăng ký trở thành học viên khoá PRE-IELTS ngay hôm nay!</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="noidung-khoahoc py-40 pb-0" style="background:  url({{asset('assets_pasal/img/bg-noidung-course.png')}}) no-repeat #F5F4F1; background-position: top;">
        <h3><b>NỘI DUNG</b> CỦA KHÓA HỌC</h3>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="item item-1">
                <h3 class="title">LỘ TRÌNH HỌC</h3>
                <div class="info">
                  <b>Thời lượng khóa học:</b>
                  {!!$record->course_time!!}
                  <b>Nội dung khóa học</b>
                  {!!$record->content!!}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="item item-2">
                <h3 class="title">THÔNG TIN VỀ LỚP HỌC</h3>
                <div class="info">
                  <b>Mô hình tổ chức lớp học:</b>
                   {!!$record->course_organization!!}
                  <b style="color: #ff7f00;">Dịch vụ đặc quyền cho học viên*</b>
                  {!!$record->course_service!!}
                </div>
              </div>
            </div>
          </div>
          <div class="row content">
            <div class="col-md-9">
                <div class="w-100 d-flex">
                    <div class="item" style="background: url(/assets_pasal/icon/1.png) no-repeat">
                        <b>Kỹ năng reading</b>
                        <p>Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying ...</p>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="item" style="background: url(/assets_pasal/icon/2.png) no-repeat">
                        <b>Kỹ năng reading</b>
                        <p>Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying ...</p>
                    </div>
                </div>
                <div class="w-100 d-flex mt-40">
                    <div class="item" style="background: url(/assets_pasal/icon/3.png) no-repeat">
                        <b>Kỹ năng reading</b>
                        <p>Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying ...</p>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="item" style="background: url(/assets_pasal/icon/4.png) no-repeat">
                        <b>Kỹ năng reading</b>
                        <p>Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying ...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <img id="course-content-pattern" src="/assets_pasal/img/course-content-bg2.png" alt="pattern" />
            </div>
          </div>
        </div>
      </section>
       <section class="teacher">
       <h3 class="mb-30">ĐỘI NGŨ GIẢNG VIÊN<b> SẼ ĐỒNG HÀNH CÙNG BẠN TRONG KHOÁ HỌC NÀY</b></h3>
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
        <h3 class="mb-30">CÂU CHUYỆN THÀNH CÔNG<b> CỦA HỌC VIÊN</b></h3>
        <div class="container">
          <div class="row">
          <div class="owl-carousel owl-theme testimonial-slide">
             @foreach($studies as $study)
              <div class="item">
                <img class="icon" alt="icon" src="{{asset('assets_pasal/icon/testimonial.png')}}" />
                <p class="content">{!!$study->content!!}</p>
                <img class="avatar" src="{{asset('assets_pasal/img/avatar-2.png')}}" alt="avatar" />
                <h4>{{$study->name}}</h4>
                <p>{{$study->point}}</p>
                <p>{{$study->summary}}</p>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </section>
<!--/main-->
@stop