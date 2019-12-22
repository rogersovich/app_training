<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //use Notifiable;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $fillable = [
        'email',
        'password',
        'profile_id',
        'exp',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role', 'user_role' ,'user_id', 'role_id');
    }

    public function profile(){
        return $this->belongsTo('App\Profile');
    }

    public function hasAnyRole($roles){
        //dd($roles);
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }

        return false;
    }

    public function hasRole($role){
        if($this->roles()->where('name', $role)->first()){
            return true;
        }

        return false;
    }

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
