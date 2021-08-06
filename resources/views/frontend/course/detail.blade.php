@extends('frontend.layouts.master_news')
@section('content')
 <div class="banner">
        <img src="{{asset('assets_pasal/img/banner-pp.png')}}" class="img-fluid" alt="banner"/>
      </div>
 
   

        <section class="about py-4">
        <div class="container">
          <div class="lotrinh-about box-shadow">       
            <div class="row">
               <h3 class="text-center" class="mt-30">{{$record->title}} ({{$record->level}}) <b>DÀNH CHO AI?</b></h3>  
              {!!$record->course_for!!}
            </div>
          </div>
        </div>
      </section>

      <section class="lotrinh-loiich py-40">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h4>LỢI ÍCH CỦA KHOÁ HỌC<br><b>{{$record->title}} ({{$record->level}})</b></h4>
             <span class="description">{!!$record->summary!!}</span>
              <img class="thumbnail" src="{{asset($record->image)}}" alt="Lộ trình PROIELTS">
            </div>
            <div class="col-md-6 list-item">
              <div class="row">
              @php
                    $content = explode('|', $record->course_profit);
                @endphp
                <div class="col-sm-6">
                  <div class="item item-1">
                    <img class="thumbnail-item" src="{{asset('assets_pasal/icon/lotrinh1.png')}}" />
                    <p>{!!$content[0]!!}</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="item item-2">
                    <img class="thumbnail-item" src="{{asset('assets_pasal/icon/lotrinh2.png')}}"  />
                    <p>{!!$content[1]!!}</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="item item-3">
                    <img class="thumbnail-item" src="{{asset('assets_pasal/icon/lotrinh3.png')}}"  />
                    <p>{!!$content[2]!!} </p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="item item-4">
                    <img class="thumbnail-item" src="{{asset('assets_pasal/icon/lotrinh4.png')}}" />
                    <p>{!!$content[3]!!}</p>
                  </div>
                </div>
                <img id="lotrinh-loiich-pattern-1" src="{{asset('assets_pasal/img/pattern-13.png')}}" alt="pattern" />
                <img id="lotrinh-loiich-pattern-2" src="{{asset('assets_pasal /img/pattern-13.png')}}" alt="pattern" />
              </div>
            </div>
          </div>
        </div>
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
                <a href="#form" class="btn-white w-100">ĐĂNG KÝ TƯ VẤN NGAY</a>
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
                  @php
                    $data = [];
                    if($record->course_method != null){
                         $data = explode('|',$record->course_method);
                    }     
                  @endphp
                 @if($data != null)
                 @if(count($data) >=1 || count($data) >=2)
                <div class="w-100 d-flex">
                  @if(count($data) >=1)
                    <div class="item" style="background: url(/assets_pasal/icon/1.png) no-repeat">
                       {!!$data[0]!!}
                    </div>
                    <div class="col-md-3"></div>
                    @endif
                    @if(count($data) >=2)
                    <div class="item" style="background: url(/assets_pasal/icon/2.png) no-repeat">
                         {!!$data[1]!!}
                    </div>
                    @endif
                  </div>
                  @endif

                
                <div class="w-100 d-flex mt-40">
                  @if(count($data) >=3 || count($data)>=4)
                     @if(count($data) >= 3)
                    <div class="item" style="background: url(/assets_pasal/icon/3.png) no-repeat">
                        {!!$data[2]!!}
                    </div>
                    <div class="col-md-3"></div>
                    @endif
                    @if(count($data) == 4)
                    <div class="item" style="background: url(/assets_pasal/icon/4.png) no-repeat">
                        {!!$data[3]!!}
                    </div>
                    @endif
                        @endif
                </div>
            
                @endif
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

      <div class="container">
             
        @foreach($schedules as $key => $schedule_off)
        <div class="table-lich table-responsive-md">
          <div class="title btn-gradient text-white rounded-0"><h4 class="text-left">{{$key}} (tel: {{$schedule_off[0]->phone_1}})</h4></div>
          <table class="lich w-100">
            <thead>
              <tr>
                <th scope="col">Lớp học</th>
                <th scope="col">Khóa học</th>
                <th scope="col">Thời gian học</th>
                <th scope="col">Khai giảng</th>
                <th scope="col">Đăng ký</th>
              </tr>
            </thead>
            <tbody>
            
              @foreach($schedule_off as $off)
              <tr>

                <th scope="row">{{$off->schedule_name}}</th>
                <td>{{$off->course_name}} ({{$off->level}})</td>
                <td><p class="day"><b>{{$off->schedule}}</b></p><p>{{$off->schedule_detail}}</p></td>
                <td>{{date('d-m-Y', strtotime($off->opening))}}</td>
                <td><input  name="radio" value="Đăng ký"  class="radio btn btn-danger" type="button" data-course_id="{{$off->course_id}}" data-schedule_id="{{$off->schedule_id}}"  data-address_id="{{$off->contact_address_id}}"/></td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>

        @endforeach
        </div>
<!--/main-->
@stop