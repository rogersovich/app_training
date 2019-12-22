<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'type_id',
    ];

    public function users(){
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }

    public function type(){
        return $this->belongsTo('App\Type');
    }
}
