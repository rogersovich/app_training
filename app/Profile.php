<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'age',
    ];

    public function user(){
        return $this->hasOne('App\User');
    }
}
