<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Repositories\CategoryRepository;
use Repositories\ConstructionRepository;
use Repositories\KeywordRepository;
use DB;
use Carbon\Carbon;
class FrontendController extends Controller {

    public function __construct(CategoryRepository $categoryRepo, KeywordRepository $keywordRepo) {
        $this->categoryRepo = $categoryRepo;
        $this->keywordRepo = $keywordRepo;
    }

    public function index() {
        $courses  = DB::table('course')->where('is_online',null)->where('is_pro',null)->orderBy('ordering','desc')->where('status', 1)->limit(3)->get();
        $route = DB::table('route')->where('is_pro',1)->first();
        $route_online = DB::table('route')->where('is_online',1)->first();
        $teachers = DB::table('teacher')->orderBy('ordering','desc')->where('status', 1)->limit(10)->get();
        $news_hots = DB::table('news')->orderBy('ordering','desc')->where('status', 1)->where('is_hot',1)->get();
        $news_ielts = DB::table('news_category')->join('category','category.id','=','news_category.category_id')->join('news','news.id','=','news_category.news_id')->where('category.is_ielts',1)->orderBy('news.ordering','desc')->where('news.status', 1)->get();
        
        $best_member = DB::Table('best')->where('is_best', 1)->where('status',1)->limit(10)->orderBy('ordering','desc')->get();

        return view('frontend/home/index',compact('courses','teachers','news_ielts','news_hots','best_member','route','route_online'));
        
    }

      public function block($position) {

            $record = DB::table('block')->where('position',$position)->first();
           if($record== null){
               return redirect()->back();
           }
            if($record->include_news == 1){
                $include_news = DB::table('news')->where('status',1)->orderBy('ordering','desc')->where('is_ielts',1)->limit(6)->get();
            }else{
                $include_news = "";
            }

            if($record->include_video == 1){
                $include_video = DB::table('video')->where('status',1)->orderBy('ordering','desc')->limit(6)->get();
            }
            else{
                $include_video = "";
            }

            if($record->include_dangky == 1){
                 $include_dangky = DB::table('schedule')->join('contact_address','contact_address.id','=','schedule.contact_address_id')->join('course','course.id','=','schedule.course_id')->select('*','schedule.title as schedule_name','contact_address.name as contact_address_name','course.title as course_name')->where('schedule.status',1)->orderBy('schedule.ordering','desc')->get()->groupBy('contact_address_name');
            }    
            else{
                $include_dangky = "";
            }
            //dd($include_dangky);

            if($record->include_teacher == 1){
                $include_teacher = DB::table('teacher')->where('status',1)->orderBy('ordering','desc')->limit(3)->get();
            }    
            else{
                $include_teacher="";
            }

            if($record->include_best == 1){
                $include_best = DB::table('best')->where('is_best',1)->where('status',1)->limit(3)->orderBy('ordering','desc')->get();
            }    
            else{
                $include_best="";
            }

           

            if($record){

                return view('frontend/block/detail',compact('record','include_news','include_video','include_dangky','include_best','include_teacher'));
            }else{
                return redirect()->back();
            }
    }
    
     public function sign_up_advise(Request $request){

            $input = $request->except('_token');
            $input['type'] = 1;
            $input['link'] = "/".$request->path();
             $input['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');    
            $res = DB::table('contact')->insert($input);

            if($res){
                return redirect()->back()->with('success','Cám ơn bạn đã đăng kí thông tin. Tư vấn viên của Pasal sẽ liên hệ với bạn trong thời gian sớm nhất');
            }
            else{
                 return redirect()->back()->with('error','Có lỗi trong quá trình xử lý, vui lòng thử lại');
            }
       }

         public function sign_up_advise2(Request $request){

            $input = $request->except('_token');
            $input['type'] = 2;
            $input['link'] = "/".$request->path();
            $input['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            $res = DB::table('contact')->insert($input);

            if($res){
                return redirect()->back()->with('success','Cám ơn bạn đã đăng kí thông tin. Tư vấn viên của Pasal sẽ liên hệ với bạn trong thời gian sớm nhất');
            }
            else{
                 return redirect()->back()->with('error','Có lỗi trong quá trình xử lý, vui lòng thử lại');
            }
       }

      

        public function method(Request $request){
                $record = DB::table('method')->first();
                $videos = DB::table('video')->where('status',1)->orderBy('ordering','desc')->limit(6)->get();
                $news = DB::table('news')->where('status',1)->orderBy('ordering','desc')->where('is_ielts',1)->limit(6)->get();
                $studies = DB::table('study')->where('status',1)->orderBy('ordering','desc')->get();
               
                return view('frontend/method/detail',compact('record','videos','news','studies'));   
       }

        public function route(Request $request){
                $record = DB::table('route')->first();
                $courses = DB::table('course')->where('is_pro',1)->orderBy('ordering','desc')->limit(3)->get(); 
                $teachers = DB::table('teacher')->where('status',1)->whereIn('id',explode(',', $record->teacher_id))->orderBy('ordering','desc')->get();
                $schedules = DB::table('schedule')->join('contact_address','contact_address.id','=','schedule.contact_address_id')->join('course','course.id','=','schedule.course_id')->select('*','schedule.title as schedule_name','contact_address.name as contact_address_name','course.title as course_name','course.id as course_id','schedule.id as schedule_id','contact_address.id as contact_address_id')->where('course.is_pro',1)->where('schedule.type',2)->get()->groupBy('contact_address_name');
                $coursess = DB::table('course')->where('is_pro',1)->orderBy('ordering','desc')->get(); 
                $studies = DB::table('study')->where('status',1)->whereIn('id',explode(',', $record->study_id))->orderBy('ordering','desc')->get();
                $contact_add = DB::table('contact_address')->where('address','!=','Online')->get();
                return view('frontend/route/detail',compact('record','teachers','courses','studies','schedules','contact_add','coursess'));   
       }

        public function online(Request $request){
                $record = DB::table('route')->first();
                $courses = DB::table('course')->where('is_online',1)->orderBy('ordering','desc')->limit(3)->get(); 
                $teachers = DB::table('teacher')->where('status',1)->whereIn('id',explode(',', $record->teacher_id))->orderBy('ordering','desc')->get();
                // $schedules = DB::table('schedule')->join('contact_address','contact_address.id','=','schedule.contact_address_id')->join('course','course.id','=','schedule.course_id')->select('*','schedule.title as schedule_name','contact_address.name as contact_address_name','course.title as course_name','course.id as course_id','schedule.id as schedule_id','contact_address.id as contact_address_id')->where('course.online',1)->where('schedule.type',2)->get()->groupBy('contact_address_name');
                $coursess = DB::table('course')->where('is_online',1)->orderBy('ordering','desc')->get(); 
                $studies = DB::table('study')->where('status',1)->whereIn('id',explode(',', $record->study_id))->orderBy('ordering','desc')->get();
                $contact_add = DB::table('contact_address')->where('address','!=','Online')->get();
                return view('frontend/online_course/detail',compact('record','teachers','courses','studies','contact_add','coursess'));   
       }

       public function about(Request $request){
            $about = DB::table('about')->first();
           return view('frontend/home/about',compact('about')); 
       }
 
 

}
