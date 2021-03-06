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
        $records = DB::table('news_category')->join('category','category.id','=','news_category.category_id')->join('news','news.id','=','news_category.news_id')->where('category.id',16)->where('news.status', 1)->orderBy('news.ordering','desc')->paginate(7);
        if(count($records) == 0){
              return redirect()->back()->with('error','Trang này hiện chưa có bài viết');
          }
        $hot_news = DB::table('news_category')->join('category','category.id','=','news_category.category_id')->join('news','news.id','=','news_category.news_id')->where('category.id',16)->where('news.status', 1)->where('news.is_hot',1)->orderBy('news.ordering','desc')->get();
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


    public function news_category(Request $request, $alias) {  

        $records = DB::table('news')->join('news_category','news.id','=','news_category.news_id')->join('category','category.id','=','news_category.category_id')->where('category.alias',$alias)->select('*','news.title as title','news.alias as alias','news.description as description','news.images as images')->orderBy('news.ordering','desc')->paginate(7);

          if(count($records) == 0){
              return redirect()->back()->with('error','Danh mục hiện chưa có bài viết');
          }
        $hot_news = DB::table('news')->orderBy('ordering','desc')->limit(7)->where('is_hot',1)->get();
        return view('frontend/news/news_category', compact('records', 'hot_news','alias'));
    }

}
