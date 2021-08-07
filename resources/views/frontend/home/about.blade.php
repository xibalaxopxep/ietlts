@extends('frontend.layouts.master')
@section('content')
    <div class="banner">
        <img src="/assets_pasal/img/banner-giaovien.png" class="img-fluid" alt="banner">
      </div>
<!-- content -->
<div class="about-page">
<img id="background-about" src="/assets_pasal/img/img-about.png" alt="GIỚI THIỆU VỀ TỔ CHỨC ĐÀO TẠO PASAL" />
<div class="container">
    <div class="row">
    
        <div class="col-md-6 offset-md-6">
            <div class="text-info text-white">
                <h3>{!!$about->title!!}</h3>
         {!!$about->description!!}
            </div>
        </div>
    </div>
    
</div>
</div>
<div class="content-about-page py-40">
    <div class="container">
        <div class="row">
        <div class="content">
             {!!$about->content!!}
        </div>
        </div>
    </div>
</div>
<section class="number bg-white py-40">
<h3 class="mb-40"><b>PASAL</b> VÀ NHỮNG CON SỐ</h3>
    <div class="container">
        <div class="row">
            <div class="item col-md-3 col-xs-6 text-center">
                <img class="icon" src="/assets_pasal/icon/about-1.png" alt="icon"/>
                <p style="margin-top: 10px; margin-bottom: 0px;"><b>08 Trung tâm</b></p>
                <p>trên toàn quốc</p>
            </div>
            <div class="item col-md-3 col-xs-6 text-center">
                <img class="icon" src="/assets_pasal/icon/about-2.png" alt="icon"/>
                <p style="margin-top: 10px; margin-bottom: 0px;"><b>03 Chuyên gia</b></p>
                <p>hàng đầu thế giới</p>
            </div>
            <div class="item col-md-3 col-xs-6 text-center">
                <img class="icon" src="/assets_pasal/icon/about-3.png" alt="icon"/>
                <p style="margin-top: 10px; margin-bottom: 0px;"><b>12000+ Học viên</b></p>
                <p>mỗi năm tin chọn</p>
            </div>
            <div class="item col-md-3 col-xs-6 text-center">
                <img class="icon" src="/assets_pasal/icon/about-4.png" alt="icon"/>
                <p style="margin-top: 10px; margin-bottom: 0px;"><b>97% Học viên</b></p>
                <p>đạt mục tiêu đầu ra</p>
            </div>
        </div>
    </div>
</section>
<style>
.number b
{
    color: var(--main-color);
}
</style>
@stop