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
       <section id="form" style="background: url(assets/img/background/pattern-2.png) var(--main-color) no-repeat;background-size: cover;">
        <img id="pattern-1" src="assets/img/background/pattern-1.png" alt="pattern" />
        <div class="container">
          <div class="row">
            <div class="form-wrapper">
              <div class="col-md-6 simon">
                <img src="assets/img/simon.png" alt="simon ielts">
              </div>
              <div class="form-content">
                <div class="col-md-6 offset-md-6">
                  <form>
                    <h4><b>ĐĂNG KÝ TƯ VẤN</b> LỘ TRÌNH HỌC IELTS</h4>
                    <p>Pasal cam kết giúp bạn chinh phục mục tiêu IELTS với lộ trình học tinh gọn - hiệu quả - tối ưu chi phí !</p>
                    <div class="form-group">
                      <img class="icon" src="assets/icon/user.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Nhập họ tên của bạn*"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="assets/icon/phone.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Số điện thoại của bạn*"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="assets/icon/mail.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Email của bạn*"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="assets/icon/course.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Bạn quan tâm đến khóa học nào?"/>
                    </div>
                    <div class="form-group">
                      <img class="icon" src="assets/icon/location.png" alt="icon" />
                      <select name="location">
                        <option value="" disabled selected>Chọn cơ sở Pasal gần bạn nhất*</option>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
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
<!--/main-->
@stop