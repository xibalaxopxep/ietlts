@extends('frontend.layouts.master_news')
@section('content')
      <div class="content news-deital bg-grey-2">
        <div class="container">
          <div class="row">
            <div class="col-md-9 mt-4">
              <div class="content" >
                <div class="sumary mt-30" id="contents">
               
                       <img src="{{asset($record->images)}}" style="width: 100%;" alt="{{$record->images}}" />
                       <div id='console'></div>
                            <div id="toc">
                            <b style="margin-bottom: 20px; display: block;">NỘI DUNG CHÍNH</b>
                            </div>
                       {!!$record->content!!}
                      </div>
                      <div class="related-news mt-30">
                        <h3> Bài viết liên quan</h3>
                        @foreach($related_news as $related_new )
                        <h4><a href="{{route('news.detail',$related_new->alias)}}">{{$related_new->title}}</a></h4>
                        @endforeach
                      </div>
                    </div>
                    <div class="maybe-news">
                      <h4 class="w-100 py-3 p-3">Có thể bạn quan tâm</h4>
                       @foreach($featured_news as $featured_new )
                      <div class="col-md-6 sub">
                        <div class="item">
                          <div class="thumbnail">
                            <div class="thumbnail">
                              <img class="img-responsive" src="{{asset($featured_new->images)}}" alt="tiêu đề bài viết">
                            </div>
                            <h4 class="title">
                              <a href="{{route('news.detail',$featured_new->alias)}}">{{$featured_new->title}}</a>
                            </h4>
                            <a href="{{route('news.detail',$featured_new->alias)}}" class="view-more">Đọc thêm</a>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="col-md-3 pull-right">
                    <img id="ads-sidebar" class="img-responsive" src="{{asset('assets_pasal/img/advertise.png')}}" alt="quảng cáo" />
                    <div class="form-sidebar mt-4" id="form">
                      <h4>ĐĂNG KÝ TƯ VẤN<br><b>LỘ TRÌNH HỌC IELTS</b></h4>
                      <div class="form-group">
                        <img class="icon" src="{{asset('assets_pasal/icon/user.png')}}" alt="icon" />
                        <input name="name" type="text" required="required" placeholder="Nhập họ tên của bạn*"/>
                      </div>
                      <div class="form-group">
                        <img class="icon" src="{{asset('assets_pasal/icon/phone.png')}}" alt="icon" />
                        <input name="name" type="text" required="required" placeholder="Số điện thoại của bạn*"/>
                      </div>
                      <div class="form-group">
                        <img class="icon" src="{{asset('assets_pasal/icon/mail.png')}}" alt="icon" />
                        <input name="name" type="text" required="required" placeholder="Email của bạn*"/>
                      </div>
                      <div class="form-group">
                        <img class="icon" src="{{asset('assets_pasal/icon/course.png')}}" alt="icon" />
                        <input name="name" type="text" required="required" placeholder="Bạn quan tâm đến khóa học nào?"/>
                      </div>
                      <div class="form-group">
                        <img class="icon" src="{{asset('assets_pasal/icon/location.png')}}" alt="icon" />
                        <select name="location">
                        <option value="" disabled selected>Chọn cơ sở Pasal gần bạn nhất*</option>
                        @foreach($contact_address as $add)
                        <option value="">{{$add->name}}</option>
                        @endforeach
                      </select>
                      </div>
                      <button class="button-form btn-gradient w-100 mt-2">ĐĂNG KÝ NGAY</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!--/main-->
@stop