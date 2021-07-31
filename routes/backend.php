<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
   Route::get('/index', ['as' => 'admin.index', 'uses' => 'Backend\BackendController@index']);
    /* Cấu hình website */
    Route::get('/config', ['as' => 'admin.config.index', 'uses' => 'Backend\ConfigController@index']);
    Route::post('/config/update/{id}', ['as' => 'admin.config.update', 'uses' => 'Backend\ConfigController@update']);

    /* Quản lý danh mục */
    Route::get('/category/{type}', ['as' => 'admin.category.index', 'uses' => 'Backend\CategoryController@index']);
    Route::get('/category/{type}/create', ['as' => 'admin.category.create', 'uses' => 'Backend\CategoryController@create']);
    Route::get('/category/{type}/edit/{id}', ['as' => 'admin.category.edit', 'uses' => 'Backend\CategoryController@edit']);
    Route::post('/category/{type}/store', ['as' => 'admin.category.store', 'uses' => 'Backend\CategoryController@store']);
    Route::post('/category/{type}/update/{id}', ['as' => 'admin.category.update', 'uses' => 'Backend\CategoryController@update']);
    Route::delete('/category/{type}/delete/{id}', ['as' => 'admin.category.destroy', 'uses' => 'Backend\CategoryController@destroy']);
    
    /* Quản lý video */
    Route::get('/video', ['as' => 'admin.video.index', 'uses' => 'Backend\VideoController@index']);
    Route::get('/video/create', ['as' => 'admin.video.create', 'uses' => 'Backend\VideoController@create']);
    Route::post('/video/store', ['as' => 'admin.video.store', 'uses' => 'Backend\VideoController@store']);
    Route::get('/video/edit/{id}', ['as' => 'admin.video.edit', 'uses' => 'Backend\VideoController@edit']);
    Route::post('/video/update/{id}', ['as' => 'admin.video.update', 'uses' => 'Backend\VideoController@update']);
    Route::delete('/video/delete/{id}', ['as' => 'admin.video.destroy', 'uses' => 'Backend\VideoController@destroy']);
    Route::post('/video/update_multiple', ['as' => 'admin.video.update_multiple', 'uses' => 'Backend\VideoController@update_multiple']);
    
    /* Quản lý news */
    Route::get('/news', ['as' => 'admin.news.index', 'uses' => 'Backend\NewsController@index']);
    Route::get('/news/create', ['as' => 'admin.news.create', 'uses' => 'Backend\NewsController@create']);
    Route::post('/news/store', ['as' => 'admin.news.store', 'uses' => 'Backend\NewsController@store']);
    Route::get('/news/edit/{id}', ['as' => 'admin.news.edit', 'uses' => 'Backend\NewsController@edit']);
    Route::post('/news/update/{id}', ['as' => 'admin.news.update', 'uses' => 'Backend\NewsController@update']);
    Route::delete('/news/delete/{id}', ['as' => 'admin.news.destroy', 'uses' => 'Backend\NewsController@destroy']);
    Route::post('/news/update_multiple', ['as' => 'admin.news.update_multiple', 'uses' => 'Backend\NewsController@update_multiple']);
    
    /* Quản lý khoá học */
    Route::get('course/test', ['as' => 'admin.course.index', 'uses' => 'Backend\CourseController@index']);
    Route::get('/course/create', ['as' => 'admin.course.create', 'uses' => 'Backend\CourseController@create']);
    Route::post('/course/store', ['as' => 'admin.course.store', 'uses' => 'Backend\CourseController@store']);
    Route::get('/course/edit/{id}', ['as' => 'admin.course.edit', 'uses' => 'Backend\CourseController@edit']);
    Route::post('/course/update/{id}', ['as' => 'admin.course.update', 'uses' => 'Backend\CourseController@update']);
    Route::delete('/course/delete/{id}', ['as' => 'admin.course.destroy', 'uses' => 'Backend\CourseController@destroy']);
    Route::post('/course/update_multiple', ['as' => 'admin.course.update_multiple', 'uses' => 'Backend\CourseController@update_multiple']);

     /* Quản lý khoá học */
    Route::get('route_course/index', ['as' => 'admin.route_course.index', 'uses' => 'Backend\RouteCourseController@index']);
    Route::get('/route_course/create', ['as' => 'admin.route_course.create', 'uses' => 'Backend\RouteCourseController@create']);
    Route::post('/route_course/store', ['as' => 'admin.route_course.store', 'uses' => 'Backend\RouteCourseController@store']);
    Route::get('/route_course/edit/{id}', ['as' => 'admin.route_course.edit', 'uses' => 'Backend\RouteCourseController@edit']);
    Route::post('/route_course/update/{id}', ['as' => 'admin.route_course.update', 'uses' => 'Backend\RouteCourseController@update']);
    Route::delete('/route_course/delete/{id}', ['as' => 'admin.route_course.destroy', 'uses' => 'Backend\RouteCourseController@destroy']);
    Route::post('/route_course/update_multiple', ['as' => 'admin.route_course.update_multiple', 'uses' => 'Backend\RouteCourseController@update_multiple']);

      /* Quản lý khoá học */
    Route::get('online_course/index', ['as' => 'admin.online_course.index', 'uses' => 'Backend\OnlineCourseController@index']);
    Route::get('/online_course/create', ['as' => 'admin.online_course.create', 'uses' => 'Backend\OnlineCourseController@create']);
    Route::post('/online_course/store', ['as' => 'admin.online_course.store', 'uses' => 'Backend\OnlineCourseController@store']);
    Route::get('/online_course/edit/{id}', ['as' => 'admin.online_course.edit', 'uses' => 'Backend\OnlineCourseController@edit']);
    Route::post('/online_course/update/{id}', ['as' => 'admin.online_course.update', 'uses' => 'Backend\OnlineCourseController@update']);
    Route::delete('/online_course/delete/{id}', ['as' => 'admin.online_course.destroy', 'uses' => 'Backend\OnlineCourseController@destroy']);
    Route::post('/online_course/update_multiple', ['as' => 'admin.online_course.update_multiple', 'uses' => 'Backend\OnlineCourseController@update_multiple']);
    
    
    /* Quản lý test */
    Route::get('/test', ['as' => 'admin.test.index', 'uses' => 'Backend\TestController@index']);
    Route::get('/test/create', ['as' => 'admin.test.create', 'uses' => 'Backend\TestController@create']);
    Route::post('/test/store', ['as' => 'admin.test.store', 'uses' => 'Backend\TestController@store']);
    Route::get('/test/edit/{id}', ['as' => 'admin.test.edit', 'uses' => 'Backend\TestController@edit']);
    Route::post('/test/update/{id}', ['as' => 'admin.test.update', 'uses' => 'Backend\TestController@update']);
    Route::delete('/test/delete/{id}', ['as' => 'admin.test.destroy', 'uses' => 'Backend\TestController@destroy']);



    /* Quản lý câu hỏi */
    Route::get('/question', ['as' => 'admin.question.index', 'uses' => 'Backend\QuestionController@index']);
    // Route::get('/question/create', ['as' => 'admin.question.create', 'uses' => 'Backend\QuestionController@create']);
    Route::post('/question/store', ['as' => 'admin.question.store', 'uses' => 'Backend\QuestionController@store']);
    Route::get('/question/edit/{id}', ['as' => 'admin.question.edit', 'uses' => 'Backend\QuestionController@edit']);
    Route::post('/question/update/{id}', ['as' => 'admin.question.update', 'uses' => 'Backend\QuestionController@update']);
    Route::delete('/question/delete/{id}', ['as' => 'admin.question.destroy', 'uses' => 'Backend\QuestionController@destroy']);

    /* Quản lý quizz */
    Route::get('/quizz', ['as' => 'admin.quizz.index', 'uses' => 'Backend\QuizzController@index']);
    Route::get('/quizz/create', ['as' => 'admin.quizz.create', 'uses' => 'Backend\QuizzController@create']);
    Route::post('/quizz/store', ['as' => 'admin.quizz.store', 'uses' => 'Backend\QuizzController@store']);
    Route::get('/quizz/edit/{id}', ['as' => 'admin.quizz.edit', 'uses' => 'Backend\QuizzController@edit']);
    Route::post('/quizz/update/{id}', ['as' => 'admin.quizz.update', 'uses' => 'Backend\QuizzController@update']);
    Route::delete('/quizz/delete/{id}', ['as' => 'admin.quizz.destroy', 'uses' => 'Backend\QuizzController@destroy']);
    
    /* Quản lý attribute */
    Route::get('/attribute', ['as' => 'admin.attribute.index', 'uses' => 'Backend\AttributeController@index']);
    Route::get('/attribute/create', ['as' => 'admin.attribute.create', 'uses' => 'Backend\AttributeController@create']);
    Route::post('/attribute/store', ['as' => 'admin.attribute.store', 'uses' => 'Backend\AttributeController@store']);
    Route::get('/attribute/edit/{id}', ['as' => 'admin.attribute.edit', 'uses' => 'Backend\AttributeController@edit']);
    Route::post('/attribute/update/{id}', ['as' => 'admin.attribute.update', 'uses' => 'Backend\AttributeController@update']);
    Route::delete('/attribute/delete/{id}', ['as' => 'admin.attribute.destroy', 'uses' => 'Backend\AttributeController@destroy']);
    

    
    /* Quản lý đơn vị thi công */
    // Route::get('/review', ['as' => 'admin.review.index', 'uses' => 'Backend\ReviewController@index']);
    // Route::delete('/review/delete/{id}', ['as' => 'admin.review.destroy', 'uses' => 'Backend\ReviewController@destroy']);
    
    /* Quản lý gallery */
    Route::get('/gallery', ['as' => 'admin.gallery.index', 'uses' => 'Backend\GalleryController@index']);
    Route::get('/gallery/create', ['as' => 'admin.gallery.create', 'uses' => 'Backend\GalleryController@create']);
    Route::post('/gallery/store', ['as' => 'admin.gallery.store', 'uses' => 'Backend\GalleryController@store']);
    Route::get('/gallery/edit/{id}', ['as' => 'admin.gallery.edit', 'uses' => 'Backend\GalleryController@edit']);
    Route::post('/gallery/update/{id}', ['as' => 'admin.gallery.update', 'uses' => 'Backend\GalleryController@update']);
    Route::delete('/gallery/delete/{id}', ['as' => 'admin.gallery.destroy', 'uses' => 'Backend\GalleryController@destroy']);
    Route::post('/gallery/update_multiple', ['as' => 'admin.gallery.update_multiple', 'uses' => 'Backend\GalleryController@update_multiple']);
    
    
    /* Quản lý user */
    Route::get('/user', ['as' => 'admin.user.index', 'uses' => 'Backend\UserController@index']);
    Route::get('/user/create', ['as' => 'admin.user.create', 'uses' => 'Backend\UserController@create']);
    Route::post('/user/store', ['as' => 'admin.user.store', 'uses' => 'Backend\UserController@store']);
    Route::get('/user/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'Backend\UserController@edit']);
    Route::post('/user/update/{id}', ['as' => 'admin.user.update', 'uses' => 'Backend\UserController@update']);
    Route::delete('/user/delete/{id}', ['as' => 'admin.user.destroy', 'uses' => 'Backend\UserController@destroy']);
    
    Route::get('/user/edit_profile/{id}', ['as' => 'admin.user.index_profile', 'uses' => 'Backend\UserController@editProfile']);
    Route::post('/user/update_profile/{id}', ['as' => 'admin.user.update_profile', 'uses' => 'Backend\UserController@updateProfile']);
    /* Quản lý quyền */
        Route::get('/role', ['as' => 'admin.role.index', 'uses' => 'Backend\RoleController@index']);
    Route::get('/role/create', ['as' => 'admin.role.create', 'uses' => 'Backend\RoleController@create']);
    Route::get('/role/edit/{id}', ['as' => 'admin.role.edit', 'uses' => 'Backend\RoleController@edit']);
    Route::post('/role/store', ['as' => 'admin.role.store', 'uses' => 'Backend\RoleController@store']);
    Route::post('/role/update/{id}', ['as' => 'admin.role.update', 'uses' => 'Backend\RoleController@update']);
    Route::delete('/role/delete/{id}', ['as' => 'admin.role.destroy', 'uses' => 'Backend\RoleController@destroy']);
    /* Menu*/
    Route::get('/menu', ['as' => 'admin.menu.index', 'uses' => 'Backend\MenuController@index']);
    Route::get('/menu/create', ['as' => 'admin.menu.create', 'uses' => 'Backend\MenuController@create']);
    Route::get('/menu/edit/{id}', ['as' => 'admin.menu.edit', 'uses' => 'Backend\MenuController@edit']);
    Route::post('/menu/store', ['as' => 'admin.menu.store', 'uses' => 'Backend\MenuController@store']);
    Route::post('/menu/update/{id}', ['as' => 'admin.menu.update', 'uses' => 'Backend\MenuController@update']);
    Route::delete('/menu/delete/{id}', ['as' => 'admin.menu.destroy', 'uses' => 'Backend\MenuController@destroy']);
    /* Block*/
    Route::get('/block', ['as' => 'admin.block.index', 'uses' => 'Backend\BlockController@index']);
    Route::get('/block/create', ['as' => 'admin.block.create', 'uses' => 'Backend\BlockController@create']);
    Route::get('/block/edit/{id}', ['as' => 'admin.block.edit', 'uses' => 'Backend\BlockController@edit']);
    Route::post('/block/store', ['as' => 'admin.block.store', 'uses' => 'Backend\BlockController@store']);
    Route::post('/block/update/{id}', ['as' => 'admin.block.update', 'uses' => 'Backend\BlockController@update']);
    Route::delete('/block/delete/{id}', ['as' => 'admin.block.destroy', 'uses' => 'Backend\BlockController@destroy']);
    /* Slide*/
    Route::get('/slide', ['as' => 'admin.slide.index', 'uses' => 'Backend\SlideController@index']);
    Route::get('/slide/create', ['as' => 'admin.slide.create', 'uses' => 'Backend\SlideController@create']);
    Route::get('/slide/edit/{id}', ['as' => 'admin.slide.edit', 'uses' => 'Backend\SlideController@edit']);
    Route::post('/slide/store', ['as' => 'admin.slide.store', 'uses' => 'Backend\SlideController@store']);
    Route::post('/slide/update/{id}', ['as' => 'admin.slide.update', 'uses' => 'Backend\SlideController@update']);
    Route::delete('/slide/delete/{id}', ['as' => 'admin.slide.destroy', 'uses' => 'Backend\SlideController@destroy']);
    // /* Dịch vụ*/
    // Route::get('/service', ['as' => 'admin.service.index', 'uses' => 'Backend\ServiceController@index']);
    // Route::get('/service/create', ['as' => 'admin.service.create', 'uses' => 'Backend\ServiceController@create']);
    // Route::get('/service/edit/{id}', ['as' => 'admin.service.edit', 'uses' => 'Backend\ServiceController@edit']);
    // Route::post('/service/store', ['as' => 'admin.service.store', 'uses' => 'Backend\ServiceController@store']);
    // Route::post('/service/update/{id}', ['as' => 'admin.service.update', 'uses' => 'Backend\ServiceController@update']);
    // Route::delete('/service/delete/{id}', ['as' => 'admin.service.destroy', 'uses' => 'Backend\ServiceController@destroy']);
    //section
    Route::get('/section', ['as' => 'admin.section.index', 'uses' => 'Backend\SectionController@index']);
    Route::get('/section/create', ['as' => 'admin.section.create', 'uses' => 'Backend\SectionController@create']);
    Route::get('/section/edit/{id}', ['as' => 'admin.section.edit', 'uses' => 'Backend\SectionController@edit']);
    Route::post('/section/store', ['as' => 'admin.section.store', 'uses' => 'Backend\SectionController@store']);
    Route::post('/section/update/{id}', ['as' => 'admin.section.update', 'uses' => 'Backend\SectionController@update']);
    Route::post('/section/delete/{id}', ['as' => 'admin.section.destroy', 'uses' => 'Backend\SectionController@destroy']);
      Route::post('/section/update_multiple', ['as' => 'admin.section.update_multiple', 'uses' => 'Backend\SectionController@update_multiple']);
    /* Người đăng kí*/
    Route::get('/subscriber', ['as' => 'admin.subscriber.index', 'uses' => 'Backend\SubscriberController@index']);
    Route::delete('/subscriber/delete/{id}', ['as' => 'admin.subscriber.destroy', 'uses' => 'Backend\SubscriberController@destroy']);
    /* Liên hệ*/
    Route::get('/contact', ['as' => 'admin.contact.index', 'uses' => 'Backend\ContactController@index']);
    Route::delete('/contact/delete/{id}', ['as' => 'admin.contact.destroy', 'uses' => 'Backend\ContactController@destroy']);
    Route::get('/contact/show/{id}', ['as' => 'admin.contact.edit', 'uses' => 'Backend\ContactController@show']);
    /* Thành viên*/
    Route::get('/member', ['as' => 'admin.member.index', 'uses' => 'Backend\MemberController@index']);
    Route::delete('/member/delete/{id}', ['as' => 'admin.member.destroy', 'uses' => 'Backend\MemberController@destroy']);
    Route::get('/member/show/{id}', ['as' => 'admin.member.edit', 'uses' => 'Backend\MemberController@show']);
    /* Đơn hàng*/
    // Route::get('/order', ['as' => 'admin.order.index', 'uses' => 'Backend\OrderController@index']);
    // Route::delete('/order/delete/{id}', ['as' => 'admin.order.destroy', 'uses' => 'Backend\OrderController@destroy']);
    // Route::get('/order/show/{id}', ['as' => 'admin.order.edit', 'uses' => 'Backend\OrderController@show']);
     /* Template_seting*/
    Route::get('/template_setting', ['as' => 'admin.template_setting.index', 'uses' => 'Backend\TemplateSettingController@index']);
    Route::get('/template_setting/create', ['as' => 'admin.template_setting.create', 'uses' => 'Backend\TemplateSettingController@create']);
    Route::post('/template_setting/store', ['as' => 'admin.template_setting.store', 'uses' => 'Backend\TemplateSettingController@store']);


    /* Quản lý template */
    Route::get('/template_setting', ['as' => 'admin.template_setting.index', 'uses' => 'Backend\TemplateSettingController@index']);
    Route::get('/template_setting/create', ['as' => 'admin.template_setting.create', 'uses' => 'Backend\TemplateSettingController@create']);
    Route::post('/template_setting/store', ['as' => 'admin.template_setting.store', 'uses' => 'Backend\TemplateSettingController@store']);
    Route::get('/template_setting/edit/{id}', ['as' => 'admin.template_setting.edit', 'uses' => 'Backend\TemplateSettingController@edit']);
    Route::post('/template_setting/update/{id}', ['as' => 'admin.template_setting.update', 'uses' => 'Backend\TemplateSettingController@update']);
    Route::delete('/template_setting/delete/{id}', ['as' => 'admin.template_setting.destroy', 'uses' => 'Backend\TemplateSettingController@destroy']);
    Route::post('/template_setting/update_multiple', ['as' => 'admin.template_setting.update_multiple', 'uses' => 'Backend\TemplateSettingController@update_multiple']);

    /* Quản lý giảng viên */
    Route::get('/teacher', ['as' => 'admin.teacher.index', 'uses' => 'Backend\TeacherController@index']);
    Route::get('/teacher/create', ['as' => 'admin.teacher.create', 'uses' => 'Backend\TeacherController@create']);
    Route::post('/teacher/store', ['as' => 'admin.teacher.store', 'uses' => 'Backend\TeacherController@store']);
    Route::get('/teacher/edit/{id}', ['as' => 'admin.teacher.edit', 'uses' => 'Backend\TeacherController@edit']);
    Route::post('/teacher/update/{id}', ['as' => 'admin.teacher.update', 'uses' => 'Backend\TeacherController@update']);
    Route::delete('/teacher/delete/{id}', ['as' => 'admin.teacher.destroy', 'uses' => 'Backend\TeacherController@destroy']);
    Route::post('/teacher/update_multiple', ['as' => 'admin.teacher.update_multiple', 'uses' => 'Backend\TeacherController@update_multiple']);

      /* Quản lý địa chỉ liên hệ */
    Route::get('/contact_address', ['as' => 'admin.contact_address.index', 'uses' => 'Backend\ContactAddressController@index']);
    Route::get('/contact_address/create', ['as' => 'admin.contact_address.create', 'uses' => 'Backend\ContactAddressController@create']);
    Route::post('/contact_address/store', ['as' => 'admin.contact_address.store', 'uses' => 'Backend\ContactAddressController@store']);
    Route::get('/contact_address/edit/{id}', ['as' => 'admin.contact_address.edit', 'uses' => 'Backend\ContactAddressController@edit']);
    Route::post('/contact_address/update/{id}', ['as' => 'admin.contact_address.update', 'uses' => 'Backend\ContactAddressController@update']);
    Route::delete('/contact_address/delete/{id}', ['as' => 'admin.contact_address.destroy', 'uses' => 'Backend\ContactAddressController@destroy']);
    Route::post('/contact_address/update_multiple', ['as' => 'admin.contact_address.update_multiple', 'uses' => 'Backend\ContactAddressController@update_multiple']);
    
   
    //feedback
    /* Quản lý danh mục */
    Route::get('/feedback/{type}', ['as' => 'admin.feedback.index', 'uses' => 'Backend\FeedbackController@index']);
    Route::get('/feedback/{type}/create', ['as' => 'admin.feedback.create', 'uses' => 'Backend\FeedbackController@create']);
    Route::get('/feedback/{type}/edit/{id}', ['as' => 'admin.feedback.edit', 'uses' => 'Backend\FeedbackController@edit']);
    Route::post('/feedback/{type}/store', ['as' => 'admin.feedback.store', 'uses' => 'Backend\FeedbackController@store']);
    Route::post('/feedback/{type}/update/{id}', ['as' => 'admin.feedback.update', 'uses' => 'Backend\FeedbackController@update']);
    Route::delete('/feedback/{type}/delete/{id}', ['as' => 'admin.feedback.destroy', 'uses' => 'Backend\FeedbackController@destroy']);
    Route::post('/feedback/update_multiple', ['as' => 'admin.feedback.update_multiple', 'uses' => 'Backend\FeedbackController@update_multiple']);

       /*Lịch */
    Route::get('/schedule', ['as' => 'admin.schedule.index', 'uses' => 'Backend\ScheduleController@index']);
    Route::get('/schedule/create', ['as' => 'admin.schedule.create', 'uses' => 'Backend\ScheduleController@create']);
    Route::get('/schedule/edit/{id}', ['as' => 'admin.schedule.edit', 'uses' => 'Backend\ScheduleController@edit']);
    Route::post('/schedule/store', ['as' => 'admin.schedule.store', 'uses' => 'Backend\ScheduleController@store']);
    Route::post('/schedule/update/{id}', ['as' => 'admin.schedule.update', 'uses' => 'Backend\ScheduleController@update']);
    Route::delete('/schedule/{id}', ['as' => 'admin.schedule.destroy', 'uses' => 'Backend\ScheduleController@destroy']);
    Route::post('/schedule/update_multiple', ['as' => 'admin.schedule.update_multiple', 'uses' => 'Backend\ScheduleController@update_multiple']);

     /* Quản lý danh mục */
    Route::get('/best', ['as' => 'admin.best.index', 'uses' => 'Backend\BestController@index']);
    Route::get('/best/create', ['as' => 'admin.best.create', 'uses' => 'Backend\BestController@create']);
    Route::get('/best/edit/{id}', ['as' => 'admin.best.edit', 'uses' => 'Backend\BestController@edit']);
    Route::post('/best/store', ['as' => 'admin.best.store', 'uses' => 'Backend\BestController@store']);
    Route::post('/best/update/{id}', ['as' => 'admin.best.update', 'uses' => 'Backend\BestController@update']);
    Route::delete('/best/delete/{id}', ['as' => 'admin.best.destroy', 'uses' => 'Backend\BestController@destroy']);

    /* Quản lý danh mục */
    Route::get('/study', ['as' => 'admin.study.index', 'uses' => 'Backend\StudyController@index']);
    Route::get('/study/create', ['as' => 'admin.study.create', 'uses' => 'Backend\StudyController@create']);
    Route::get('/study/edit/{id}', ['as' => 'admin.study.edit', 'uses' => 'Backend\StudyController@edit']);
    Route::post('/study/store', ['as' => 'admin.study.store', 'uses' => 'Backend\StudyController@store']);
    Route::post('/study/update/{id}', ['as' => 'admin.study.update', 'uses' => 'Backend\StudyController@update']);
    Route::delete('/study/delete/{id}', ['as' => 'admin.study.destroy', 'uses' => 'Backend\StudyController@destroy']);
    //Route::post('/feedback/update_multiple', ['as' => 'admin.feedback.update_multiple', 'uses' => 'Backend\FeedbackController@update_multiple']);

      /* Quản lý banner */
    Route::get('/banner', ['as' => 'admin.banner.index', 'uses' => 'Backend\BannerController@index']);
    Route::get('/banner/create', ['as' => 'admin.banner.create', 'uses' => 'Backend\BannerController@create']);
    Route::get('/banner/edit/{id}', ['as' => 'admin.banner.edit', 'uses' => 'Backend\BannerController@edit']);
    Route::post('/banner/store', ['as' => 'admin.banner.store', 'uses' => 'Backend\BannerController@store']);
    Route::post('/banner/update/{id}', ['as' => 'admin.banner.update', 'uses' => 'Backend\BannerController@update']);
    Route::delete('/banner/delete/{id}', ['as' => 'admin.banner.destroy', 'uses' => 'Backend\BannerController@destroy']);
    
      /* Quản lý danh mục */
    Route::get('/route', ['as' => 'admin.route.index', 'uses' => 'Backend\RouteController@index']);
    Route::get('/route/edit/{id}', ['as' => 'admin.route.edit', 'uses' => 'Backend\RouteController@edit']);
    Route::post('/route/update/{id}', ['as' => 'admin.route.update', 'uses' => 'Backend\RouteController@update']);
    Route::delete('/route/delete/{id}', ['as' => 'admin.route.destroy', 'uses' => 'Backend\RouteController@destroy']);


    Route::get('/method/edit/{id}', ['as' => 'admin.method.edit', 'uses' => 'Backend\MethodController@edit']);
    Route::post('/method/update/{id}', ['as' => 'admin.method.update', 'uses' => 'Backend\MethodController@update']);
  


    Route::get('/score', ['as' => 'admin.score.index', 'uses' => 'Backend\ScoreController@index']);
    Route::get('/score/create/{type}', ['as' => 'admin.score.create', 'uses' => 'Backend\ScoreController@create']);
    Route::get('/score/edit/{id}', ['as' => 'admin.score.edit', 'uses' => 'Backend\ScoreController@edit']);
    Route::post('/score/{type}/store', ['as' => 'admin.score.store', 'uses' => 'Backend\ScoreController@store']);
    Route::post('/score/update/{id}', ['as' => 'admin.score.update', 'uses' => 'Backend\ScoreController@update']);
    Route::delete('/score/delete/{id}', ['as' => 'admin.score.destroy', 'uses' => 'Backend\ScoreController@destroy']);

    Route::get('/rule', ['as' => 'admin.rule.index', 'uses' => 'Backend\RuleController@index']);
    Route::get('/rule/create', ['as' => 'admin.rule.create', 'uses' => 'Backend\RuleController@create']);
    Route::get('/rule/edit/{id}', ['as' => 'admin.rule.edit', 'uses' => 'Backend\RuleController@edit']);
    Route::post('/rule/store', ['as' => 'admin.rule.store', 'uses' => 'Backend\RuleController@store']);
    Route::post('/rule/update/{id}', ['as' => 'admin.rule.update', 'uses' => 'Backend\RuleController@update']);
    Route::delete('/rule/delete/{id}', ['as' => 'admin.rule.destroy', 'uses' => 'Backend\RuleController@destroy']);
   

      /* Quản lý danh mục */
    Route::get('/route-online', ['as' => 'admin.route_online.index', 'uses' => 'Backend\RouteOnlineController@index']);
    Route::get('/route-online/edit/{id}', ['as' => 'admin.route_online.edit', 'uses' => 'Backend\RouteOnlineController@edit']);
    Route::post('/route-online/store', ['as' => 'admin.route_online.store', 'uses' => 'Backend\RouteOnlineController@store']);
    Route::post('/route-online/update/{id}', ['as' => 'admin.route_online.update', 'uses' => 'Backend\RouteOnlineController@update']);
    Route::delete('/route-online/delete/{id}', ['as' => 'admin.route_online.destroy', 'uses' => 'Backend\RouteOnlineController@destroy']);


      /* Quản lý banner */
   

});
