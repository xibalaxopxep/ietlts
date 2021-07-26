<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\NewsCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TestController extends Controller {


    public function index(Request $request) {  
        return view('frontend/test/index');
    }

   

}
