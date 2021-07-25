<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TemplateSetting;
use DB;

class TemplateSettingController extends Controller {


    public function index() {
        $records = DB::table('template_setting')->orderBy('ordering','asc')->get();
        return view('backend/template_setting/index', compact('records'));
    }
    public function create() {
        
        return view('backend/template_setting/create');
    }

    public function store(Request $request) {
        $input = $request->all();
          $input['status'] = isset($input['status']) ? 1 : 0;
        $get_avatar = $request->image;
        if($get_avatar){
            $get_name_image = $get_avatar->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_avatar->getClientOriginalExtension();
            $get_avatar->move('upload/images/',$new_image);
            $input['image'] = '/upload/images/'.$new_image;

        }
        TemplateSetting::create($input);
        return redirect()->route('admin.template_setting.index')->with('success', 'Tạo mới thành công');
    }

    public function edit($id) {
        $record = DB::table('template_setting')->where('id',$id)->first();
        return view('backend/template_setting/edit',compact('record'));
    }

       public function update(Request $request,$id) {
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0;
        $get_avatar = $request->image;
        if($get_avatar){
            $get_name_image = $get_avatar->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_avatar->getClientOriginalExtension();
            $get_avatar->move('upload/images/',$new_image);
            $input['image'] = '/upload/images/'.$new_image;

        }
        TemplateSetting::find($id)->update($input);
        return redirect()->route('admin.template_setting.index')->with('success', 'Cập nhật thành công');
    }

    public function update_multiple(Request $request) {
        $data = $request->all();
        
        if($request->action == "save"){      
           $records = TemplateSetting::orderBy('ordering','asc')->get();
           foreach ($records as $key => $record) {
               if($record->ordering != $data['orderBy'][$key]){
                    DB::table('template_setting')->where('id',$record->id)->update(['ordering'=>$data['orderBy'][$key]]);
               }
           }
           return redirect()->back()->with('success',"Cập nhật thành công");
        }
        else{
            if($request->check == null){
            return redirect()->back()->with('error',"Vui lòng chọn ít nhất một khối");
            }

            if($request->action == "delete"){
               foreach($data['check'] as $key => $chk){
                     DB::table('template_setting')->where('id',$chk)->delete();
               }  
               return redirect()->back()->with('success',"Xoá thành công");
            }
            elseif($request->action == "active"){
               foreach($data['check'] as $key => $chk){
                     DB::table('template_setting')->where('id',$chk)->update(['status'=>1]);
               }  
               return redirect()->back()->with('success',"Cập nhật thành công");
            }else{
                  foreach($data['check'] as $key => $chk){
                     DB::table('template_setting')->where('id',$chk)->update(['status'=>0]);
               } 
               } 
           return redirect()->back()->with('success',"Cập nhật thành công");
        }
    }


}
