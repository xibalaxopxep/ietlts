<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BlockRepository;

class BlockController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(BlockRepository $blockRepo) {
        $this->blockRepo = $blockRepo;
    }

    public function index() {
        //
        $records = $this->blockRepo->all();
        return view('backend/block/index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend/block/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $input = $request->all();
        $validator = \Validator::make($input, $this->blockRepo->validate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $get_images = $request->image;
        if($get_images){
            $get_name_image = $get_images->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_images->getClientOriginalExtension();
            $get_images->move('upload/images/',$new_image);
            $input['image'] = '/upload/images/'.$new_image;
        }
        // $input['include_news'] = isset($input['include_news']) ? 1 : 0;
        // $input['include_video'] = isset($input['include_video']) ? 1 : 0;
        // $input['include_teacher'] = isset($input['include_teacher']) ? 1 : 0;
        // $input['include_best'] = isset($input['include_best']) ? 1 : 0;
        // $input['include_dangky'] = isset($input['include_dangky']) ? 1 : 0;
        // $input['include_schedule'] = isset($input['include_schedule']) ? 1 : 0;
        if (isset($input['status'])) {
            $input['status'] = 1;
        } else {
            $input['status'] = 0;
        }
        $block = $this->blockRepo->create($input);
        if ($block->id) {
            return redirect()->route('admin.block.index')->with('success', 'Tạo mới thành công');
        } else {
            return redirect()->route('admin.block.index')->with('error', 'Tạo mới thất bại');
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
        $record = $this->blockRepo->find($id);
        return view('backend/block/edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
        $input = $request->all();
        $validator = \Validator::make($input, $this->blockRepo->validate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $get_images = $request->image;
        if($get_images){
            $get_name_image = $get_images->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_images->getClientOriginalExtension();
            $get_images->move('upload/images/',$new_image);
            $input['image'] = '/upload/images/'.$new_image;
        }
        // $input['include_news'] = isset($input['include_news']) ? 1 : 0;
        // $input['include_video'] = isset($input['include_video']) ? 1 : 0;
        // $input['include_teacher'] = isset($input['include_teacher']) ? 1 : 0;
        // $input['include_best'] = isset($input['include_best']) ? 1 : 0;
        // $input['include_dangky'] = isset($input['include_dangky']) ? 1 : 0;
        // $input['include_schedule'] = isset($input['include_schedule']) ? 1 : 0;
        if (isset($input['status'])) {
            $input['status'] = 1;
        } else {
            $input['status'] = 0;
        }
        $res = $this->blockRepo->update($input, $id);
        if ($res) {
            return redirect()->route('admin.block.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('admin.block.index')->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $res = $this->blockRepo->delete($id);
        if ($res) {
            return redirect()->back()->with('success', 'Xóa thành công');
        } else {
            return redirect()->back()->with('error', 'Xóa thất bại');
        }
    }

}
