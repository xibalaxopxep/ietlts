@extends('frontend.layouts.master')
@section('content')


 <div class="content news-category bg-grey">
        <div class="container">
          <div class="row">


            <div class="col-md-9">
           
              <div class="lastest">
                <div class="item">
                  <div class="thumbnail">
                    <img class="img-responsive" src="{{asset($records[0]->images)}}" alt="tiêu đề bài viết">
                  </div>
                  <div class="calendar">
                    <p class="day">{{ date('d', strtotime($records[0]->created_at)) }}</p>
                    <p class="month">T{{ date('m', strtotime($records[0]->created_at)) }}</p>
                  </div>
                  <h4 class="title">
                    <a href="#">{{$records[0]->title}}</a>
                  </h4>
                  <a href="{{route('news.detail',$records[0]->alias)}}" class="view-more">Đọc thêm</a>
                </div>
              </div>

              
              <div class="row">
                @foreach($records as $key => $record)
                @if($key > 0)
                <div class="col-md-6 sub">
                  <div class="item">
                    <div class="thumbnail">
                      <div class="thumbnail">
                        <img class="img-responsive" src="{{asset($record->images)}}" alt="tiêu đề bài viết">
                      </div>
                      <div class="calendar">
                        <p class="day">{{ date('d', strtotime($records[0]->created_at)) }}</p>
                        <p class="month">T{{ date('m', strtotime($records[0]->created_at)) }}</p>
                      </div>
                      <h4 class="title">
                        <a href="#">{{$record->title}}</a>
                      </h4>
                      <p class="description">{{$record->description}}</p>

                      <a href="{{route('news.detail',$record->alias)}}" class="view-more">Đọc thêm</a>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
   

              </div>
            </div>

            
            <div class="col-md-3 pull-right">
              <img class="img-responsive" src="assets_pasal/img/advertise.png" alt="quảng c" />
              <div class="sidebar mt-4">
                <div class="recent-news">
                    @foreach($hot_news as $hot)
                  <div class="item-recent">
                    <div class="thumbnail">
                      <img class="img-fluid" src="{{asset($hot->images)}}" alt="tiêu đề bài viết" />
                      <h4 class="title">
                        <a href="#">{{$hot->title}}</a>
                      </h4>
                      <a href="{{route('news.detail',$hot->alias)}}" class="view-more">Đọc thêm</a>
                    </div>
                  </div>
                  @endforeach
                 
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
 
@stop