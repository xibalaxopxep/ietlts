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

    public function registerMarketing(Request $request) {
        $input = $request->all();
        $validator = \Validator::make($input, $this->marketingRepo->validateCreate());
        if ($validator->fails()) {
            return response()->json(['success' => false]);
        }
        $count = $this->marketingRepo->countUser();
        $input['ref'] = str_random(8) . "" . $count;
        $password = $request->get('password');
        $input['password'] = bcrypt($password);
        $input['activation'] = str_random(15);
        $input['alias'] = StringHelper::getAlias($input['username']);
        $this->marketingRepo->create($input);
        $email = $input['email'];
        $name = $input['full_name'];
        Mail::send('mail.index', array('link' => $request->root() . '/marketing/activation/' . $input['activation']), function($message) use ($email, $name) {
            $message->to($email, $name)->subject('Xác thực tài khoản tiếp thị liên kết Alagreen');
        });
        return response()->json(['success' => true]);
    }

    public function registerConstruction(Request $request) {
        $input = $request->all();
        $validator = \Validator::make($input, $this->constructionRepo->validateCreate());
        if ($validator->fails()) {
            return response()->json(['success' => false]);
        }
        $password = $request->get('password');
        $input['password'] = bcrypt($password);
        $input['alias'] = StringHelper::getAlias($input['username']);
        $input['activation'] = str_random(15);
        $this->constructionRepo->create($input);
        $email = $input['email'];
        $name = $input['full_name'];
        Mail::send('mail.index', array('link' => $request->root() . '/construction/activation/' . $input['activation']), function($message) use ($email, $name) {
            $message->to($email, $name)->subject('Xác thực tài khoản thi công Alagreen');
        });
        return response()->json(['success' => true]);
    }

    public function addSubscriber(Request $request) {
        $input = $request->all();
        $this->subscriberRepo->create($input);
        return response()->json(['success' => true]);
    }

    public function checkUserMarketing(Request $request) {
        $check = $this->marketingRepo->checkUser($request->get('username'));
        if ($check) {
            return response()->json(['success' => false]);
        } else {
            return response()->json(['success' => true]);
        }
    }

    public function getProducts(Request $request) {
        $data = $this->productRepo->getProductByKeyword($request->get('keyword'));
        return response()->json($data);
    }

    public function checkUserConstruction(Request $request) {
        $check = $this->constructionRepo->checkUser($request->get('username'));
        if ($check) {
            return response()->json(['success' => false]);
        } else {
            return response()->json(['success' => true]);
        }
    }

    public function getRecentPost(Request $request) {
        $data = $this->postHistoryRepo->readRecentPost($request->get('page'));
        $html = '';

        foreach ($data as $key => $val) {
            switch ($val['module']) {
                case 'product':
                    $record = $this->productRepo->find($val['item_id']);
                    $data[$key]['html'] = '
                        <div class="strip grid">
                            <figure>
                                <a href="' . $record->url() . '"><img src="' . $record->getImage() . '" class="img-fluid" alt="' . $record->title . '">
                                    <div class="read_more"><span>Xem thêm</span></div>
                                </a>' . ($val->sale_price > 0 ? '<small>SALE</small>' : '') . '
                            </figure>
                            <div class="wrapper">
                                <h3 class="product-title"><a href="' . $record->url() . '">' . $record->title . '</a></h3>                                
                                ' . ($record->sale_price ?
                            '<p>Giá: <span class="price">' . $record->getSalePrice() . '</span> <span class="original-price">' . $record->getPrice() . '</span></p>' :
                            '<p>Giá: <span class="price">' . $record->getPrice() . '</span> </p>') . '
                            </div>
                        </div>';
                    break;
                case 'gallery':
                    $gallery = $this->galleryRepo->find($val['item_id']);
                    $data[$key]['html'] = '
                        <article class="blog">
                            <figure>
                                <a href="' . $gallery->url() . '"><img src="' . $gallery->getImage() . '" alt="' . $gallery->title . '">
                                    <div class="preview"><span>Xem thêm</span></div>
                                </a>
                            </figure>
                            <div class="post_info">
                                <h3><a href="' . $gallery->url() . '">' . $gallery->title . '</a></h3>
                                <ul>
                                    <li>
                                        <div class="thumb"><img src="' . $gallery->createdBy->avatar . '" alt="' . $gallery->createdBy->full_name . '"></div> ' . $gallery->createdBy->full_name . '
                                    </li>
                                    <li><i class="ti-eye"></i>'.$gallery->view_count.'</li>
                                </ul>
                            </div>
                        </article>';
                    break;
                    /*
                      case 'news':
                      $news = $this->newsRepo->find($val['item_id']);
                      $data[$key]['html'] = '
                      <article class="blog">
                      <figure>
                      <a href="' . $news->url() . '"><img src="' . $news->getImage() . '" alt="' . $news->title . '">
                      <div class="preview"><span>Xem thêm</span></div>
                      </a>
                      </figure>
                      <div class="post_info">
                      <h3><a href="' . $news->url() . '">' . $news->title . '</a></h3>
                      <ul>
                      <li>
                      <div class="thumb"><img src="' . $news->createdBy->avatar . '" alt="' . $news->createdBy->full_name . '"></div> ' . $news->createdBy->full_name . '
                      </li>
                      <li><i class="ti-eye"></i>' . $news->view_count . '</li>
                      </ul>
                      </div>
                      </article>'; */
                    break;
            }
        }
        foreach ($data as $key => $val) {
            if ($val['module'] != 'news') {
                if ($key == 0) {
                    $html .= '<div class="col-md-12 full-image">' . $data[$key]['html'] . '</div>';
                } else {
                    $html .= '<div class="col-md-4">' . $data[$key]['html'] . '</div>';
                }
            }
        }
        return response()->json(array('html' => $html));
    }

    public function getRecentPostMobile(Request $request) {
        $data = $this->postHistoryRepo->readRecentPost($request->get('page'));
        $html = '';
        foreach ($data as $val) {
            switch ($val['module']) {
                case 'product':
                    $record = $this->productRepo->find($val['item_id']);
                    $html .= '
                        
                        <div class="row bottom-15">
                            <article class="recent-post">
                                <figure>
                                    <a href="' . $record->url() . '">
                                        <img src="' . $record->getImage() . '" alt="' . $record->title . '">
                                    </a>
                                </figure>
                                <div class="post_info">
                                    <h2 class="post-title text-left"><a href="' . $record->url() . '">' . $record->title . '</a></h2>
                                    <div class="post-price"><b>Giá:</b> <span class="price">' . ($record->price ? $record->getPrice() : 'Liên hệ') . '</span></div>
                                </div>
                            </article>
                        </div>';
                    break;
                case 'gallery':
                    $gallery = $this->galleryRepo->find($val['item_id']);
                    $html .= '                        
                        <div class="row bottom-15">
                            <article class="recent-post">
                                <figure>
                                    <a href="' . $gallery->url() . '">
                                        <img src="' . $gallery->getImage() . '" alt="' . $gallery->title . '">
                                    </a>
                                </figure>
                                <div class="post_info">
                                    <h2 class="post-title text-left"><a href="' . $gallery->url() . '">' . $gallery->title . '</a></h2>
                                </div>
                            </article>
                        </div>';
                    break;
                /* case 'news':
                  $news = $this->newsRepo->find($val['item_id']);
                  $html .= '
                  <div class="row bottom-15">
                  <article class="recent-post">
                  <figure>
                  <a href="' . $news->url() . '">
                  <img src="' . $news->getImage() . '" alt="' . $news->title . '">
                  </a>
                  </figure>
                  <div class="post_info">
                  <h2 class="post-title text-left"><a href="' . $news->url() . '">' . $news->title . '</a></h2>
                  <div class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i> ' . $news->created_at() . '</div>
                  </div>
                  </article>
                  </div>';
                  break; */
            }
        }
        return response()->json(array('html' => $html));
    }

    public function loginMarketing(Request $request) {
        $input = [
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'status' => '1'
        ];
        if (Auth::guard('marketing')->attempt($input)) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function loginConstruction(Request $request) {
        $input = [
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];
        if (Auth::guard('construction')->attempt($input)) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function getProductsByTag(Request $request) {
        $tag_title = $request->get('tag_title');
        $data = $this->productRepo->getProductsByTag($tag_title);
        foreach ($data as $key => $val) {
            $data[$key]->url = route('product.detail', ['alias' => $val->alias]);
            $data[$key]->image = explode(',', $val['images'])[0];
        }
        return response()->json(array('success' => true, 'records' => $data));
    }

    public function getTags(Request $request) {
        $gallery_id = $request->get('gallery_id');
        $data = $this->tagRepo->getTagsByGalleryId($gallery_id);
        return response()->json(array('success' => true, 'records' => $data));
    }

    public function sendContact(Request $request) {
        $input = $request->all();
        $input['is_read'] = 0;
        $this->contactRepo->create($input);
        return response()->json(array('success' => true));
    }

    public function checkUser(Request $request) {
        $userData = $request->all();
        if (!empty($userData)) {
            $userData['full_name'] = $userData['name'];
            $userData['facebook_id'] = $userData['id'];
            $user = \DB::table('review_person')->where('facebook_id', $userData['id'])->first();
            if (!$user) {
                $user = $this->reviewPersonRepo->create($userData);
            }
            session_start();
            session(['_review_person' => $user]);
        }
        return response()->json(array('success' => true, 'user' => $user));
    }

}
