<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\NewsCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TeacherController extends Controller {


    public function index(Request $request, $alias = '') {  
        $records = DB::table('teacher')->orderBy('ordering','desc')->limit(6)->get();
        return view('frontend/teacher/list', compact('records'));
    }

   

}
