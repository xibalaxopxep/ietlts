@extends('frontend.layouts.master_index')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
      <div class="banner">
        <img src="assets_pasal/img/banner-lichkhaigiang.png" class="img-fluid" alt="banner"/>
      </div>
      <div id="content">
        <div class="lichkhaigiang-page">
          <div class="container">
            <div class="search-form">
              <h3><b>ĐĂNG KÝ</b> HỌC</h3>
              <form id="form" action="{!!route('home.sign_up_advise2')!!}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                  <div class="row d-flex">
                    <div class="form-group col-md-3">
                      <img class="icon" src="assets_pasal/icon/user.png" alt="icon" />
                      <input name="name" type="text" required="required" placeholder="Nhập họ tên của bạn*"/>
                    </div>
                    <div class="form-group col-md-3">
                      <img class="icon" src="assets_pasal/icon/phone.png" alt="icon" />
                      <input name="phone" type="text" required="required" placeholder="Nhập số điện thoại của bạn*"/>
                    </div>
                    <div class="form-group col-md-3">
                      <img class="icon" src="assets_pasal/icon/mail.png" alt="icon" />
                      <input  name="email" type="email" required="required" placeholder="Nhập email của bạn*"/>
                    </div>
                    </div>
                     <div class="row d-flex">
                    <div class="form-group col-md-3">
                      <img class="icon" src="assets_pasal/icon/course.png" alt="icon" />
                       <select required="" name="course_id" class="pick_course">
                        <option value="" disabled selected>Bạn quan tâm đến khoá học nào?</option>
                        <option value="pro">Lộ trình Pro IELTS</option>
                        <option value="online">Khoá học IELTS Online</option>
                        @foreach($course_shares as $course)
                        <option  value="{{$course->id}}">{!!$course->title!!}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <img class="icon" src="assets_pasal/icon/location.png" alt="icon" />
                       <select required="" name="contact_address_id" class="your_local">
                        <option value="" disabled selected>Chọn cơ sở Pasal gần bạn nhất*</option>
                        @foreach($contact_address as $add)
                        <option value="{{$add->id}}">{!!$add->name!!}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <img class="icon" src="assets_pasal/icon/class.png" alt="icon" />
                       <select  required="" name="schedule_id" class="pick_schedule">
                        <option value="0" disabled selected>Chọn lớp học </option>
                      </select>
                    </div>
                    
                  </div>
                  <button class="button-form btn-gradient">GỬI ĐĂNG KÝ</button>
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
                    <th class="text-center" scope="col">Lớp học</th>
                    <th scope="col">Khóa học</th>
                    <th class="text-center" scope="col">Thời gian học</th>
                    <th class="text-center" scope="col">Khai giảng</th>
                    <th class="text-center"  scope="col">Đăng ký</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($schedule_off as $off)
                  <tr>

                    <td class="text-center" scope="row">{{$off->schedule_name}}</td>
                    <td >{{$off->course_name}} ({{$off->level}})</td>
                    <td class="text-center"><p class="day"><b>{{$off->schedule}}</b></p><p>{{$off->schedule_detail}}</p></td>
                    <td class="text-center">{{date('d-m-Y', strtotime($off->opening))}}</td>
                    <td class="text-center"><input  name="radio"  class="radio" type="radio" data-course_id="{{$off->course_id}}" data-schedule_id="{{$off->schedule_id}}"  data-address_id="{{$off->contact_address_id}}"/></td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
            @endforeach
          
            <img class="pt-3 w-100" src="assets_pasal/img/online-class.png" alt="lớp học online" />
             @foreach($schedule_online as $key => $on)
            <div class="table-lich table-responsive-md">
            
              <table class="lich w-100">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">Lớp học</th>
                    <th  scope="col">Khóa học</th>
                    <th class="text-center" scope="col">Thời gian học</th>
                    <th class="text-center" scope="col">Khai giảng</th>
                    <th class="text-center" scope="col">Đăng ký</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center" scope="row">{{$on->schedule_name}}</td>
                    <td >{{$on->course_name}} ({{$on->level}})</td>
                    <td class="text-center"><p class="day"><b>{{$on->schedule}}</b></p><p>{{$on->schedule_detail}}</p></td>
                    <td class="text-center">{{date('d-m-Y', strtotime($on->opening))}}</td>
                    <td class="text-center"><input   type="radio" name="radio" class="radio" data-course_id="{{$on->course_id}}" data-schedule_id="{{$on->schedule_id}}"  data-address_id="{{$on->contact_address_id}}"/></td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
            @endforeach
          </div>
        </div>
      </body>
      <footer>
        <script type="text/javascript">
            $('.pick_course').on('change',function(){
                 $.ajax({
                      url: '{{route("api.get_schedule")}}',
                      type: 'POST',
                      data: {
                        course_id: $(this).val()
                      }
                    }).done(function(resp) {
                      $('.pick_schedule').html(resp);
                    });
            });

             $('.pick_course').on('change',function(){
                 $.ajax({
                      url: '{{route("api.get_schedule")}}',
                      type: 'POST',
                      data: {
                        course_id: $(this).val()
                      }
                    }).done(function(resp) {
                      $('.pick_schedule').html(resp);
                    });
            });
            
             $(".radio").on('change',function(){
         
                 $(".pick_course").val($(this).data('course_id')).change();
                 $(".your_local").val($(this).data('address_id')).change();
                   $.ajax({
                      url: '{{route("api.get_schedule")}}',
                      type: 'POST',
                      data: {
                        course_id: $(this).data('course_id')
                      }
                    }).done(function(resp) {
                      $('.pick_schedule').html(resp);
                    });
                    $(".pick_schedule").val($(this).data('schedule_id')).change();
                 

            });



        </script>
        
        <!-- Magnific Popup core JS file -->
        <script src="assets_pasal/magnific-popup/jquery.magnific-popup.js"></script>
        <script src="assets_pasal/js/style.js"></script>
      </footer>
      </html>
@stop