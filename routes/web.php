<?php

use App\User;
use App\Role;
use App\Profile;
use App\Type;
use App\Category;
use App\Task;
use App\Score;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->name('admin.')->group(function () {

    //START CATEGORY

    Route::get('/categories', function () {

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = Auth::user()->with('roles')->first();
        }

        $categories = Category::all();

        return view('admin.categories.index')
            ->with(compact('categories','user'));

    })->name('categories')->middleware('auth');

    Route::resource('categories', 'CategoryController')->only([
        'create', 'store','edit','update'
    ]);

    //END CATEGORY

    //START TYPE

    Route::resource('types', 'TypeController')->only([
        'create', 'store','edit','update'
    ]);

    Route::get('/types', function () {

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = Auth::user()->with('roles')->first();
        }

        $types = Type::all();

        return view('admin.types.index')
            ->with(compact('types','user'));

    })->name('types')->middleware('auth');

    //END TYPE

    //START ROLE

    Route::resource('roles', 'RoleController')->only([
        'create', 'store','edit','update'
    ]);

    Route::get('/roles', function () {

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = Auth::user()->with('roles')->first();
        }

        $roles = Role::with('type')->get();

        return view('admin.roles.index')
            ->with(compact('roles','user'));

    })->name('roles')->middleware('auth');

    //END ROLE

    //START USER

    Route::resource('users', 'UserController')->only([
        'edit','update'
    ]);

    Route::get('/users', function () {

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = Auth::user()->with('roles')->first();
        }

        $users = User::with('profile')->get();

        //dd($users);

        return view('admin.users.index')
            ->with(compact('users','user'));

    })->name('users')->middleware('auth');

    //END USER

    //START USER

    Route::resource('tasks', 'TaskController')->only([
        'create', 'store','edit','update'
    ]);

    Route::get('/tasks', function () {

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = Auth::user()->with('roles')->first();
        }

        $tasks = Task::with(['role','category','score'])->get();

        //dd($tasks);

        return view('admin.tasks.index')
            ->with(compact('tasks','user'));

    })->name('tasks')->middleware('auth');

    //END USER

    //START SCORE

    Route::resource('scores', 'ScoreController')->only([
        'create', 'store','edit','update'
    ]);

    Route::get('/scores', function () {

        if(Auth::user()->email == 'admin@admin.com'){
            $user = Auth::user();
        }else{
            $user = Auth::user()->with('roles')->first();
        }

        $scores = Score::with('category')->get();

        //dd($scores);

        return view('admin.scores.index')
            ->with(compact('scores','user'));

    })->name('scores')->middleware('auth');

    //END SCORE
});

Route::get('/activity', 'AppController@activity')
    ->name('activity');

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/register', function()
{
    $roles = Role::all();

    return View::make('auth.register')
        ->with(compact('roles'));
})->name('register');

Route::get('/web-admin', function(){
    return view('admin.users.index');
})->middleware('auth');



Route::get('admin/types/{type}','TypeController@destroy')->name('admin.types.destroy');
Route::get('admin/categories/{category}','CategoryController@destroy')->name('admin.categories.destroy');
Route::get('admin/roles/{role}','RoleController@destroy')->name('admin.roles.destroy');
Route::get('admin/users/{user}','UserController@destroy')->name('admin.users.destroy');
Route::get('admin/tasks/{task}','TaskController@destroy')->name('admin.tasks.destroy');
Route::get('admin/scores/{score}','ScoreController@destroy')->name('admin.scores.destroy');

Auth::routes();
