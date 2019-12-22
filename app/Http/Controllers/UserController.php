<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Profile;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id){

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = User::with('profile')->where(['id' => $id])->first();
        }

        $profiles = Profile::all();

        return View::make('admin.users.edit')
            ->with(compact('user','profiles'));

    }

    public function update(Request $request, $id){

        //dd($request->all());

        $user = User::find($id);

        Profile::where(['id' => $request['profile_id']])->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'age' => $request['age'],
            'gender' => $request['gender'],
        ]);

        if($request['password'] == null){
            User::where('id', $id)->update([
                'email' => $request['email'],
                'password' => $request['password_lama'],
                'exp' => $request['exp'],
            ]);
        }else{
            User::where('id', $id)->update([
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'exp' => $request['exp'],
            ]);
        }

        return redirect('/admin/users');

    }

    public function destroy($id){

        $user = User::find($id);
        $user->delete();

        return redirect('/admin/users');
    }
}
