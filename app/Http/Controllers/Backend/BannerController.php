<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use DB;
use Carbon\Carbon;

class BannerController extends Controller {



    public function index(Request $request) {
        $records = DB::table('banner')->orderBy('ordering','desc')->get();
        return view('backend/banner/index', compact('records'));
    }


    public function create() {
           $count_ordering =DB::table('banner')->count();
        return view('backend/banner/create', compact('count_ordering'));
    }

    public function store(Request $request) {
        $banner = new Banner();
        $input = $request->all();
        $validator = \Validator::make($input, $banner->validateCreate());
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
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['created_at'] = Carbon::now('Asia/Ho_Chi_Minh'); 
        $res = $banner->create($input);   
        if ($res) {
            return redirect()->route('admin.banner.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.banner.index')->with('error', 'Tạo mới thất bại');
        }
    }


    public function show($id) {
        //
    }


    public function edit($id) {
        $record = Banner::find($id);
        if($record){
        return view('backend/banner/edit', compact('record'));
        }else{
            abort(404);
        }
    }


    public function update(Request $request, $id) {
        $banner = new Banner();
        $input = $request->all();
        $validator = \Validator::make($input, $banner->validateUpdate($id));
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
        $res = $banner->find($id)->update($input);   
        if ($res) {
            return redirect()->route('admin.banner.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.banner.index')->with('error', 'Tạo mới thất bại');
        }
    }

   public function update_multiple(Request $request) {
        $data = $request->all();
        
        if($request->action == "save"){      
            $records = DB::table('banner')->where('type',$request->type)->orderBy('ordering','desc')->get();
           foreach ($records as $key => $record) {
               if($record->ordering != $data['orderBy'][$key]){
                    DB::table('banner')->where('id',$record->id)->update(['ordering'=>$data['orderBy'][$key]]);
               }
           }
           return redirect()->back()->with('success',"Cập nhật thành công");
        }
        else{
            if($request->check == null){
            return redirect()->back()->with('error',"Vui lòng chọn ít nhất một banner");
            }

            if($request->action == "delete"){
               foreach($data['check'] as $key => $chk){
                     DB::table('banner')->where('id',$chk)->delete();
               }  
               return redirect()->back()->with('success',"Xoá thành công");
            }
            elseif($request->action == "active"){
               foreach($data['check'] as $key => $chk){
                     DB::table('banner')->where('id',$chk)->update(['status'=>1]);
               }  
               return redirect()->back()->with('success',"Cập nhật thành công");
            }else{
                  foreach($data['check'] as $key => $chk){
                     DB::table('banner')->where('id',$chk)->update(['status'=>0]);
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
    public function destroy($id) {
       DB::table('banner')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

   

}
