@extends('frontend.layouts.master')
@section('content')


<div class="banner">
        <img src="assets_pasal/img/banner-pp.png" class="img-fluid" alt="banner"/>
      </div>
      <section class="about py-4">
        <div class="container">
          <div class="pp-about box-shadow">   
          <img id="pattern-about-2" src="assets_pasal/img/pattern-1.png" alt="pattern" />
          <img id="pattern-about-3" src="assets_pasal/img/pattern-2.png" alt="pattern" />    
            <div class="row">
              <div class="col-md-5" style="position: relative;">
              <div id="pattern-about-4" class="open-video" data-video="{!!$record->link_video!!}">
                <img src="assets_pasal/img/pattern-about.png" alt="pattern"  />
              </div>
                <img src="assets_pasal/img/about-1.png" alt="pasal simon" class="img-fluid" />
              </div>
              <div class="col-md-7 info">
                <h3 class="mt-30">HỆ THỐNG <br><b>LUYỆN THI <strong>IELTS ĐỘC QUYỀN</strong> TỪ SIMON CORCORAN</b></h3>
                <span>{!!$record->description!!}.</span>
              </div>
            </div>
            {!!$record->profit!!}
            <div class="text-center mt-30">
              <a href="#form" class="btn-about fs-23">ĐĂNG KÝ TƯ VẤN NGAY</a>
            </div>
          </div>
        </div>
      </section>
      <section class="pp-uudiem py-40">
        <img id="pattern-pp-udiem" src="/assets_pasal/img/pattern-pp.png" alt="pattern"/>
        <div class="container" style="position: relative;">
          <div class="row">
            {!!$record->content!!}
          </div>
        </div>
      </section>
      <section class="recent-news bg-grey">
        <h3 class=""><b>HƯỚNG DẪN LUYỆN THI IELTS </b>CỦA SIMON</h3>
        <div class="container">
          <div class="row">
          	@foreach($news as $news)
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

		<section class="video-block py-40">
		        <h3 class=""><b>VIDEO HỌC IELTS </b>ĐỘC QUYỀN TỪ SIMON</h3>
		        <div class="container">
		          <div class="row">
		          	@foreach($videos as $video)
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


 

         <section class="testimonial">
        <h3 class="mb-30">HỌC VIÊN<b> TIÊU BIỂU</b></h3>
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