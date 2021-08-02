<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model {
    protected $table = 'banner';
    protected $fillable = [
        'name', 'image', 'created_at', 'updated_at','ordering','status','link'
    ];
    

    public function validateCreate() {
        return $rules = [
            'name' => 'required|unique:best',
            "image" => "required|mimes:jpg,png,jpeg|max:10000"
        ];
    }

   

    public function validateUpdate($id) {
        return $rules = [
            "image" => "mimes:jpg,png,jpeg|max:10000"
        ];
    }
  
}
