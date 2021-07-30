         
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
    <iframe width="560" height="315" id="video-player" class="hidden" src="https://www.youtube.com/embed/iAlCEiAvnw4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
 
 

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
      <!-- Magnific Popup core JS file -->
      <script src="{{asset('assets_pasal/magnific-popup/jquery.magnific-popup.js')}}"></script>
      <script src="{{asset('assets_pasal/js/owl.carousel.min.js')}}"></script>
      <script src="{{asset('assets_pasal/js/style.js?v=2.15')}}"></script>
    </footer>
    </html>