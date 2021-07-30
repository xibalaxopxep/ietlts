<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rule;
use DB;
use Carbon\Carbon;

class RuleController extends Controller {



    public function index() {
        $records = Rule::orderBy('type','asc')->get();
        return view('backend/rule/index', compact('records'));
    }

    public function create() {
        $count_ordering = Route::count();
        return view('backend/route_online/create',compact('count_ordering'));
    }

    public function store(Request $request) {
        $input = $request->all();
        $route_online = new Route();
        $validator = \Validator::make($input, $route_online->validateCreate());
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
        $res = $route_online->create($input);

        //Thêm danh mục sản phẩm
        if ($res) {
            return redirect()->route('admin.route_online.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.route_online.index')->with('error', 'Tạo mới thất bại');
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
        return view('backend/route_online/edit', compact('record','studies','teachers'));
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
        $route_online = new Route();
        $validator = \Validator::make($input, $route_online->validateUpdate($id));
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
        $res = $route_online->find($id)->update($input);

        //Thêm danh mục sản phẩm
        if ($res) {
            return redirect()->route('admin.route_online.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.route_online.index')->with('error', 'Tạo mới thất bại');
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



 

}
