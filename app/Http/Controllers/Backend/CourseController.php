<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use DB;
use Carbon\Carbon;

class CourseController extends Controller {



    public function index() {
        $records = Course::all();
        return view('backend/course/index', compact('records'));
    }

    public function create() {
        return view('backend/course/create');
    }

    public function store(Request $request) {
        $input = $request->all();
        $course = new Course();
        $validator = \Validator::make($input, $course->validateCreate());
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
        $res = $course->create($input);

        //Thêm danh mục sản phẩm
        if ($res) {
            return redirect()->route('admin.course.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.course.index')->with('error', 'Tạo mới thất bại');
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
        $record = Course::find($id);
       if($record){
        //Lấy danh sách id thuộc tính của sản phẩm
        return view('backend/course/edit', compact('record'));
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
        $course = new Course();
        $validator = \Validator::make($input, $course->validateUpdate($id));
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
        $res = $course->find($id)->update($input);

        //Thêm danh mục sản phẩm
        if ($res) {
            return redirect()->route('admin.course.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.course.index')->with('error', 'Tạo mới thất bại');
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
