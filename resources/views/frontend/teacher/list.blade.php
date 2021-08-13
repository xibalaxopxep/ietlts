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
            @foreach($records as $record)
            <div class="col-md-4">
              <div class="item" style="background: url({{asset($record->avatar)}}) no-repeat;">
                <h4>{{$record->name}}</h4>
                <p>8.5 IELTS</p>
              </div>
            </div>
          @endforeach
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