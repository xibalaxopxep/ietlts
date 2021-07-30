<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use DB;

class CourseController extends Controller {
	public function detail($alias){
         $record = DB::table('course')->where('alias',$alias)->first();
         $teachers= DB::table('teacher')->whereIn('id',explode(',',$record->teacher_id))->get();
         $studies= DB::table('study')->whereIn('id',explode(',',$record->study_id))->get();
         return view('frontend/course/detail',compact('record','teachers','studies'));
	}
}