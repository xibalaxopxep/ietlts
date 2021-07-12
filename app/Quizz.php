<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizz extends Model {

    //
    protected $table = "quizz";
    protected $fillable = [
        'title', 'test_id', 'image', 'type_quizz', 'content', 'orderBy','created_at', 'updated_at'
    ];

    public function created_at() {
        return date("d/m/Y", strtotime($this->created_at));
    }

}
