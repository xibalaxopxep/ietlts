<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use DB;

class QuestionController extends Controller {

    public function create_question(Request $request) {
        $input = $request->all();

        if($input['question_type'] == 1){
	        $input['list_answer'] = implode(',',$input['data']);
	        $input['answer'] = $input['data'][$input['radioValue']];
	        unset($input['data']);
	        unset($input['radioValue']);
	        $id = DB::table('question')->insertGetId($input);

	        $record= DB::table('question')->where('id',$id)->first();
        }elseif($input['question_type'] == 2){
        	unset($input['data']);
        	$id = DB::table('question')->insertGetId($input);
	        $record= DB::table('question')->where('id',$id)->first();
        }
        return response()->json(array('success' => true,'record'=>$record));
    }

    
}
