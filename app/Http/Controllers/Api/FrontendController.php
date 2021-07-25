<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SubscriberRepository;
use Repositories\PostHistoryRepository;
use App\Repositories\ProductRepository;
use Repositories\NewsRepository;
use Repositories\GalleryRepository;
use Repositories\MarketingRepository;
use Repositories\ConstructionRepository;
use Repositories\TagRepository;
use App\Repositories\ContactRepository;
use App\Helpers\StringHelper;
use Illuminate\Support\Facades\Auth;
use Repositories\ReviewPersonRepository;
use Mail;

class FrontendController extends Controller {

    //
    public function __construct(ConstructionRepository $constructionRepo, MarketingRepository $marketingRepo, SubscriberRepository $subscriberRepo, PostHistoryRepository $postHistoryRepo, ProductRepository $productRepo, NewsRepository $newsRepo, GalleryRepository $galleryRepo, TagRepository $tagRepo, ContactRepository $contactRepo, ReviewPersonRepository $reviewPersonRepo) {
        $this->subscriberRepo = $subscriberRepo;
        $this->postHistoryRepo = $postHistoryRepo;
        $this->productRepo = $productRepo;
        $this->newsRepo = $newsRepo;
        $this->galleryRepo = $galleryRepo;
        $this->marketingRepo = $marketingRepo;
        $this->constructionRepo = $constructionRepo;
        $this->contactRepo = $contactRepo;
        $this->tagRepo = $tagRepo;
        $this->reviewPersonRepo = $reviewPersonRepo;
    }


       public function sign_up_advise(Request $request){
            $input = $request->all();
            $res = DB::Table('contact')->create($input);
            if($res){
                return response()->json(['success'=>1]);
            }
            else{
                 return response()->json(['success'=>0]);
            }
       }
 
}
