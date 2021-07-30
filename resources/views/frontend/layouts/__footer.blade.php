           <section id="form" style="background: url(assets_pasal/img/background/pattern-2.png) var(--main-color) no-repeat;background-size: cover;">
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
    </body>
    <footer>
       <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>VỀ CHÚNG TÔI</h4>
                <p>{!!$config->content!!}</p>

            
            <div class="logo-social">
                <a href="{{$config->facebook}}" target="_blank" class="img"><img src="{{asset('assets_pasal/icon/facebook.png')}}" /></a>
                <a href="{{$config->youtube}}" target="_blank" class="img"><img src="{{asset('assets_pasal/icon/youtube.png')}}" /></a>
                <a href="{{$config->instagram}}" target="_blank" class="img"><img src="{{asset('assets_pasal/icon/ins.png')}}" /></a>
                <a href="{{$config->tiktok}}" target="_blank" class="img"><img src="{{asset('assets_pasal/icon/zalo.png')}}" /></a>
            </div>
            <h4 class="mt-4">HỆ THỐNG CƠ SỞ TẠI HÀ NỘI</h4>
            <p>Cơ sở 1: 206, Bạch Mai, Hai Bà Trưng, Hà Nội | 0243.624.8686</p>
            <p>Cơ sở 2: 33 Dương Khuê, Mai Dịch, Cầu Giấy, Hà Nội | 0246.253.8588</p>
            <p>Cơ sở 3: Số 2, ngõ 54, Vũ Trọng Phụng, Thanh Xuân, Hà Nội | 024.3990.3669</p>
            <p>Cơ sở 4: Tầng 2, Số 146 Tây Sơn, Q.Đống Đa, Hà Nội | 0246.292.6968</p>
            </div>
            <div class="col-md-3">
            <h4>BÀI VIẾT MỚI NHẤT</h4>
                <ul class="recent-news">
                  @foreach($news_footer as $n_f)
                      <li><a href="{{route('news.detail',$n_f->alias)}}">{{$n_f->title}}</a></li>
                  @endforeach
                </ul>
            </div>
            <div class="col-md-3">
                <h4>FOLLOW US ON FACEBOOK</h4>
            </div>
            <div class="col-md-12">
                <div class="bottom-footer">
                    <p class="text-center">{{$config->company_name}}</p>
                    <p class="text-center">{{$config->mst}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="video-holder">
    <iframe width="560" height="315" id="video-player" class="hidden" src="/" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="video-holder">
    <iframe width="560" height="315" id="video-player" class="hidden" src="https://www.youtube.com/embed/iAlCEiAvnw4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
 

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
      <!-- Magnific Popup core JS file -->
      <script src="{{asset('assets_pasal/magnific-popup/jquery.magnific-popup.js')}}"></script>
      <script src="{{asset('assets_pasal/js/owl.carousel.min.js')}}"></script>
      <script src="{{asset('assets_pasal/js/style.js')}}"></script>
    </footer>
    </html>