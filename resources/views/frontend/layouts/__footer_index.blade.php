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

            @foreach($contact_address_footer as $ct_f)
            <p>{{$ct_f->name}} | {{$ct_f->phone_1}}</p>
            @endforeach
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
              <div class="fb-page" data-href="https://www.facebook.com/PasalEnglish/" data-tabs="timeline" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/PasalEnglish/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/PasalEnglish/">Tiếng Anh giao tiếp Pasal</a></blockquote></div>
            </div>
            

<div class="g-ytsubscribe" data-channel="Go6acmPP2CN7ATFO7urZIV9gogleDevelopers" data-layout="full" data-count="default"></div>
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
 

  
<!-- <script src="https://apis.google.com/js/platform.js"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
      <!-- Magnific Popup core JS file -->
      <script src="{{asset('assets_pasal/magnific-popup/jquery.magnific-popup.js')}}"></script>
      <script src="{{asset('assets_pasal/js/owl.carousel.min.js')}}"></script>
      <script src="{{asset('assets_pasal/js/style.js?v=2.14')}}"></script>
    </footer>
    </html>