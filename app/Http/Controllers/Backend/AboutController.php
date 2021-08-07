<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Auth;

class AboutController extends Controller {
    

    
    public function index() {
   
        $record = DB::table('about')->first();
        return view('backend/about/index', compact('record'));
      
    }




    public function edit($id) {
     
           $record = DB::table('about')->first();
            if($record){
                return view('backend/about/edit', compact('record'));
            
            }else{
                abort(404);
            }
    }


    public function update(Request $request, $id) {
        $input = $request->except('_token');
        $get_avatar = $request->image;
        if($get_avatar){
            $get_name_image = $get_avatar->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_avatar->getClientOriginalExtension();
            $get_avatar->move('upload/images/',$new_image);
            $input['image'] = '/upload/images/'.$new_image;
        }
        DB::table('about')->where('id',$id)->update($input);
        return redirect()->route('admin.about.index')->with('success','Cập nhật thành công');
  
       
    }
}


