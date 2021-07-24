<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Best extends Model {
    protected $table = 'best';
    protected $fillable = [
        'name', 'alias', 'created_at', 'updated_at','image','avatar','is_best','ordering','status','point','summary','content'
    ];
    

    public function validateCreate() {
        return $rules = [
            'name' => 'required|unique:best',
            'point'=>'required',
            'summary' =>'required',
            "image" => "required|mimes:jpg,png,jpeg|max:10000",
            "avatar" => "required|mimes:jpg,png,jpeg|max:10000"
        ];
    }

   

    public function validateUpdate($id) {
        return $rules = [
            'name' => 'required|unique:best,name,' . $id . ',id',
            'point'=>'required',
            'summary' =>'required',
            "image" => "mimes:jpg,png,jpeg|max:10000",
            "avatar" => "mimes:jpg,png,jpeg|max:10000"
        ];
    }
  
}
