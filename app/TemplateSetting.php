<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateSetting extends Model
{
    protected $table = 'template_setting';
    protected $fillable = ['name','image','	description','type','ordering','status'];
    public $timestamps = false;

    public function validateCreate() {
        return $rules = [
            'name' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'description' => 'required',
            'type' => 'required',
            'ordering'=>'required'
        ];
    }

    public function validateUpdate($id) {
        return $rules = [
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'ordering'=>'required'
        ];
    }
}
