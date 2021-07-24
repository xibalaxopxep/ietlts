@extends('frontend.layouts.master')
@section('content')
 <div class="banner">
        <img src="assets_pasal/img/banner-thanhtich.png" class="img-fluid" alt="banner"/>
      </div>
      <div class="content thanhtich bg-grey">
        <div class="container">
          <div class="row">
          	@foreach($records as $record)
            <div class="col-md-3">
              <div class="item">
                <div class="thumbnail">
                  <a  href="assets/img/thanhtich.png" class="image-link"><img class="img-responsive img-thanhtich" src="{{$record->image}}" alt="thanhtich" /></a>
                  <img class="zoom" src="assets_pasal/icon/zoom.png" alt="zoom">
                </div>
                <h4>{{$record->name}}</h4>
                <span><b>{{$record->point}}</b> Ielts</span>
                <p class="description">Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place ...</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
@stop