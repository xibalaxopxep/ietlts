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
            <div class="col-md-3">
              <div class="item" style="background: url({{asset($record->avatar)}}) no-repeat;">
                <h4>{{$record->name}}</h4>
                <p>8.5 IELTS</p>
              </div>
            </div>
          @endforeach
          </div>
        </div>
      </section>
      <section class="about">
        <div class="container">
          <div class="row">
            <div class="col-md-7 offset-md-5">
              <div class="content">
                <h4>GIẢNG VIÊN PASAL - <b>NGƯỜI TRUYỀN LỬA</b></h4>
                <span class="description"><img src="assets/icon/flame.png" alt="icon" />What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?</span>
                <span class="description"><img src="assets/icon/flame.png" alt="icon" />What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?</span>
                <span class="description"><img src="assets/icon/flame.png" alt="icon" />What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?</span>
                <span class="description"><img src="assets/icon/flame.png" alt="icon" />What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?</span>
                <span class="description"><img src="assets/icon/flame.png" alt="icon" />What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?</span>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
    @stop