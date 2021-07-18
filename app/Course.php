<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    //
    protected $table = "course";
    protected $fillable = [
        'title', 'alias', 'summary', 'status', 'meta_title', 'meta_keywords', 'meta_description', 'ordering', 'ordering','content', 'course_for', 'image','course_profit','promotion','promotion_time', 'created_at','updated_at'
    ];

     public function validateCreate() {
        return $rules = [
            'title' => 'required|unique:course',
            'alias' => 'required'
           
        ];
    }
    public function validateUpdate($id) {
        return $rules = [
            'title' => 'required|unique:course,title,' . $id . ',id',
            'alias' => 'required'
        ];
    }

    public function getImage() {
        $image_arr = explode(',', $this->images);
        return $image_arr[0];
    }

    public function created_at() {
        return date('d/m/Y', strtotime($this->created_at));
    }

   

}
