<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    //protected $redirectTo = '/home';

    // public function __construct()
    // {


    // }

    protected function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    protected function create(array $data)
    {
        //dd($data);

        Profile::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'age' => $data['age']
        ]);

        $profile = Profile::orderBy('created_at', 'desc')
            ->first();

        $user =  User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile_id' => $profile->id,
            'exp' => 0,
        ]);

        $user->roles()->attach(Role::where('id', $data['role_id'])->first());

        //dd($user);


        return redirect('home/');
    }
}
