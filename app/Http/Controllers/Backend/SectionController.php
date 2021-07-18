<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TestRepository;
use Repositories\CategoryRepository;
use DB;
use Carbon\Carbon;
use App\Section;

class SectionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(TestRepository $testRepo, CategoryRepository $categoryRepo) {
        $this->testRepo = $testRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function index(Request $request) {
        $test_id = $request->test_id;
        if($test_id != null ){
           $records =DB::table('section')->join('test','test.id','=','section.test_id')->where('test.id',$test_id)->select('*','section.id as id')->get();
        }
        elseif($test_id == null || $test_id == "0"){
             $records =DB::table('section')->join('test','test.id','=','section.test_id')->select('*','section.id as id')->get();
        }
        $tests = DB::table('test')->get();
        return view('backend/section/index', compact('records','tests','test_id'));
    }


    public function create() {
        $options = DB::table('test')->get();
        $count_ordering =DB::table('section')->count();
        return view('backend/section/create', compact('options','count_ordering'));
    }

    public function store(Request $request) {
        $section = new Section();
        $input = $request->all();
        if($input['section_type'] == 1){
        $validator = \Validator::make($input, $section->validateCreate1());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        }else{
        $validator = \Validator::make($input, $section->validateCreate2());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        }
        $get_image=$request->file;
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/files/',$new_image);
            $input['file'] = '/upload/files/'.$new_image;
        }
        $input['created_at'] = Carbon::now('Asia/Ho_Chi_Minh'); 
        $res = $section->create($input);   
        if ($res) {
            return redirect()->route('admin.section.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.section.index')->with('error', 'Tạo mới thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $record = Section::find($id);
        if($record){
        $options = DB::table('test')->get();
        //Lấy danh sách id thuộc tính của sản phẩm
        return view('backend/section/edit', compact('record', 'options'));
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
        $section = new Section();
        $input = $request->all();
        $record = DB::table('section')->where('id',$id)->first();
        if($record->section_type == 1){
        $validator = \Validator::make($input, $section->validateUpdate1($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        }else{
        $validator = \Validator::make($input, $section->validateUpdate2($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        }
        $get_image=$request->file;
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/files/',$new_image);
            $input['file'] = '/upload/files/'.$new_image;
        }
        $input['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh'); 
        $res = $section->find($id)->update($input);   
        if ($res) {
            return redirect()->route('admin.section.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('admin.section.index')->with('error', 'Cập nhật thất bại');
        }
    }

     public function update_multiple(Request $request) {
        $data = $request->all();
        if($request->check == null){
            return redirect()->back()->with('error',"Vui lòng chọn ít nhất một section");
        }
        if($request->action == "save"){      
           foreach($data['check'] as $key => $chk){
                 DB::table('section')->where('id',$chk)->update(['ordering'=>$data['orderBy'][$key]]);
           }  
           return redirect()->back()->with('success',"Cập nhật thành công");
        }
        elseif($request->action == "delete"){
           foreach($data['check'] as $key => $chk){
                 DB::table('section')->where('id',$chk)->delete();
           }  
           return redirect()->back()->with('success',"Xoá thành công");
        }
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       DB::table('section')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

   

}
