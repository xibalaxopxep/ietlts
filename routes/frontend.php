<?php

Route::group(['middleware' => 'frontend'], function() {
    Route::get('/', ['as' => 'home.index', 'uses' => 'Frontend\FrontendController@index']);

    Route::get('/marketing/activation/{key}', ['as' => 'marketing.activation', 'uses' => 'Frontend\MarketingController@activation']);
    Route::get('/construction/activation/{key}', ['as' => 'construction.activation', 'uses' => 'Frontend\ConstructionController@activation']);
    /* Sản phẩm */
    Route::get('/san-pham', ['as' => 'product.index', 'uses' => 'Frontend\ProductController@index']);
    Route::get('/san-pham/{alias}', ['as' => 'product.detail', 'uses' => 'Frontend\ProductController@detail']);
    /* Hình ảnh */
    Route::get('/hinh-anh', ['as' => 'gallery.index', 'uses' => 'Frontend\GalleryController@index']);
    Route::get('/hinh-anh/{alias}', ['as' => 'gallery.detail', 'uses' => 'Frontend\GalleryController@detail']);
 
    Route::get('/tin-tuc', ['as' => 'news.index', 'uses' => 'Frontend\NewsController@index']);
    Route::get('/danh-muc-tin/{alias}', ['as' => 'news_category.index', 'uses' => 'Frontend\NewsController@news_category']);
    Route::get('/tin-tuc/{alias}', ['as' => 'news.detail', 'uses' => 'Frontend\NewsController@detail']);
    /* Video */
    Route::get('/video', ['as' => 'video.index', 'uses' => 'Frontend\VideoController@index']);
    Route::get('/video/{alias}', ['as' => 'video.detail', 'uses' => 'Frontend\VideoController@detail']);
    Route::get('/search-result', ['as' => 'video.search', 'uses' => 'Frontend\VideoController@search']);
    /* Giỏ hàng */
    Route::get('/cart', ['as' => 'product.cart', 'uses' => 'Frontend\ProductController@cart']);
    /* Thanh toán */
    Route::get('/checkout', ['as' => 'product.checkout', 'uses' => 'Frontend\ProductController@checkout']);
    Route::post('/checkout-success', ['as' => 'product.checkout-sucess', 'uses' => 'Frontend\ProductController@checkoutSuccess']);
    /* Tiếp thị liên kết */
    Route::get('/marketing/{alias}', ['as' => 'marketing.index', 'uses' => 'Frontend\MarketingController@index']);

    //Giảng viên
    Route::get('/giang-vien', ['as' => 'teacher.index', 'uses' => 'Frontend\TeacherController@index']);

    //Test
    Route::get('/test/{number}', ['as' => 'test.index', 'uses' => 'Frontend\TestController@index']);
    Route::get('/dang-ky-test', ['as' => 'test.signup', 'uses' => 'Frontend\TestController@signup']);
    Route::post('/dang-ky-test-submit', ['as' => 'test.signup_submit', 'uses' => 'Frontend\TestController@signup_submit']);
    Route::post('/test-submit/{number}', ['as' => 'test.submit', 'uses' => 'Frontend\TestController@submit']);
    Route::get('/ket-qua', ['as' => 'test.result', 'uses' => 'Frontend\TestController@result']);

      //Giảng viên
    Route::get('/thanh-tich', ['as' => 'achie.index', 'uses' => 'Frontend\AchieController@index']);

    Route::get('/gioi-thieu', ['as' => 'achie.index', 'uses' => 'Frontend\FrontendController@about']);

    Route::get('/phuong-phap', ['as' => 'method.detail', 'uses' => 'Frontend\FrontendController@method']);

    Route::get('/lo-trinh', ['as' => 'route.detail', 'uses' => 'Frontend\FrontendController@route']);

    

     

    //ĐĂng kí
    Route::post('/checkout-success', ['as' => 'product.checkout-sucess', 'uses' => 'Frontend\ProductController@checkoutSuccess']);

    Route::post('/sign-up-advise', ['as' => 'home.sign_up_advise', 'uses' => 'Frontend\FrontendController@sign_up_advise']);

    Route::post('/sign-up-advise2', ['as' => 'home.sign_up_advise2', 'uses' => 'Frontend\FrontendController@sign_up_advise2']);

    //Lich khia giảng
    Route::get('/khoa-hoc/{alias}', ['as' => 'course.detail', 'uses' => 'Frontend\CourseController@detail']);
    //Giảng viên
    Route::get('/lich-khai-giang', ['as' => 'schedule.index', 'uses' => 'Frontend\ScheduleController@index']);
    Route::get('/{postion}', ['as' => 'block.detail', 'uses' => 'Frontend\FrontendController@block']);
});
