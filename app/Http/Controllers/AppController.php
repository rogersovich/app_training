<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Task;

class AppController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function activity(){

        if(Auth::user()->email == 'admin@admin.com'){

            $user = Auth::user();

            $tasks = Task::with(['role.type','category','score'])
            ->get();

        }else{

            $user = Auth::user()->with('roles')->first();

            $roles = [];
            foreach ($user->roles as $value) {
                $roles = $value->id;
            }

            $tasks = Task::with(['role.type','category','score'])
            ->where([ 'role_id' => $roles])
            ->get();

        }

        //dd($tasks);

        return view('layouts.page')
            ->with(compact('tasks','user'));

    }

    public function logout() {
        Auth::logout();
        return redirect('/welcome');
    }
}
