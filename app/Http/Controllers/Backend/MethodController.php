<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;

class MethodController extends Controller {
	

	

	public function edit($id){
        $record = DB::table('method')->where('id',1)->first();
        return view('backend/method/edit',compact('record'));
	}

	public function update(Request $request,$id){
		$input = $request->except('_token');
       
        DB::table('method')->where('id',1)->update($input);
        return redirect()->back()->with('success','Cập nhật thành công');
    }
	

}


