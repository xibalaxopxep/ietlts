@extends('mobile.layouts.master')
@section('content')
<div class="page-content header-clear-large product-page">
    <div class="filter-attribute">
        <form action="{{route('product.index')}}" method="get" id="filterProduct">
            <input type="hidden" id="category_id" name="category_id" value=" @if(isset($search['category_id'])) {{$search['category_id']}}@endif"/>
            <div class=" select-box select-box-2 bottom-15">
                <select class="chosen-select" id="category_select">
                    <option value="0">Tất cả danh mục</option>
                    @foreach($category_arr as $category)
                    <option value="{{$category->id}}" @if(isset($search['category_id']) && $category->id == $search['category_id']) selected @endif>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" class="attribute_id" name="attribute_id" value=" @if(isset($search['attribute_id'])) {{$search['attribute_id']}} @endif">
            @foreach($attribute_arr as $attribute)
            <div class="select-box select-box-2 bottom-15" >
                <select class="chosen-select attribute_select">
                    <option value="0">{{$attribute->title}}</option>
                    @foreach($attribute->children as $children)
                    <option value="{{$children->id}}" @if(isset($search['attribute_arr']) && in_array($children->id, $search['attribute_arr'])) selected @endif>{{$children->title}}</option>
                    @endforeach
                </select>
            </div>
            @endforeach
        </form>
    </div>
    <div class="category ptb-15 bottom-15">
        <div class="content-title bottom-15 top-15">
            <h1>Danh mục sản phẩm</h1>
            <a href="{{route('product.index')}}" class="color-highlight">Xem tất cả</a>
        </div>
        <div class="pad-left-right">
            <div class="product-slider owl-carousel owl-no-dots">
                @if($current_category->children)
                    @foreach($current_category->children as $children)
                    <div class="item">
                        <article class="item-content">
                            <figure>
                                <a href="{{route('product.index', ['category_id' => $children->id])}}">
                                    <img src="{{$children->image}}" alt="{{$children->title}}">
                                </a>
                            </figure>
                            <div class="post_info">
                                <h2 class="post-title text-center"><a href="{{route('product.index', ['category_id' => $children->id])}}">{{$children->title}}</a></h2>
                            </div>
                        </article>
                    </div>

                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="content-title bottom-30 top-30">
        <h1>Sản phẩm mới</h1>
    </div>
    <div class="bottom-30 pad-left-right">
        <div class="product-slider owl-carousel owl-no-dots">
            @foreach($new_products as $new_product)
            <div class="item">
                <article class="item-content">
                    <figure>
                        <a href="{{$new_product->url()}}">
                            <img src="{{$new_product->getImage()}}" alt="{{$new_product->title}}">
                        </a>
                    </figure>
                    <div class="post_info">
                        <h2 class="post-title text-center"><a href="{{$new_product->url()}}">{{$new_product->title}}</a></h2>
                    </div>
                    <div class="store-slide-price">
                        @if ($new_product->sale_price)
                        <strong>{{$new_product->getSalePrice()}}<br> <del>{{$new_product->getPrice()}}</del></strong>
                        @elseif ($new_product->price)
                        <strong>{{$new_product->getPrice()}}</strong><br><del></del>
                        @else
                        <strong>Liên hệ</strong><br><del></del>
                        @endif
                        <div class="clear"></div>
                    </div>
                </article>
            </div>

            @endforeach
        </div>
    </div>

    <div class="content-title bottom-20">
        <h1>Có {{$records->total()}} sản phẩm</h1>
    </div>
    <div id="list-recommended-product">
        @if($records->count() > 0)
        @foreach ($records as $record)
        <div class="store-slide-1">
            <a href="{{$record->url()}}" class="store-slide-image"><img src="{{$record->getImage()}}" alt="{{$record->title}}"></a>
            <div class="store-slide-title top-10 bottom-5">
                <a href="{{$record->url()}}"><h5 class="bottom-0 center-text">{{$record->title}}</h5></a>
            </div>
            <div class="store-slide-price ">
                @if ($record->sale_price)
                <strong>{{$record->getSalePrice()}}<br> <del>{{$record->getPrice()}}</del></strong>
                @elseif ($record->price)
                <strong class="center-text">{{$record->getPrice()}}</strong><br><del></del>
                @else
                <strong class="center-text">Liên hệ</strong><br><del></del>
                @endif
                <div class="clear"></div>
            </div>
        </div>
        @endforeach
        {!!$records->render()!!}
        @else
        <div class="col-md-12">
            <h4>Không tìm thấy kết quả nào</h4>
        </div>
        @endif
    </div>
</div>

@stop