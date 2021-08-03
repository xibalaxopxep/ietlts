@extends('frontend.layouts.master')
@section('content')





      <div class="banner">
        <img src="assets_pasal/img/banner-pp.png" class="img-fluid" alt="banner"/>
      </div>
      <section class="about py-4">
        <div class="container">
          <div class="lotrinh-about box-shadow">       
             {!!$record->course_for!!}
          </div>
        </div>
      </section>
      <section class="lotrinh-loiich py-40">
        <div class="container">
          <div class="row">
           <div class="col-md-6">
              <h4>LỢI ÍCH CỦA LỘ TRÌNH</br><b>{!!$record->title!!} ({!!$record->level!!})</b></h4>
              <span class="description">{!!$record->summary!!}</span>
              <img class="thumbnail" src="assets_pasal/img/loi-ich-lotrinh.png" alt="Lộ trình PRO IELTS">
            </div>
            {!!$record->course_profit!!}
          </div>
        </div>
      </section>
      <section class="lotrinh-content">
        <h3 class=""><b>NÔI DUNG </b>LỘ TRÌNH PRO IELTS</h3>
        <div class="container">
          <div class="row">
            @foreach($courses as $key => $course)
            <div class="col-md-4">
              <div class="item item-{{++$key}} box-shadow">
                <img class="thumbnail" src="assets_pasal/img/lotrinh-2.png" alt="lộ trình" />
                <h4><b>PRO IELTS</b> {{$course->title}}</h4>
                <div class="label">
                  <a>Lợi ích của khóa học</a>
                </div>
               {!!$course->course_profit!!}
                <div class="label">
                  <a>Nội dung lộ trình học</a>
                </div>
                <ul class="list">
                  {!!$course->content!!}
                </ul>
                <div class="label">
                  <a>Thời lượng học</a>
                </div>
                <ul class="list">
                  {!!$course->course_time!!}
                </ul>
                <div class="label">
                  <a>Mô hình lớp học</a>
                </div>
                <ul class="list">
                 {!!$course->course_organization!!}
                </ul>
                <div class="price">
                  <span class="sale-price">{{number_format($course->price)}}</span>
                  <span class="old-price">{{number_format($course->sale_price)}} VNĐ</span>
                </div>
              </div>
              <div class="item-uudai item-uudai-1">
                  <h4>ƯU ĐÃI ĐẶC BIỆT</h4>
                  <ul class="list">
                  {!!$course->promotion!!}
                </ul>
              </div>
            </div>
            @endforeach
           
       
          </div>
        </div>
      </section>

       <section class="teacher">
        <h3><b>ĐỘI NGŨ GIẢNG VIÊN</b> SẼ ĐỒNG HÀNH CÙNG BẠN TRONG KHOÁ HỌC NÀY</h3>
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
        <h3 class="mb-30"><b>HỌC VIÊN</b> TIÊU BIỂU</h3>
        <div class="container">
          <div class="row">
          <div class="owl-carousel owl-theme testimonial-slide">
            @foreach($studies as $best)
            
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


@stop