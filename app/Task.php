<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'role_id',
        'category_id',
        'score_id',
        'name',
        'description',
        'complete',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function score(){
        return $this->belongsTo('App\Score');
    }


}
