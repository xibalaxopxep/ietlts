<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\StringHelper;
use Illuminate\Support\Facades\Auth;
use Repositories\ReviewPersonRepository;
use Mail;
use DB;

class FrontendController extends Controller {

 

       public function sign_up_advise(Request $request){
            $input = $request->all();
            $res = DB::table('contact')->create($input);
            if($res){
                return response()->json(['success'=>1]);
            }
            else{
                 return response()->json(['success'=>0]);
            }
       }

        public function update_promo(Request $request){
            $input = $request->all();
            DB::table('course')->where('id',$input['id'])->update(['price'=>$input['price'],'sale_price'=>$input['sale_price'],'sale_time'=>$input['sale_time']]);

                return response()->json(['success'=>1]);
       
          

       }
 
}
