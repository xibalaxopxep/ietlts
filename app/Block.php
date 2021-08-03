<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model {

    //
    protected $table = "block";
    protected $fillable = [
        'title', 'content', 'ordering', 'status', 'position','link','image','video_url'
    ];

    public function created_at() {
        return date("d/m/Y", strtotime($this->created_at));
    }

}
