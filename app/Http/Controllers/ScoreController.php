<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use App\Category;
use View;
use Auth;

class ScoreController extends Controller
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

        $categories = Category::all();

        return View::make('admin.scores.create')
            ->with(compact('categories','user'));
    }

    public function store(Request $request){

        Score::create([
            'nilai' => $request['nilai'],
            'category_id' => $request['category_id']
        ]);

        return redirect('/admin/scores');

    }

    public function edit($id){

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = Auth::user()->with('roles')->first();
        }

        //dd('sdfsd');
        $score  = Score::with('category')->where('id',$id)->first();
        $categories = Category::all();
        //dd($score);

        return View::make('admin.scores.edit')
            ->with(compact('score','categories','user'));

    }

    public function update(Request $request, $id){

        $score = Score::find($id);

        Score::where('id', $id)->update([
            'nilai' => $request['nilai'],
            'category_id' => $request['category_id']
        ]);

        return redirect('/admin/scores');

    }

    public function destroy($id){

        $score = Score::find($id);
        //dd($score);
        $score->delete();

        return redirect('/admin/scores');
    }
}
