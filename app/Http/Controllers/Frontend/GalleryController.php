<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Repositories\GalleryRepository;
use Repositories\CategoryRepository;
use Repositories\AttributeRepository;
use App\Repositories\ProductRepository;

class GalleryController extends Controller {

    //
    public function __construct(GalleryRepository $galleryRepo, CategoryRepository $categoryRepo, AttributeRepository $attributeRepo, ProductRepository $productRepo) {
        $this->galleryRepo = $galleryRepo;
        $this->categoryRepo = $categoryRepo;
        $this->attributeRepo = $attributeRepo;
        $this->productRepo = $productRepo;
    }

    public function index(Request $request) {
        ini_set('memory_limit', '2048M');
        $category_arr = $this->categoryRepo->readHomeGalleryCategory();
        $gallery_ids = \DB::table('gallery_category')->where('category_id', $request->get('category_id')?:\App\Category::GALLERY_ALBUM)->pluck('gallery_id');
        $attribute_arr = $this->attributeRepo->readAttributeByParent($module = 'gallery', $parent = 0, $type = 'select', $gallery_ids);
        $records = $this->galleryRepo->readFE($request);
        $search = $request->all();
        if (isset($search['attribute_id'])) {
            $search['attribute_arr'] = explode(',', $search['attribute_id']);
        }
        if (config('global.device') !== 'pc') {
            return view('mobile/gallery/list', compact('records', 'category_arr', 'attribute_arr', 'search'));
        } else {
            $parent_cat = \App\Category::where('id', isset($search['category_id'])?$search['category_id']:\App\Category::GALLERY_ALBUM)
                ->with('parentCategories')
                ->first();
//            dd($parent_cat);
            $parent_arr[] = ['title' => $parent_cat->title, 'url' => route('gallery.index', ['category_id' => $parent_cat->id])];
            if ($parent_cat->parentCategories) {
                $parent_arr[] = ['title' => $parent_cat->parentCategories->title, 'url' => route('gallery.index', ['category_id' => $parent_cat->parentCategories->id])];
                if ($parent_cat->parentCategories->parents) {
                    $parent_arr = array_merge($parent_arr, $this->getParent($parent_cat->parentCategories->parents));
                }
            }
            $parent_arr = array_reverse($parent_arr);
//            dd($parent_arr);
            $current_category = $this->categoryRepo->getCurrentCategory(isset($search['category_id']) ? $search['category_id'] : \App\Category::GALLERY_ALBUM);
            foreach ($parent_arr as $item)
            {
//                dd($item);
            }
            return view('frontend/gallery/list', compact('records', 'gallery_ids', 'category_arr', 'attribute_arr', 'search','parent_arr','current_category'));
        }
    }

    public function getParent($parent) {
        $parent_arr[] = ['title' => $parent->title, 'url' => route('gallery.index', ['category_id' => $parent->id])];
        if ($parent->parents) {
            $parent_arr = array_merge($parent_arr, $this->getParent($parent->parents));
        }
        return $parent_arr;
    }

    public function detail($alias) {
        $record = $this->galleryRepo->findByAlias($alias);
        $this->galleryRepo->updateViewCount($record->id, $record->view_count);
        $record->prev = $this->galleryRepo->getPreviousGallery($record->id);
        $record->next = $this->galleryRepo->getNextGallery($record->id);
        $image_arr = explode(',', $record->images);
        $related_arr = $this->galleryRepo->readRelatedGalleries($record->id, $record->categories->pluck('id'));
        $attribute_arr = $this->attributeRepo->readAttributes($record->attributes);
        $image_project = $this->galleryRepo->getImageByProject($record->project_id, $record->id);
        if (count($image_project)) {
            $record->prev = $this->galleryRepo->getPreviousGalleryByProject($record->project_id, $record->id);
            $record->next = $this->galleryRepo->getNextGalleryByProject($record->project_id, $record->id);
        }
        if (config('global.device') != 'pc') {
            return view('mobile/gallery/detail', compact('record', 'image_arr', 'attribute_arr', 'related_arr'));
        } else {
            $related_products = $this->productRepo->readRelatedProducts($record->keywords);
            return view('frontend/gallery/detail', compact('record', 'image_arr', 'related_arr', 'attribute_arr', 'related_products', 'image_project'));
        }
    }

}
