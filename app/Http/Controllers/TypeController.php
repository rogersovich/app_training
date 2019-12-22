<?php

namespace App\Http\Controllers;

use App\Type;
use View;
use Auth;
use Illuminate\Http\Request;

class TypeController extends Controller
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

        return View::make('admin.types.create')
            ->with(compact('user'));
    }

    public function store(Request $request){

        Type::create([
            'name' => $request['name']
        ]);

        return redirect('/admin/types');

    }

    public function edit($id){

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = Auth::user()->with('roles')->first();
        }

        $type  = Type::find($id);

        return View::make('admin.types.edit')
            ->with(compact('type','user'));

    }

    public function update(Request $request, $id){

        $type = Type::find($id);

        Type::where('id', $id)->update([
            'name' => $request['name']
        ]);

        return redirect('/admin/types');

    }

    public function destroy($id){

        $type = Type::find($id);
        //dd($type);
        $type->delete();

        return redirect('/admin/types');
    }
}

