<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'category_id',
        'nilai',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    // public function task(){
    //     return $this->belongsTo('App\Task');
    // }
}
