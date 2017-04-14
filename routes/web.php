<?php

use App\Task;
use Illuminate\Http\Request;

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





/**
 * Show Task Dashboard
 */
//Route::get('/', function () {
//    
//    $task = Task::orderBy('created_at', 'asc')->get();
//    return view('tasks', [
//        'tasks' => $task
//    ]);
//});
//


//
///**
// * Add New Task
// */
//Route::post('/task', function (Request $request) {
//    $validator = Validator::make($request->all(), [
//                'name' => 'required|max:255',
//    ]);
//
//    if ($validator->fails()) {
//        return redirect('/')
//                        ->withInput()
//                        ->withErrors($validator);
//    }
//
//    $task = new Task;
//    $task->name = $request->name;
//    $task->save();
//
//    return redirect('/');
//});
//
///**
// * Delete Task
// */
//Route::delete('/task/{id}', function ($id) {
//    Task::findOrFail($id)->delete();
//
//    return redirect('/');
//});
//


Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');


// 認証ルート…
Route::get('auth/login', 'Auth\LoginController@getLogin');
Route::post('auth/login', 'Auth\LoginController@postLogin');
Route::get('auth/logout', 'Auth\LoginController@getLogout');

//// 登録ルート…
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');


Auth::routes();

Route::get('/home', 'HomeController@index');
