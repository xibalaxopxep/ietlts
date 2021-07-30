<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model {

    //
    protected $table = "rule";
    protected $fillable = [
        'from', 'to', 'score','content','type'
    ];
}
