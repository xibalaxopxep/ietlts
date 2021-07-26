<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\NewsCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TestController extends Controller {


    public function index(Request $request) {  
    	$test = DB::table('test')->where('status',1)->first();
        $section = DB::table('section')->where('test_id',$test->id)->get();
        $questions = DB::table('question')->join('quizz','quizz.id','=','question.quizz_id')->get()->groupBy('title');
        foreach ($questions as $key => $question) {
        	foreach ($question as $key1 => $quest) {
        		if($quest->question_type == 2){
        			 $index = str_replace("[input]", "<input type='text'>", $quest->question);
        			 $question[$key1]->question = $index;
        		}
        		elseif($quest->question_type == 5){
                     $index = str_replace("[", "<a href='#'>", $quest->question);
                     $index2 = str_replace("]", "</a>", $index);
                     $question[$key1]->question = $index2;
        		}
        	}
        }
        return view('frontend/test/index',compact('questions'));
    }

   

}
