<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $fillable = ['email', 'password_hash','salt','status','full_name','company_name','mobile','address','country_id','city_id','province_id','facebook_id','google_id'];
    public function created_at() {
        return date("d/m/Y", strtotime($this->created_at));
    }
}
