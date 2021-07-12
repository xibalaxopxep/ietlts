<?php

namespace App\Http\Controllers\Frontend;

use App\Construction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Repositories\ConstructionRepository;
use Repositories\CategoryRepository;
use Repositories\ItemRepository;
use Repositories\GalleryRepository;
use Repositories\ProjectRepository;

class ConstructionController extends Controller {

    public function __construct(ProjectRepository $projectRepo, GalleryRepository $galleryRepo, ConstructionRepository $constructionRepo, CategoryRepository $categoryRepo, ItemRepository $itemRepo) {
        $this->constructionRepo = $constructionRepo;
        $this->categoryRepo = $categoryRepo;
        $this->itemRepo = $itemRepo;
        $this->galleryRepo = $galleryRepo;
        $this->projectRepo = $projectRepo;
    }

    public function activation($key) {
        $check = $this->constructionRepo->checkactivation($key);
        $input['status'] = 1;
        if ($check) {
            $this->constructionRepo->update($input, $check->id);
        }
        return view('frontend/notification/index');
    }

    public function index(Request $request) {
        $records = $this->constructionRepo->readFE($request);
        $category_arr = $this->categoryRepo->readCategoryByType(\App\Category::TYPE_CONSTRUCTION);
        $item_arr = $this->itemRepo->readFE();
        $search = $request->all();
        if (config('global.device') != 'pc') {
            return view('mobile/construction/list', compact('records', 'category_arr', 'item_arr','search'));
        } else {
            return view('frontend/construction/list', compact('records', 'category_arr', 'item_arr', 'search'));
        }
    }

    public function detail($alias) {
        $review_person = (array)session('_review_person') ?: [];
        $record = $this->constructionRepo->findByAlias($alias);
        if (config('global.device') != 'pc') {
            return view('mobile/construction/detail', compact('record', 'review_person'));
        }else{
            return view('frontend/construction/detail', compact('record', 'review_person'));
        }
    }

    public function addProject() {
        $record = \Auth::guard('construction')->user();
//        dd($record);
        if (config('global.device') != 'pc') {
            return view('mobile/construction/add_project', compact('record'));
        }
        else{
            return view('frontend/construction/add_project', compact('record'));
        }
    }

    public function createProject(Request $request) {
        $input = $request->all();
        $images = explode(',', $input['images']);
        foreach ($images as $k => $val) {
            $gallery['images'] = $val;
            $gallery['title'] = $input['title'];
            $gallery['status'] = 1;
            $gallery['view_count'] = 0;
            $gallery['ordering'] = 0;
            $gallery['post_schedule'] = date('Y-m-d H:i:s');
            $gallery['alias'] = \App\Helpers\StringHelper::getAlias($input['title'] . "-" . $k++);
            $gallerys = $this->galleryRepo->create($gallery);
            $ids[] = $gallerys->id;
        }
        $input['is_hot'] = 0;
        $input['status'] = 1;
        $input['construction_id'] = \Auth::guard('construction')->user()->id;
        $input['alias'] = \App\Helpers\StringHelper::getAlias($input['title']);
        $validator = \Validator::make($input, $this->projectRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $project = $this->projectRepo->create($input);
        $galery['project_id'] = $project->id;
        foreach ($ids as $id) {
            $this->galleryRepo->update($galery, $id);
        }
        return redirect()->route('construction.list_project')->with('success', 'Thêm dự án thành công');
    }
    public function updateProject(Request $request,$id) {
        session_start();
        $_SESSION['KCFINDER'] = []; //
        $_SESSION['KCFINDER'] = array('disabled' => false, 'uploadURL' => "/public/upload/m" . \Auth::guard('construction')->user()->id);
        $input = $request->all();
        $images = explode(',', $input['images']);
        $this->galleryRepo->deleteByProject($id);
        foreach ($images as $k => $val) {
            $gallery['images'] = $val;
            $gallery['title'] = $input['title'];
            $gallery['status'] = 1;
            $gallery['view_count'] = 0;
            $gallery['ordering'] = 0;
            $gallery['post_schedule'] = date('Y-m-d H:i:s');
            $gallery['alias'] = \App\Helpers\StringHelper::getAlias($input['title'] . "-" . $k++);
            $gallerys = $this->galleryRepo->create($gallery);
            $ids[] = $gallerys->id;
        }
        $input['is_hot'] = 0;
        $input['status'] = 1;
        $input['construction_id'] = \Auth::guard('construction')->user()->id;
        $input['alias'] = \App\Helpers\StringHelper::getAlias($input['title']);
        $project = $this->projectRepo->update($input,$id);
        $galery['project_id'] = $id;
        foreach ($ids as $val) {
            $this->galleryRepo->update($galery,$val);
        }
        return redirect()->route('construction.list_project')->with('success', 'Cập nhật thành công');
    }

    public function listProject() {
        $record = $this->constructionRepo->findByAlias(\Auth::guard('construction')->user()->alias);
        if (config('global.device') != 'pc') {
            return view('mobile/construction/list_project', compact('record'));
        }
        else{
            return view('frontend/construction/list_project', compact('record'));
        }
    }

    public function editProfile($alias) {
        session_start();
        $_SESSION['KCFINDER'] = []; //
        $_SESSION['KCFINDER'] = array('disabled' => false, 'uploadURL' => "/public/upload/m" . \Auth::guard('construction')->user()->id);
        $record = $this->constructionRepo->findByAlias($alias);
        $item_arr = $this->itemRepo->readFE();
        $category_html = \App\Helpers\StringHelper::getSelectOptions($item_arr, $record->items()->pluck('id')->toArray());
        if (config('global.device') != 'pc') {
            return view('mobile/construction/profile', compact('record', 'category_html'));
        }
        else{
            return view('frontend/construction/profile', compact('record', 'category_html'));
        }
    }
    public function editProject($alias) {
        session_start();
        $_SESSION['KCFINDER'] = []; //
        $_SESSION['KCFINDER'] = array('disabled' => false, 'uploadURL' => "/public/upload/m" . \Auth::guard('construction')->user()->id);
        $project = $this->projectRepo->findByAlias($alias);
        $record = $this->constructionRepo->find($project->construction_id);
        foreach($project->gallery as $val){
            $images[]= $val->images;
        }
        $project->images = implode(',',$images);
        if (config('global.device') != 'pc') {
            return view('mobile/construction/edit_project', compact('record', 'project'));
        }
        else{
            return view('frontend/construction/edit_project', compact('record','project'));
        }
    }
     public function updateProfile(Request $request,$alias) {
        $input=$request->all();
        $record = $this->constructionRepo->findByAlias($alias);
        $profile = $this->constructionRepo->update($input, $record->id);
        $record->items()->sync($input['category_id']);
        $item_arr = $this->itemRepo->readFE();
        $category_html = \App\Helpers\StringHelper::getSelectOptionsNormal($item_arr, $record->category_id);
        if ($profile) {
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->back()->with('error', 'Cập nhật thất bại');
        }
    }
    public function deleteProject($alias){
        $project=$this->projectRepo->findByAlias($alias);
        foreach($project->gallery as $val){
            $gallery = $this->galleryRepo->find($val->id);
            $gallery->categories()->detach();
            $gallery->attributes()->detach();
            $this->galleryRepo->delete($val->id);
        }
        $this->projectRepo->delete($project->id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }

}
