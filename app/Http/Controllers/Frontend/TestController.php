<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\NewsCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Str;
use Session;

class TestController extends Controller {


    public function index(Request $request,$page) {
        if(!Session::get('contact_id')){
            return redirect()->back()->with('error','Vui lòng đăng kí để làm bài test');
        }
        $sections = DB::table('section')->orderBy('ordering','asc')->join('quizz','quizz.section_id','=','section.id')->select('*','section.name as section_name','quizz.id as quizz_id','quizz.title as name','section.id as section_id','section.ordering as order')->get()->groupBy('order');
        $count = count($sections);
        $questions = DB::table('question')->get();

        //  $questions = DB::table('section')->join('quizz','quizz.section_id','=','section.id')->join('question','question.quizz_id','=','quizz.id')->select('*','section.id as section_id','section.name as section_name','quizz.title as quizz_title')->get()->groupBy('quizz_title');
       // $section = DB::table('section')->where('test_id',$test->id)->get()->pluck('name');

    	foreach ($questions as $key1 => $quest) {
    		if($quest->question_type == 2){
    			 $index = str_replace("[input]", "<input name='$quest->id' type='text'>", $quest->question);
    			 $questions[$key1]->question = $index;
    		}
    		elseif($quest->question_type == 5){
                 $index = str_replace("[",'<input name='.$quest->id.' value='.$quest->answer.' type="radio">', $quest->question);
                 $index2 = str_replace("]", "", $index);
                 $questions[$key1]->question = $index2;
    		}
    	}
        if($page == null ){
            $page = 0;
           
        }

        if($page<$count-1){
            $button = "Tiếp theo";
        }
        elseif ($page==$count-1) {
             $button = "Kết thúc";

        }
        elseif ($page==$count) {
             $button = "Kết thúc";
             return redirect()->route('test.result');
        }
        elseif ($page>$count) {
             abort(404);
        }
 
        $sections =  $sections[$page+1];
        return view('frontend/test/index',compact('questions','page','sections','button'));
    }

    public function submit(Request $request, $page){
          $data = $request->except('_token');
          foreach($data as $key=> $data){
                $input['question_id'] = $key;
                $input['answer'] = $data;
                $input['contact_id'] = Session::get('contact_id');
                DB::table('result')->insert($input);
           }
           $page++;
        return redirect()->route('test.index',$page);
    }

    public function result(){
         $contact_id = Session::get('contact_id');

         if(!$contact_id){
             return redirect()->route('home.index')->with('error','Phiên test đã hết hạn. Vui lòng thử lại');
         }
         $res = DB::table('result')->where('contact_id',$contact_id)->get();
   
         foreach($res as $re){
            //  DB::table('result')->where('id',$re->id)->update(['true'=>0]);  
            $true = DB::table('question')->where('id',$re->question_id)->first();
            if($true->answer == $re->answer){
            DB::table('result')->where('id',$re->id)->update(['true'=>1]);         
        }
        $scores= DB::table('score')->get()->groupBy('type');
        $result = DB::table('result')->join('question','question.id','=','result.question_id')->join('quizz','quizz.id','=','question.quizz_id')->where('contact_id',$contact_id)->get();
        $result= $result->groupBy('section_type');
        foreach ($result as $key => $value) {
            $dem = 0;
            $true = 0;
            $content = "";
            foreach ($value as $key1 => $val) {
                $dem++;
                if($val->true == 1){
                    $true++;
                }
            }
            $result[$key]->dem = $dem;
            $result[$key]->true = $true;
              foreach($scores[$key] as $score){
                  if($score->from <= $true && $score->to >= $true){
                    $content = $score->content;
                  }
               }
               $result_final = DB::table('result_final')->where('contact_id',$contact_id)->get();

               if( count($result_final) < 5){
                   DB::table('result_final')->insert(['contact_id'=> $contact_id,'type'=>$key,'true_number'=>$true,'question_number'=>$dem,'review'=>$content]);
                }
        }
     }
     $true_number = count(DB::table('result')->where('contact_id',$contact_id)->where('true',1)->get());
     $question_numer = count($res);
     $rules = DB::table('rule')->get();
     foreach($rules as $key => $value){
           if($true_number<=$value->to && $true_number>=$value->from ){
                $rule = $rules[$key];
           }
     }
     
     $courses= DB::table('course')->whereIn('id',explode(',', $rule->courses))->get();
     
         return view('frontend/test/result',compact('question_numer','true_number','result','courses','scores'));
    }

    public function signup(){
        return view('frontend/test/signup');
    }

    public function signup_submit(Request $request){
            $input = $request->except('_token');
            $input['type'] = 3;
            $res = DB::table('contact')->insertGetId($input);
            if(Session::get('contact_id')){
                Session::flush('contact_id');
            }
             Session::put('contact_id',$res);
            return redirect()->route('test.index',0);
       }

   

        
}
