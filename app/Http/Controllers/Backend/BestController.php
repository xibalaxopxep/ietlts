<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Best;
use DB;
use Carbon\Carbon;
use Route;

class BestController extends Controller {



    public function index(Request $request) {
        $curent_route = Route::currentRouteName();
        $records = DB::table('best')->orderBy('ordering','desc')->get();
        return view('backend/best/index', compact('records'));
    }


    public function create() {
           $count_ordering =DB::table('best')->count();
        return view('backend/best/create', compact('count_ordering'));
    }

    public function store(Request $request) {
        $best = new Best();
        $input = $request->all();
        $validator = \Validator::make($input, $best->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $get_image = $request->image;
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/images/',$new_image);
            $input['image'] = '/upload/images/'.$new_image;
        }
        $get_avt = $request->avatar;
        if($get_avt){
            $get_name_image = $get_avt->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_avt->getClientOriginalExtension();
            $get_avt->move('upload/images/',$new_image);
            $input['avatar'] = '/upload/images/'.$new_image;
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['is_best'] = isset($input['is_best']) ? 1 : 0;
        $input['created_at'] = Carbon::now('Asia/Ho_Chi_Minh'); 
        $res = $best->create($input);   
        if ($res) {
            return redirect()->route('admin.best.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.best.index')->with('error', 'Tạo mới thất bại');
        }
    }


    public function show($id) {
        //
    }


    public function edit($id) {
        $record = best::find($id);
        if($record){
        return view('backend/best/edit', compact('record'));
        }else{
            abort(404);
        }
    }


    public function update(Request $request, $id) {
        $best = new Best();
        $input = $request->all();
        $validator = \Validator::make($input, $best->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $get_image = $request->image;
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/images/',$new_image);
            $input['image'] = '/upload/images/'.$new_image;
        }
        $get_avt = $request->avatar;
        if($get_avt){
            $get_name_image = $get_avt->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_avt->getClientOriginalExtension();
            $get_avt->move('upload/images/',$new_image);
            $input['avatar'] = '/upload/images/'.$new_image;
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['is_best'] = isset($input['is_best']) ? 1 : 0;
        $input['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh'); 
        $res = $best->find($id)->update($input);   
        if ($res) {
            return redirect()->route('admin.best.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.best.index')->with('error', 'Tạo mới thất bại');
        }
    }

    public function destroy($id) {
        dd('1');
       DB::table('best')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

   public function update_multiple(Request $request) {
        $data = $request->all();
        
        if($request->action == "save"){      
            $records = DB::table('best')->where('type',$request->type)->orderBy('ordering','desc')->get();
           foreach ($records as $key => $record) {
               if($record->ordering != $data['orderBy'][$key]){
                    DB::table('best')->where('id',$record->id)->update(['ordering'=>$data['orderBy'][$key]]);
               }
           }
           return redirect()->back()->with('success',"Cập nhật thành công");
        }
        else{
            if($request->check == null){
            return redirect()->back()->with('error',"Vui lòng chọn ít nhất một best");
            }

            if($request->action == "delete"){
               foreach($data['check'] as $key => $chk){
                     DB::table('best')->where('id',$chk)->delete();
               }  
               return redirect()->back()->with('success',"Xoá thành công");
            }
            elseif($request->action == "active"){
               foreach($data['check'] as $key => $chk){
                     DB::table('best')->where('id',$chk)->update(['status'=>1]);
               }  
               return redirect()->back()->with('success',"Cập nhật thành công");
            }else{
                  foreach($data['check'] as $key => $chk){
                     DB::table('best')->where('id',$chk)->update(['status'=>0]);
               } 
               } 
           return redirect()->back()->with('success',"Cập nhật thành công");
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


   

}
