<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;
use DB;
use Carbon\Carbon;

class ScheduleController extends Controller {



    public function index(Request $request) {
        $records = DB::table('schedule')->get();
        $courses = DB::table('course')->get();
        $address = DB::table('contact_address')->get();
        return view('backend/schedule/index', compact('records','courses', 'address'));
    }


    public function create() {
        $count_ordering =DB::table('schedule')->count();
        $courses = DB::table('course')->get();
        $address = DB::table('contact_address')->get();
        return view('backend/schedule/create', compact('count_ordering','courses', 'address'));
    }

    public function store(Request $request) {
        $schedule = new Schedule();
        $input = $request->all();
        $validator = \Validator::make($input, $schedule->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['created_at'] = Carbon::now('Asia/Ho_Chi_Minh'); 
        $res = $schedule->create($input);   
        if ($res) {
            return redirect()->route('admin.schedule.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.schedule.index')->with('error', 'Tạo mới thất bại');
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
        $record = Schedule::find($id);
        if($record){
        $courses = DB::table('course')->get();
        $address = DB::table('contact_address')->get();
        return view('backend/schedule/edit', compact('record','courses','address'));
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
         $schedule = new Schedule();
        $input = $request->all();
        $validator = \Validator::make($input, $schedule->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input['status'] = isset($input['status']) ? 1 : 0;
        $input['created_at'] = Carbon::now('Asia/Ho_Chi_Minh'); 
        $res = $schedule->find($id)->update($input);   
        if ($res) {
            return redirect()->route('admin.schedule.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('admin.schedule.index')->with('error', 'Cập nhật thất bại');
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
       DB::table('schedule')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

   

}
