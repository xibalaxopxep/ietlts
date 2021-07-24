<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Repositories\CategoryRepository;
use Repositories\ConstructionRepository;
use Repositories\KeywordRepository;
use DB;

class FrontendController extends Controller {

    public function __construct(CategoryRepository $categoryRepo, KeywordRepository $keywordRepo) {
        $this->categoryRepo = $categoryRepo;
        $this->keywordRepo = $keywordRepo;
    }

    public function index() {
        $courses  = DB::table('course')->orderBy('ordering','desc')->where('status', 1)->limit(6)->get();
        $teachers = DB::table('teacher')->orderBy('ordering','desc')->where('status', 1)->limit(3)->get();
        $news_hots = DB::table('news')->orderBy('ordering','desc')->where('status', 1)->where('is_hot',1)->limit(3)->get();
        $news_ielts = DB::table('news')->orderBy('ordering','desc')->where('status', 1)->where('is_ielts',1)->limit(3)->get();
        
        $best_member = DB::Table('best')->where('is_best', 1)->where('status',1)->limit(3)->orderBy('ordering','desc')->get();

        return view('frontend/home/index',compact('courses','teachers','news_ielts','news_hots','best_member'));
        
    }

}
