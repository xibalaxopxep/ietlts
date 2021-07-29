
@extends('frontend.layouts.master_index')
@section('content')

@if($record->position == "lo-trinh")
<script type="text/javascript">
	$("#dang_ky").hide();
</script>
@endif


{!!$record->content!!}
@if($include_news != "")
 <section class="recent-news bg-grey">
        <h3 class=""><b>HƯỚNG DẪN LUYỆN THI IELTS </b>CỦA SIMON</h3>
        <div class="container">
          <div class="row">
          	@foreach($include_news as $news)
            <div class="col-md-4">
              <div class="card-news">
                <div class="thumbnail">
                  <a style="color: #342b7a;" href="{{route('news.detail',$news->alias)}}"><img class="img-fluid" src="{{asset($news->images)}}" alt="tiêu đề bài viết"></a>
                </div>
                <div class="info d-flex">
                  <div class="calendar">
                    <p>{{ date('M', strtotime($news->created_at)) }}</p>
                    <b>{{ date('d', strtotime($news->created_at)) }}</b>
                  </div>
                  <h4><a style="color: #342b7a;" href="{{route('news.detail',$news->alias)}}">{{$news->title}}</a></h4>
                </div>
              </div>
            </div>
              @endforeach
          </div>
        </div>
      </section>
@endif

@if($include_video != "")
<section class="video-block py-40">
        <h3 class=""><b>VIDEO HỌC IELTS </b>ĐỘC QUYỀN TỪ SIMON</h3>
        <div class="container">
          <div class="row">
          	@foreach($include_video as $video)
            <div class="col-md-3">
              <div class="item">
              	@php
	              	$id = explode('=',$video->video_url);
	              	$link =  "https://www.youtube.com/embed/".$id[1];
      
              	@endphp
                <iframe width="560" height="315" src="{{$link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
            @endforeach
          </div>
        </div>
</section>
@endif

@if($include_best != "")
 <section class="testimonial">
        <h3 class="mb-30">CÂU CHUYỆN THÀNH CÔNG<b> CỦA HỌC VIÊN</b></h3>
        <div class="container">
          <div class="row">
          	@foreach($include_best as $best)
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
@endif


@if($include_dangky != "")
        <section  id="form" style="background: url(assets_pasal/img/background/pattern-2.png) var(--main-color) no-repeat;background-size: cover;">
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
      <div style="background-color: white;">
       <div style="background-color: white; margin-right: 100px; margin-left: 100px;" class="table-lich table-responsive-md">
              @foreach($include_dangky as $key => $schedule)
              <div class="title btn-gradient text-white rounded-0"><h4 class="text-left">{{$key}}</h4></div>
              <table class="lich w-100 table">
                <thead>
                  <tr style="background-color: #eee; color: #eb4d37;">
                    <th scope="col">Lớp học</th>
                    <th scope="col">Khóa học</th>
                    <th scope="col">Thời gian học</th>
                    <th scope="col">Khai giảng</th>
                    <th scope="col">Đăng ký</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach($schedule as $off)
                  <tr>
                    <th scope="row">{{$off->schedule_name}}</th>
                    <td>{{$off->course_name}} ({{$off->level}})</td>
                    <td><p class="day"><b>{{$off->schedule}}</b></p><p>{{$off->schedule_detail}}</p></td>
                    <td>{{date('d-m-Y', strtotime($off->opening))}}</td>
                    <td><button style="font-size: 60%; border-radius: 0px;" class="btn-gradient button_dk">Đăng ký</button></td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
       
              @break;
   
              @endforeach
            </div>
            </div>
      @endif


<script type="text/javascript">
     $('.button_dk').on('click',function(){

     });
</script>
@stop