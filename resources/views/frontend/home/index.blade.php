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
                  <a class="btn bg-main">Xem tiếp</a>
                  <div class="description">
                    {!!$tem->description!!}
                  </div>
                </div>
              </div>              
            </div>
           @endforeach
          </div>
          <div class="w-100 text-center" style="margin-top: 40px;">
          <a class="btn btn-submary">ĐĂNG KÝ NHẬN LỘ TRÌNH HỌC NGAY</a>
            </div>
      </section>
      </div>
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
      </section>
      <section id="form" style="background: url(assets_pasal/img/background/pattern-2.png) var(--main-color) no-repeat;background-size: cover;">
         @foreach($block as $bl)
          @if($bl->position == "dang-ky-footer")
          {!!$bl->content!!}
          @endif
        @endforeach
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
    
   

