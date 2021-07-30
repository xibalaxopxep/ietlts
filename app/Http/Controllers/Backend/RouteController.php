<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Route;
use DB;
use Carbon\Carbon;

class RouteController extends Controller {



    public function index() {
        $records = Route::orderBy('ordering','desc')->where('is_pro',1)->get();

        return view('backend/route/index', compact('records'));
    }

    public function create() {
        $count_ordering = Route::count();
        return view('backend/route/create',compact('count_ordering'));
    }

    public function store(Request $request) {
        $input = $request->all();
        $route = new Route();
        $validator = \Validator::make($input, $route->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $get_image=$request->image;
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/images/',$new_image);
            $input['image'] = '/upload/images/'.$new_image;
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $res = $route->create($input);

        //Thêm danh mục sản phẩm
        if ($res) {
            return redirect()->route('admin.route.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.route.index')->with('error', 'Tạo mới thất bại');
        }
    }


    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $teachers = DB::table('teacher')->get();
        $studies = DB::table('study')->get();
        $record = Route::find($id);
       if($record){
        //Lấy danh sách id thuộc tính của sản phẩm
        return view('backend/route/edit', compact('record','studies','teachers'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $input = $request->all();
        $route = new Route();
        $validator = \Validator::make($input, $route->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['teacher_id'] = implode(',',$input['teacher_id']);
        $input['study_id'] = implode(',',$input['study_id']);
        $get_image=$request->image;
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/images/',$new_image);
            $input['image'] = '/upload/images/'.$new_image;
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $res = $route->find($id)->update($input);

        //Thêm danh mục sản phẩm
        if ($res) {
            return redirect()->route('admin.route.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.route.index')->with('error', 'Tạo mới thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Teacher::destroy($id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function update_multiple(Request $request) {
        $data = $request->all();
        
        if($request->action == "save"){      
          $records = Route::orderBy('ordering','desc')->get();
           foreach ($records as $key => $record) {
               if($record->ordering != $data['orderBy'][$key]){
                    DB::table('route')->where('id',$record->id)->update(['ordering'=>$data['orderBy'][$key]]);
               }
           }
           return redirect()->back()->with('success',"Cập nhật thành công");
        }
        else{
            if($request->check == null){
            return redirect()->back()->with('error',"Vui lòng chọn ít nhất một khoá học");
            }

            if($request->action == "delete"){
               foreach($data['check'] as $key => $chk){
                     DB::table('route')->where('id',$chk)->delete();
               }  
               return redirect()->back()->with('success',"Xoá thành công");
            }
            elseif($request->action == "active"){
               foreach($data['check'] as $key => $chk){
                     DB::table('route')->where('id',$chk)->update(['status'=>1]);
               }  
               return redirect()->back()->with('success',"Cập nhật thành công");
            }else{
                  foreach($data['check'] as $key => $chk){
                     DB::table('route')->where('id',$chk)->update(['status'=>0]);
               } 
               } 
           return redirect()->back()->with('success',"Cập nhật thành công");
        }
    }

    public function getProductAttributes($input) {
        $attributes = array();
        foreach ($input['attribute'] as $key => $val) {
            $attributes[$key] = ['value' => $val];
        }
        foreach ($input['attribute_select'] as $key => $val) {
            if ($val != null) {
                $attributes[$val] = ['value' => null];
            }
        }
        return $attributes;
    }



    public function addPostHistory($test) {

        $post_history['item_id'] = $test->id;
        $post_history['created_at'] = $test->created_at;
        $post_history['updated_at'] = $test->post_schedule ?: $test->updated_at;
        $post_history['module'] = 'test';
        $this->postHistoryRepo->create($post_history);
    }

}
