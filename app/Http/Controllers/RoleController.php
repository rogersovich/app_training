<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Auth;
use App\Role;
use App\Type;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = Auth::user()->with('roles')->first();
        }

        $types = Type::all();

        return View::make('admin.roles.create')
            ->with(compact('types','user'));
    }

    public function store(Request $request){

        Role::create([
            'name' => $request['name'],
            'type_id' => $request['type_id'],
        ]);

        return redirect('/admin/roles');

    }

    public function edit($id){

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = Auth::user()->with('roles')->first();
        }

        $types = Type::all();
        $role = Role::with('type')->where(['id' => $id])->first();

        //dd($role->type->id);

        return View::make('admin.roles.edit')
            ->with(compact('types','role','user'));

    }

    public function update(Request $request, $id){

        $role = Role::find($id);

        Role::where('id', $id)->update([
            'name' => $request['name'],
            'type_id' => $request['type_id'],
        ]);

        return redirect('/admin/roles');

    }

    public function destroy($id){

        $role = Role::find($id);
        //dd($role);
        $role->delete();

        return redirect('/admin/roles');
    }
}
