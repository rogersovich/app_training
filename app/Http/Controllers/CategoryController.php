<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Auth;
use App\Category;

class CategoryController extends Controller
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

        return View::make('admin.categories.create')
            ->with(compact('user'));
    }

    public function store(Request $request){

        Category::create([
            'name' => $request['name']
        ]);

        return redirect('/admin/categories');

    }

    public function edit($id){

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = Auth::user()->with('roles')->first();
        }

        $category  = Category::find($id);
        //dd($category);

        return View::make('admin.categories.edit')
            ->with(compact('category','user'));

    }

    public function update(Request $request, $id){

        $category = Category::find($id);

        Category::where('id', $id)->update([
            'name' => $request['name']
        ]);

        return redirect('/admin/categories');

    }

    public function destroy($id){

        $category = Category::find($id);
        //dd($category);
        $category->delete();

        return redirect('/admin/categories');
    }
}
