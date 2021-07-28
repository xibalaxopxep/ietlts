<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\NewsCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Repositories\NewsRepository;
use Repositories\CategoryRepository;
use DB;

class NewsController extends Controller {

    //
    public function __construct(NewsRepository $newsRepo, CategoryRepository $categoryRepo, NewsCategoryRepository $newsCategoryRepo) {
        $this->newsRepo = $newsRepo;
        $this->categoryRepo = $categoryRepo;
        $this->newsCategoryRepo = $newsCategoryRepo;
    }

    public function index(Request $request, $alias = '') {  
        $records = DB::table('news')->orderBy('ordering','desc')->paginate(7);
        $hot_news = DB::table('news')->orderBy('ordering','desc')->limit(7)->where('is_hot',1)->get();
        return view('frontend/news/list', compact('records', 'hot_news'));
    }

    public function detail($alias) {
        $record = DB::table('news')->where('alias',$alias)->first();
        DB::table('news')->where('alias',$alias)->update(['view_count'=>$record->view_count + 1]);
        $category = DB::table('news_category')->where('news_id',$record->id)->pluck('category_id')->first();
        $related_category = DB::table('news_category')->where('category_id', $category)->get()->pluck('news_id');
        $related_news = DB::table('news')->whereIn('id',$related_category)->where('id','!=',$record->id)->orderBy('created_at','desc')->limit(4)->get();
        $featured_news =  DB::table('news')->where('is_hot',1)->where('id','!=',$record->id)->orderBy('created_at','desc')->limit(2)->get();
        //$url = \Illuminate\Support\Facades\Request::url();
            return view('frontend/news/detail', compact('record', 'featured_news', 'category', 'related_news'));

    }

}
