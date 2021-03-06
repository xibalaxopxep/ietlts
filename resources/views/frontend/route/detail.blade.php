@extends('frontend.layouts.master_index')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 

      <div class="banner">
        <img src="assets_pasal/img/banner-pp.png" class="img-fluid" alt="banner"/>
      </div>

        <div class="container">
          <div class="lotrinh-about box-shadow">  
           <div class="row">
              <h3 class="text-center" class="mt-30">{{$record->title}} ({{$record->level}}) <b>DÀNH CHO AI?</b></h3>     
             {!!$record->course_for!!}
          </div>
        </div>
        </div>
      <section class="lotrinh-loiich py-40">
        <div class="container">
          <div class="row">
           <div class="col-md-6" style="position: relative;">
              <h4>LỢI ÍCH CỦA LỘ TRÌNH<br><b>{!!$record->title!!} ({!!$record->level!!})</b></h4>
              <span class="description">{!!$record->summary!!}</span>
              <img class="thumbnail" src="/assets_pasal/img/loi-ich-lotrinh.png" alt="Lộ trình PRO IELTS">
            </div>
              <div class="col-md-6 list-item">
              <div class="row">
                @php
                    $content = explode('|', $record->course_profit);
                @endphp
                <div class="col-6">
                  <div class="item item-1">
                    <img class="thumbnail-item" src="assets_pasal/icon/lotrinh1.png" />
                    <p>{!!$content[0]!!}</p>
                  </div>
                </div>
                <div class="col-6">
                  <div class="item item-2">
                    <img class="thumbnail-item" src="assets_pasal/icon/lotrinh2.png" />
                    <p>{!!$content[1]!!}</p>
                  </div>
                </div>
                <div class="col-6">
                  <div class="item item-3">
                    <img class="thumbnail-item" src="assets_pasal/icon/lotrinh3.png" />
                    <p>{!!$content[2]!!}</p>
                  </div>
                </div>
                <div class="col-6">
                  <div class="item item-4">
                    <img class="thumbnail-item" src="assets_pasal/icon/lotrinh4.png" />
                    <p>{!!$content[3  ]!!}</p>
                  </div>
                </div>
                <img id="lotrinh-loiich-pattern-1" src="assets_pasal/img/pattern-13.png" alt="pattern" />
                <img id="lotrinh-loiich-pattern-2" src="assets_pasal/img/pattern-13.png" alt="pattern" />
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="lotrinh-content">
        <h3 class="mb-30"><b>NỘI DUNG </b>LỘ TRÌNH PRO IELTS</h3>
        <div class="container">
          <div class="row">
            @foreach($courses as $key => $course)
            <div class="col-md-4">
              <div class="item item-{{++$key}} box-shadow">
                <img class="thumbnail" src="{{asset($course->image)}}" alt="lộ trình" />
                @php
                    $str = str_replace("PRO IELTS", "<b>PRO IELTS</b>",$course->title);
                @endphp
                <h4> {!!$str!!}</h4>
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
                  <span class="sale-price">{{number_format($course->sale_price)}}</span>
                  <span class="old-price">{{number_format($course->price)}} VNĐ</span>
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
        <h3 class="mb-30"><b>CÂU CHUYỆN THÀNH CÔNG</b> CỦA HỌC VIÊN</h3>
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

       <section id="form" style="background: url(assets_pasal/img/background/pattern-2.png) var(--main-color) no-repeat;background-size: cover;">
        <img id="pattern-1" src="assets_pasal/img/background/pattern-1.png" alt="pattern" />
        <div class="container">
          <div class="row">
            <div class="form-wrapper">
              <div class="col-md-6 timer">
               <!--  <img src="{{asset('assets_pasal/img/simon.png')}}" alt="simon ielts"> -->
                <h4> NHẬN NGAY ƯU ĐÃI </br>HỌC PHÍ ĐẶC BIỆT </h4>
                <div class="new-price">
                 <span>{{number_format($record->price)}} VNĐ</span>
                </div>
                <div class="old-price">
                <span style="text-decoration: line-through;"> {{number_format($record->sale_price)}} VNĐ</span>
                </div>
                
                 @if($record->sale_time)
                     @php
                     $time = explode(' ',$record->sale_time);
                     $time1= $time[0];
                     $time2= $time[1];
                     @endphp
               <div class='countdown' data-date="{{$time1}}" data-time="{{$time2}}"></div>
               @endif
              </div>
              <div class="form-content">
                <div class="col-md-6 offset-md-6">
                  <form action="{!!route('home.sign_up_advise2')!!}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <h4><b>ĐĂNG KÝ TƯ VẤN</b> LỘ TRÌNH PRO IELTS</h4>
                    <p>Pasal cam kết giúp bạn chinh phục mục tiêu IELTS với lộ trình học tinh gọn - hiệu quả - tối ưu chi phí !</p>
                    <div class="form-group">
                      <img class="icon" src="{{asset('assets_pasal/icon/user.png')}}" alt="icon" />
                      <input name="name" class="your_name" type="text" required="required" placeholder="Nhập họ tên của bạn*"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="{{asset('assets_pasal/icon/phone.png')}}" alt="icon" />
                      <input name="phone" class="your_sdt" type="text" required="required" placeholder="Số điện thoại của bạn*"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="{{asset('assets_pasal/icon/mail.png')}}" alt="icon" />
                      <input name="email" class="your_email" type="email" required="required" placeholder="Email của bạn*"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="{{asset('assets_pasal/icon/course.png')}}" alt="icon" />
                      <select name="course_id" id="course_id" class="pick_course">
                        @foreach($coursess as $course)
                        <option value="{{$course->id}}" @if ($course->id == 11) selected @endif>{!!$course->title!!}</option>
                        @endforeach
                      </select>
                      @foreach($coursess as $course)
                      <input type="hidden" id="course-{{$course->id}}" data-sale-price="{!!$course->sale_price!!}" data-price="{!!$course->price!!}"/>
                        @endforeach
                    </div>
                    <div class="form-group">
                      <img class="icon" src="{{asset('assets_pasal/icon/location.png')}}" alt="icon" />
                      <select name="contact_address_id" class="your_local">
                        <option value="" disabled selected>Chọn cơ sở Pasal gần bạn nhất*</option>
                        @foreach($contact_add as $add)
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

        <div class="lichkhaigiang-page">
            <h3 class="sub-color pt-40">LỊCH KHAI GIẢNG</h3>
             <div class="container">
             
            @foreach($schedules as $key => $schedule_off)
            <div class="table-lich table-responsive-md">
              <div class="title btn-gradient text-white rounded-0"><h4 class="text-left">{{$key}} (tel: {{$schedule_off[0]->phone_1}})</h4></div>
              <table class="lich w-100">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">Lớp học</th>
                    <th  scope="col">Khóa học</th>
                    <th class="text-center"  scope="col">Thời gian học</th>
                    <th class="text-center"  scope="col">Khai giảng</th>
                    <th class="text-center"  scope="col">Đăng ký</th>
                  </tr>
                </thead>
                <tbody>
                
                  @foreach($schedule_off as $off)
                  <tr>

                    <th class="text-center"  scope="row">{{$off->schedule_name}}</th>
                    <td>{{$off->course_name}} ({{$off->level}})</td>
                    <td class="text-center" ><p class="day"><b>{{$off->schedule}}</b></p><p>{{$off->schedule_detail}}</p></td>
                    <td class="text-center" >{{date('d-m-Y', strtotime($off->opening))}}</td>
                    <td class="text-center" ><input name="radio" value="Đăng ký"  class="radio radio-btn btn btn-danger" type="button" data-course_id="{{$off->course_id}}" data-schedule_id="{{$off->schedule_id}}"  data-address_id="{{$off->contact_address_id}}"/></td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
   
            @endforeach
            </div>
    </div>

                    <script type="text/javascript">
           
            
             $(".radio").on('click',function(){
         
                 $(".pick_course").val($(this).data('course_id')).change();
                 $(".your_local").val($(this).data('address_id')).change();
                   
                 

            });

            </script>


@stop