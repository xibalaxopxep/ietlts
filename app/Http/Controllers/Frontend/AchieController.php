<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\NewsCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AchieController extends Controller {


    public function index(Request $request, $alias = '') {  
        $records = DB::table('best')->orderBy('ordering','desc')->limit(8)->get();
        return view('frontend/achie/list', compact('records'));
    }

   

}
