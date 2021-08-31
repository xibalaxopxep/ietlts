<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use DB;

class CourseController extends Controller {
	public function detail($alias){
	       $courses  = DB::table('course')->where('is_online',null)->where('is_pro',null)->orderBy('ordering','desc')->where('status', 1)->limit(3)->get();
         $record = DB::table('course')->where('alias',$alias)->first();
         $teachers= DB::table('teacher')->whereIn('id',explode(',',$record->teacher_id))->get();
         $studies= DB::table('study')->whereIn('id',explode(',',$record->study_id))->get();
         $contact_add = DB::table('contact_address')->where('address','!=','Online')->get();
          $schedules = DB::table('schedule')->join('contact_address','contact_address.id','=','schedule.contact_address_id')->join('course','course.id','=','schedule.course_id')->select('*','schedule.title as schedule_name','contact_address.name as contact_address_name','course.title as course_name','course.id as course_id','schedule.id as schedule_id','contact_address.id as contact_address_id')->where('course.alias',$alias)->where('schedule.type',2)->get()->groupBy('contact_address_name');
         return view('frontend/course/detail',compact('record','teachers','studies','schedules','contact_add','courses'));
	}
}