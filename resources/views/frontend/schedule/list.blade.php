@extends('frontend.layouts.master')
@section('content')


      <div class="banner">
        <img src="assets_pasal/img/banner-lichkhaigiang.png" class="img-fluid" alt="banner"/>
      </div>
      <div id="content">
        <div class="lichkhaigiang-page">
          <div class="container">
            <div class="search-form">
              <h3><b>ĐĂNG KÝ</b> HỌC</h3>
              <form id="form" method="POST">
                <div class="container">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <img class="icon" src="assets_pasal/icon/user.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Nhập họ tên của bạn*"/>
                    </div>
                    <div class="form-group col-md-3 offset-md-1">
                      <img class="icon" src="assets_pasal/icon/phone.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Nhập số điện thoại của bạn*"/>
                    </div>
                    <div class="form-group col-md-3 offset-md-1">
                      <img class="icon" src="assets_pasal/icon/mail.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Nhập email của bạn*"/>
                    </div>
                    <div class="form-group col-md-3">
                      <img class="icon" src="assets_pasal/icon/course.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Bạn quan tâm đến khóa học nào?"/>
                    </div>
                    <div class="form-group col-md-3 offset-md-1">
                      <img class="icon" src="assets_pasal/icon/location.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Chọn cơ sở Pasal gần bạn nhất*"/>
                    </div>
                    <div class="form-group col-md-3 offset-md-1">
                      <img class="icon" src="assets_pasal/icon/class.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Chọn lớp học*"/>
                    </div>
                    <button class="button-form btn-gradient">GỬI ĐĂNG KÝ</button>
                  </div>
                </div>
              </form>
            </div>
            <img class="pt-3 w-100" src="assets_pasal/img/offline-class.png" alt="lớp học offline" />
            @foreach($schedule_offline as $key => $schedule_off)
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
                    <td><input type="checkbox" /></td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
            @endforeach
          
            <img class="pt-3 w-100" src="assets_pasal/img/online-class.png" alt="lớp học online" />
             @foreach($schedule_online as $key => $schedule_on)
            <div class="table-lich table-responsive-md">
              <div class="title btn-gradient text-white rounded-0"><h4 class="text-left">{{$key}} (tel: {{$schedule_on[0]->phone_1}})</h4></div>
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
                  @foreach($schedule_on as $on)
                  <tr>
                    <th scope="row">{{$on->schedule_name}}</th>
                    <td>{{$on->course_name}} ({{$on->level}})</td>
                    <td><p class="day"><b>{{$on->schedule}}</b></p><p>{{$on->schedule_detail}}</p></td>
                    <td>{{date('d-m-Y', strtotime($on->opening))}}</td>
                    <td><input type="checkbox" /></td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
            @endforeach
          </div>
        </div>
      </body>
      <footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
        <!-- Magnific Popup core JS file -->
        <script src="assets_pasal/magnific-popup/jquery.magnific-popup.js"></script>
        <script src="assets_pasal/js/style.js"></script>
      </footer>
      </html>
@stop