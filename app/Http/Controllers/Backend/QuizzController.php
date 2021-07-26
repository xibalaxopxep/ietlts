<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quizz;
use DB;
use Auth;
use Carbon\Carbon;

class QuizzController extends Controller {
	public function index(){
        $records = Quizz::join('test','test.id',"=","quizz.test_id")->select('*','quizz.title as quizz_title','quizz.id as id')->orderBy('test.id','desc')->orderBy('quizz.id','asc')->get();
        $questions = DB::table('question')->get();
        $index = 0;
    	$first = 0;
    	$dem = 0;
    	$count = 0;
    	$test_index = $records[0]->test_id;
        foreach ($records as $key => $record) {
        	if($key >0){
        		$test_index = $records[$key-1]->test_id;
        	}
        	$test_id= $record->test_id;
        	if($test_id != $test_index){
        		$index = 0;
		    	$first = 0;
		    	$dem = 0;
        	}
        	foreach ($questions as  $question) {
        	    if($question->quizz_id == $record->id){
        	    	$count++;
        	    	$dem++;
        	    }
            }
            if($first == 0){
            	$index = 1;
            	$first = 1;
            }
            else{
            	$index = $dem - $count + 1;
            }
            $count=0;
            $records[$key]['dem'] = $dem; 
            $records[$key]['index'] = $index; 
        }
        //dd($records);
        //$tests = DB::table("test")->where('type', 1)->get(); 
        return view('backend/quizz/index',compact('records','questions'));
	}

	public function create(Request $request){
		$type = $request->type;
        $tests = DB::table('test')->get();
        $sections = DB::table('section')->get();
		if($type==1){
            
			return view('backend/quizz/create',compact('type','tests','sections'));
		}
		else{
			return view('backend/quizz/create',compact('type','tests'));
		}
        return view('backend/quizz.create',compact('type'));
	}

	public function store(Request $request){
		 $input = $request->except('_token');
		 Quizz::create($input);
		 return redirect()->route('admin.quizz.index');
	}

	public function edit($id){
        $record = DB::table('quizz')->where('id',$id)->first();
        if($record){
	        $tests = DB::table('test')->where('type',$record->type_quizz)->get();
	        $questions = DB::table('question')->where('quizz_id',$id)->get();
	        return view('backend/quizz/edit',compact('record','tests','questions'));
	    }else{
	    	abort(404);
	    }
	}

	public function destroy($id){
        DB::table('quizz')->where('id',$id)->delete();
        DB::table('question')->where('quizz_id',$id)->delete();
        return redirect()->back()->with('success','Xoá thành công');
	}

}


