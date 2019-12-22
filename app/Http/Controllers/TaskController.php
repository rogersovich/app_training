<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Category;
use App\Role;
use App\Score;
use Auth;
use View;

class TaskController extends Controller
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

        $scores = Score::all();
        $categories = Category::all();
        $roles = Role::all();

        return View::make('admin.tasks.create')
            ->with(compact('scores','categories','roles','user'));
    }

    public function store(Request $request){

        Task::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'role_id' => $request['role_id'],
            'score_id' => $request['score_id'],
            'description' => $request['description']
        ]);

        return redirect('/admin/tasks');

    }

    public function edit($id){

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = Auth::user()->with('roles')->first();
        }

        $task  = Task::with(['role','category','score'])->where('id',$id)->first();
        //dd($task);
        $scores = Score::all();
        $categories = Category::all();
        $roles = Role::all();

        return View::make('admin.tasks.edit')
            ->with(compact('scores','categories','roles','task','user'));

    }

    public function update(Request $request, $id){

        Task::where('id', $id)->update([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'role_id' => $request['role_id'],
            'score_id' => $request['score_id'],
            'description' => $request['description']
        ]);

        return redirect('/admin/tasks');

    }

    public function destroy($id){

        $task = Task::find($id);
        $task->delete();

        return redirect('/admin/tasks');
    }
}
