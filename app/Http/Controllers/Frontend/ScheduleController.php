<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class ScheduleController extends Controller {


    public function index(Request $request) {  
      $schedule_online = DB::table('schedule')->join('course','course.id','=','schedule.course_id')->select('*','schedule.title as schedule_name','course.title as course_name','course.id as course_id','schedule.id as schedule_id')->where('schedule.type',1)->get();


          $schedule_offline = DB::table('schedule')->join('contact_address','contact_address.id','=','schedule.contact_address_id')->join('course','course.id','=','schedule.course_id')->select('*','schedule.title as schedule_name','contact_address.name as contact_address_name','course.title as course_name','course.id as course_id','schedule.id as schedule_id','contact_address.id as contact_address_id')->where('schedule.type',2)->get()->groupBy('contact_address_name');
         
        return view('frontend/schedule/list', compact('schedule_online','schedule_offline'));

    }
}
