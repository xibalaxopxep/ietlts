@extends('mobile.layouts.master')
@section('content')
<div id="notification-success" class="notification-fixed bg-green-dark">
    <div class="notification-icon">
        <em><i class="fa fa-bell"></i></em>
        <span>Thông báo</span>
        <a href="#"><i class="fa fa-times-circle"></i></a>
    </div>
    <p id="notification">Sản phẩm đã được thêm vào giỏ hàng</p>
</div>
<div id="notification-error" class="notification-fixed bg-red-dark">
    <div class="notification-icon">
        <em><i class="fa fa-bell"></i></em>
        <span>Thông báo</span>
        <a href="#"><i class="fa fa-times-circle"></i></a>
    </div>
    <p id="notification-err">Thêm giỏ hàng thất bại</p>
</div>
<div class="page-content header-clear-large" id="product-detail">
    <div class="single-slider owl-carousel owl-has-dots gallery bottom-20">
        @foreach($image_arr as $image)
        <a class="show-gallery" href="{{$image}}"><img src="{{$image}}" alt="{{$record->title}}" style="object-fit: contain;"></a>
        @endforeach
    </div>
    <div class="content">
        <div class="store-product">
            <h2 class="store-product-title">{{$record->title}}</h2>
            @if($record->sale_price >0)
            <span class="store-product-price"><em><del>{{$record->getPrice()}}</del></em><strong>{{$record->getSalePrice()}}</strong></span>
            @else
            <span class="store-product-price"><strong>{{$record->getPrice()}}</strong></span>
            @endif
        </div>
        <div class="decoration top-20 bottom-20"></div>
        <div style="display: inline-flex; width: 100%;" class="body-info flex">
            <div class="inline-dropdown-container">
                <div class="dropdown-wrapper-2" style="width: 100%;">
                    <span class="dropdown-icon"></span>
                    <select id="quantity" class="form-control" style="width: 100%; height: 100%;">
                        <option value="1">Số lượng: 1</option><option value="2">Số lượng: 2</option>
                        <option value="3">Số lượng: 3</option><option value="4">Số lượng: 4</option>
                        <option value="5">Số lượng: 5</option><option value="6">Số lượng: 6</option>
                        <option value="7">Số lượng: 7</option><option value="8">Số lượng: 8</option>
                        <option value="9">Số lượng: 9</option><option value="10">10+</option>
                    </select></div>
            </div>
            <a href="javascript:void(0);" data-action="add-to-cart" data-product_id="{{$record->id}}" class="button button-alagreen button-icon button-full button-sm shadow-small button-rounded uppercase ultrabold"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
        </div>

        <div class="decoration top-20"></div>
    </div>
    <div class="content bottom-20 top-30">
        <h1>Mô tả chi tiết</h1>
    </div>
    <div class="content">
        <div class="product-content">
            {!! $record->content !!}
        </div>
        <a href="#" class="read-more-show top-15 color-alagreen">Đọc thêm <i class="fa fa-caret-down"></i></a>
        <a href="#" class="read-less-show top-15 color-alagreen" style="display:none">Rút gọn <i class="fa fa-caret-up"></i></a>
        <div class="decoration"></div>
    </div>
    <div class="content bottom-20 top-30">
        <h1>Thông số kĩ thuật</h1>
    </div>
    <div class="content">
        <table class="table-borders-dark store-product-table">
            @foreach ($attribute_arr as $key => $attribute)
            <tr>
                <td class="bold color-black">{!! $attribute['title'] !!}</td>
                <td> {!! $attribute['value'] !!}</td>
            </tr>
            @endforeach
        </table>
        <div class="decoration"></div>
    </div>

    <div class="content bottom-10 top-20">
        <h1>Sản phẩm tương tự</h1>
    </div>
    <div class="product-detail-slider owl-carousel owl-has-dots bottom-15 pad-left-right" id="sale-product">
        @foreach($related_product as $item)
        <div class="store-featured-1">
            <a href="{{$item->url()}}"><img src="{{$item->getImage()}}" alt="{{$item->title}}"></a>
            @if($item->sale_price >0)
            <u>{{$item->getSalePrice()}}</u>
            <del>{{$item->price}}</del>
            @elseif($item->price > 0)
            <u>{{$item->getPrice()}}</u>
            @else
            <u>Giá: Liên hệ</u>
            @endif
            <a href="{{$item->url()}}"><strong>{{$item->title}}</strong></a>
        </div>
        @endforeach
    </div>

    <div class="decoration"></div>

    <div class="content bottom-10 top-20">
        <h1>Sản phẩm đã xem</h1>
    </div>
    <div class="product-detail-slider owl-carousel owl-has-dots bottom-15 pad-left-right" id="sale-product">
        @foreach($viewed_products as $item)
        <div class="store-featured-1">
            <a href="{{$item->url()}}"><img src="{{$item->getImage()}}" alt="{{$item->title}}"></a>
            @if($item->sale_price >0)
            <u>{{$item->getSalePrice()}}</u>
            <del>{{$item->price}}</del>
            @elseif($item->price > 0)
            <u>{{$item->getPrice()}}</u>
            @else
            <u>Giá: Liên hệ</u>
            @endif
            <a href="{{$item->url()}}"><strong>{{$item->title}}</strong></a>
        </div>
        @endforeach
    </div>
</div>
@stop