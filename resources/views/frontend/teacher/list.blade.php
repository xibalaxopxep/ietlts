 @extends('frontend.layouts.master')
@section('content')
 <div class="banner">
        <img src="assets_pasal/img/banner-giaovien.png" class="img-fluid" alt="banner"/>
      </div>
      <div id="content" class="teacher-page">
      <section class="teacher">
        <h3>ĐỘI NGŨ <b>GIẢNG VIÊN IELTS</b> TẠI PASAL</h3>
          <div class="container">
          <div class="row mt-30">
          <div class="owl-carousel owl-theme teacher-slide">
            @foreach($records as $record)
              @if ($loop->index%2 == 0)
              <div class="flex-container">
              @endif
              
              <div class="item" style="background: url({{asset($record->avatar)}}) no-repeat;">
                <h4>{{$record->name}} {{$loop->index}}</h4>
                <p>8.5 IELTS</p>
              </div>
              @if ($loop->index%2 == 1)
              </div>
              @endif
              
          @endforeach
          </div>
          </div>
        </div>
      </section>
     @foreach($block as $bl)
         @if($bl->position == "giang-vien")
             {!!$bl->content!!}
         @endif
     @endforeach

    </div>
    @stop